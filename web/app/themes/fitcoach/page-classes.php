<?php
/**
 Template Name: Class Schedule
 *
 * @package fitcoach
 */

get_header(); ?>

	<div class="grid grid-pad class-page-area">

			<?php query_posts( array ( 'post_type' => 'classes', 'posts_per_page' => -1, 'order' => 'ASC' ) );
			
				while ( have_posts() ) : the_post(); ?>
				
                <div class="col-1-3">
                	<div class="class-schedule custom_color custom_border_top">
                    
				 		<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail('class-schedule'); ?>
                        </a>
					
                    <?php the_title( '<h1>', '</h1>' ); ?> 
                
                	<?php
        			global $post; 
                	echo '<div class="class-third">';
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
					echo '</div>'; 
					?>
                
                	<a href="<?php the_permalink(); ?>">
                    	<button class="schedule-class">
							<?php _e( 'More Details', 'fitcoach' ); ?>
                        </button>
                    </a>  
                
                	</div><!-- class-schedule -->  
                </div><!-- col-1-3 -->

			<?php endwhile; // end of the loop. ?> 

	</div><!-- class-page-area --> 
  
<?php get_footer(); ?>