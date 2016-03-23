<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package fitcoach
 */

get_header(); ?>

	<div class="grid grid-pad page-area">
		<div id="primary" class="content-area page-wrapper col-1-1 custom_border_top">
			<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'fitcoach' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'fitcoach' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- grid --> 
           
<?php get_footer(); ?>
