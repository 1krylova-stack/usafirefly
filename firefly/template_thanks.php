<?php
/*
Template Name: Страница с текстом
*/
?>


<?php get_header(); ?>

<main>

<section id="brdh">
	<div class="container">
<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

	</div>
	<div class="clearfix"></div>	
</section>	

<section class="main_thanks">

<?php	

while ( have_posts() ) :
	the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >


		<div class="entry-content">
			<div style="text-align:center;font-size:20px;font-weight:bold;"><?single_post_title();?></div>
			<?php
			the_content();

			
			?>
		</div><!-- .entry-content -->

		
	</article><!-- #post-<?php the_ID(); ?> -->

	<?// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.

?>
	
</section>



</main>

<style>
	.main_thanks
	{
		margin-top: 200px;
	}
	.main_thanks .entry-content
	{
		width: 60%;
    	margin: auto;
    	border: 10px dashed#ffe819;
	    border-style: dashed;
	    padding: 35px 0;
	}

	
</style>

<?php get_footer(); ?>
