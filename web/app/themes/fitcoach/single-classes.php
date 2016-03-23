<?php
/**
 * The template for displaying all single posts.
 *
 * @package fitcoach
 */

get_header(); ?>

	<div class="grid grid-pad page-area">
		<div id="primary" class="page-wrapper col-9-12 custom_border_top">
			<main id="main" class="site-main" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
        		<header class="entry-header fc-single-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">

				<?php the_post_thumbnail('large', array('class' => 'fc-class-image')); ?>
        		<?php
        		global $post;   
				echo '<h4 class="overview">'.__( 'Class Overview', 'fitcoach' ).'</h4><p>';
        		$text = get_post_meta( $post->ID, '_fc_class_description', true ); echo $text;
				echo '</p>';
				echo '<h4 class="details">'.__( 'Class Details', 'fitcoach' ).'</h4>';
				echo '<div class="class-content">';
				echo '<div class="grid class-table"><div class="class-third">';
				if ( get_post_meta( $post->ID, '_fc_class_day', true ) ) : 
       			$text = get_post_meta( $post->ID, '_fc_class_day', true ); echo $text; 
				echo '</br>';   
				else :   
    			$text = get_post_meta( $post->ID, '_fc_class_date', true ); echo $text;  
				endif;   
				echo '</div>';
				echo '<div class="class-third">';
				$text = get_post_meta( $post->ID, '_fc_class_time', true ); echo $text;
				echo '</div>';
				echo '<div class="class-third-last">$';
				$text = get_post_meta( $post->ID, '_fc_class_cost', true ); echo $text;
				echo '</div></div>';
				echo '<div class="class-address">';
				$text = get_post_meta( $post->ID, '_fc_class_address', true ); echo $text;
				echo '</div></div>';
				echo '<h4 class="location">'.__( 'Class Location', 'fitcoach' ).'</h4>'; 
				$text = get_post_meta( $post->ID, '_fc_class_map', true ); echo $text;
        		?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'fitcoach' ),  
						'after'  => '</div>',
					) );
				?>
		
        		</div><!-- .entry-content -->

			</article><!-- #post-## -->
			
            </main><!-- #main --> 
		</div><!-- #primary --> 
    
		<div id="secondary" class="widget-area col-3-12" role="complementary">
			<?php dynamic_sidebar('sidebar-class'); ?>
		</div><!-- #secondary -->

	</div><!-- grid -->

<?php get_footer(); ?>