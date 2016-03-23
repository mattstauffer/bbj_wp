<?php
/**
Template Name: Blog Archive
 *
 * @package fitcoach
 */

get_header(); ?>

	<div class="grid grid-pad page-area">
		<div id="primary" class="content-area page-wrapper blog-wrapper col-9-12 custom_border_top">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php query_posts( array ( 'post_type' => 'post', 'posts_per_page' => -1 ) );
			
				while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

				<?php endwhile; ?>

				<?php fitcoach_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php get_sidebar(); ?>
	</div><!-- grid -->   
	<?php get_footer(); ?>
