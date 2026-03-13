<?php
header('Content-Type: application/json; charset=UTF-8');

/* =========================
   DEBUG LOG
========================= */
function mail_log($msg) {
    $line = '[' . date('Y-m-d H:i:s') . '] ' . $msg . "\n";
    $path = __DIR__ . '/wp-content/uploads/mail-debug.log';
    if (@file_put_contents($path, $line, FILE_APPEND) === false) {
        @file_put_contents(sys_get_temp_dir() . '/mail-debug.log', $line, FILE_APPEND);
    }
}

/* =========================
   HELPERS
========================= */
function e($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
function fail($httpCode = 200, $msg = 'Something is wrong!') {
    http_response_code($httpCode);
    mail_log('FAIL: ' . $msg . ' | IP=' . ($_SERVER['REMOTE_ADDR'] ?? 'na') . ' | URI=' . ($_SERVER['REQUEST_URI'] ?? 'na'));
    die(json_encode(['success' => false, 'error' => $msg]));
}

/* =========================
   ANTISPAM SECRET
========================= */
$ff_secret = 'Sv3tly4ch0k_2026_SpamShield_f9A7KpQm2R8XwZ';

/* =========================
   BASIC VALIDATION
========================= */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    fail(405, 'Method not allowed');
}

$name  = trim((string)($_POST['name']  ?? ''));
$phone = trim((string)($_POST['phone'] ?? ''));

if ($name === '' || $phone === '') {
    fail(200, 'Name and phone are required');
}

/* =========================
   HONEYPOT
========================= */
if (!empty($_POST['website'])) {
    fail(200, 'Spam detected');
}

/* =========================
   RATE LIMIT
========================= */
$ip  = $_SERVER['REMOTE_ADDR'] ?? 'na';
$key = sys_get_temp_dir() . '/svet_rate_' . md5($ip);
$now = time();
$last = is_file($key) ? (int)file_get_contents($key) : 0;

if ($now - $last < 15) {
    fail(429, 'Too many requests');
}
file_put_contents($key, (string)$now);

/* =========================
   REFERER CHECK (same host)
========================= */
$ref = (string)($_SERVER['HTTP_REFERER'] ?? '');
$host = (string)($_SERVER['HTTP_HOST'] ?? '');
if ($ref !== '') {
    $refHost = strtolower((string)parse_url($ref, PHP_URL_HOST));
    $allowedHosts = ['usafirefly.com', 'www.usafirefly.com'];

    if ($host !== '') {
        $allowedHosts[] = strtolower($host);
    }

    if ($refHost !== '' && !in_array($refHost, array_unique($allowedHosts), true)) {
        fail(200, 'Bad referer');
    }
}
$page = ($ref !== '') ? strtok($ref, '?') : '';

/* =========================
   TOKEN CHECK
========================= */
$ff_ts    = (int)($_POST['ff_ts'] ?? 0);
$ff_token = (string)($_POST['ff_token'] ?? '');
$ua = $_SERVER['HTTP_USER_AGENT'] ?? '';

if ($ff_ts <= 0 || $ff_token === '') {
    fail(200, 'Bad token');
}
if (abs(time() - $ff_ts) > 1800) {
    fail(200, 'Token expired');
}
$expected = hash_hmac('sha256', $ff_ts . '|' . $ua, $ff_secret);
if (!hash_equals($expected, $ff_token)) {
    fail(200, 'Bad token');
}

/* =========================
   BLOCK LINKS IN OPEN TEXT
========================= */
$question_raw  = (string)($_POST['question'] ?? '');
$info_raw      = (string)($_POST['info'] ?? '');
$combined_text = $question_raw . ' ' . $info_raw;

if (preg_match('~https?://|www\.|\.ru\b|\.com\b|\.net\b|\.org\b~iu', $combined_text)) {
    fail(200, 'Links are not allowed');
}

/* =========================
   PHPMailer (LOCAL FILES)
   ВАЖНО: рядом с mail.php должны быть:
   Exception.php, PHPMailer.php, SMTP.php
========================= */
require_once __DIR__ . '/Exception.php';
require_once __DIR__ . '/PHPMailer.php';
require_once __DIR__ . '/SMTP.php';

$mail = new \PHPMailer\PHPMailer\PHPMailer(true);
$mail->CharSet = 'UTF-8';

/* =========================
   SMTP YANDEX
   ВСТАВЬ пароль приложения без пробелов
========================= */
$smtp_user = 'svet@svetlyachok.info';
$smtp_pass = 'fkjxaiajyzanontj';

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.yandex.ru';
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp_user;
    $mail->Password   = $smtp_pass;
    $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->Timeout    = 10;

    // From должен совпадать с SMTP логином
    $mail->setFrom($smtp_user, 'Заявка с сайта usafirefly.com');
    $mail->Sender = $smtp_user;

    // Reply-To на рабочий ящик + на email клиента (ниже добавим)
    $mail->addReplyTo('svet@svetlyachok.info', 'Светлячок');

    // Все заявки отправляем на один ящик (без маршрутизации)
    $mail->addAddress('Grea1@yandex.ru');

    $mail->isHTML(true);
    $mail->Subject = 'Новая заявка';

    $reason   = trim((string)($_POST['reason']   ?? ''));
    $referrer = trim((string)($_POST['referrer'] ?? ''));
    $email    = trim((string)($_POST['email']    ?? ''));
    $question = trim((string)($_POST['question'] ?? ''));
    $info     = trim((string)($_POST['info']     ?? ''));

    if ($email !== '') {
        $mail->addReplyTo($email, $name ?: $email);
    }

    $mail->Body  = '';
    $mail->Body .= '<b>Причина:</b> ' . e($reason) . '<br>';
    $mail->Body .= '<b>Ссылка:</b> ' . e($referrer) . '<br>';
    $mail->Body .= '<b>Имя:</b> ' . e($name) . '<br>';
    if ($email !== '') $mail->Body .= '<b>Email:</b> ' . e($email) . '<br>';
    $mail->Body .= '<b>Телефон:</b> ' . e($phone) . '<br>';
    if ($question !== '') $mail->Body .= '<b>Вопрос:</b> ' . e($question) . '<br>';
    if ($info !== '') $mail->Body .= '<b>Доп. инфо:</b> ' . e($info) . '<br>';

    $mail->send();

    $msgId = $mail->getLastMessageID();
    mail_log('SEND OK SMTP | msgid=' . ($msgId ?: 'EMPTY') .
        ' | IP=' . $ip .
        ' | page=' . $page .
        ' | to=' . implode(',', array_column($mail->getToAddresses(), 0))
    );

    die(json_encode(['success' => true]));
} catch (\Throwable $e) {
    // Возвращаем JSON, чтобы фронт не зависал
    mail_log('SEND FAIL SMTP | ' . $e->getMessage() . ' | ErrorInfo=' . $mail->ErrorInfo);
    fail(200, 'Send failed');
}
