<?php
/**
 * The template for displaying search results pages.
 *
 * @package fitcoach
 */

get_header(); ?>

	<div class="grid grid-pad page-area">
		<div id="primary" class="content-area page-wrapper col-1-1 custom_border_top">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'fitcoach' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php fitcoach_paging_nav(); ?>

			<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary --> 
	</div><!-- grid -->   

	<?php get_footer(); ?>
