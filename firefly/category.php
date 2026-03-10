<?php
/*
Template Name: Внутренняя страница 
*/
?>


<?php
$ff_force_en_catalog_paths = array(
    '/category/produkciya/reflective-product/',
    '/category/produkciya/svetovozvrashhayushhaya-furnitura-dlya-proizvoditelej-odezhdy/',
);

$ff_request_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if (in_array($ff_request_path, $ff_force_en_catalog_paths, true)) {
    wp_safe_redirect(home_url('/en' . $ff_request_path));
    exit;
}
?>

<?php get_header(); ?>

<main>

<?php	get_template_part( 'lp/sborka2' );	?>

</main>

<?php get_footer(); ?>
