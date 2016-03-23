<?php
/**
Template Name: Home Page
 *
 * @package fitcoach
 */

get_header(); ?> 

	<div id="sequence"> 
		<span class="sequence-prev hide-on-mobile" alt="Previous" ><i class="fa fa-angle-left"></i></span>
		<span class="sequence-next hide-on-mobile" alt="Next" ><i class="fa fa-angle-right"></i></span>

			<ul class="sequence-canvas"> 
              <?php query_posts( array ( 'post_type' => 'slider', 'posts_per_page' => -1 ) );
			
				while ( have_posts() ) : the_post(); ?> 
                    
                <li>
				<div class="slide-title">
					<span><?php the_title(); ?></span> 
				</div><!-- slide-title -->
                    
                <div class="slide-description">
                	<span><?php global $post; $text = get_post_meta( $post->ID, '_sr_slide_description', true ); echo $text; ?></span>
                	<a href="<?php global $post; $text = get_post_meta( $post->ID, '_sr_slider_url', true ); echo $text; ?>"><i class="fa fa-plus red-plus"></i></a>
                </div><!-- slide-description -->
                    
                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); $url = $thumb['0']; ?> 
                <div class="bg" style="background: url('<?php echo $url?>') center center; -webkit-background-size: cover; -moz-background-size: cover; -ms-background-size: cover; -o-background-size: cover; background-size: cover;"> 
				</li> 
    
			  <?php endwhile; // end of the loop. ?>      
			</ul><!-- sequence-canvas -->
	</div><!-- sequence -->
    
    <?php if( get_theme_mod( 'active_classes' ) == '') : ?> 
    
    <div class="class-schedule-container side-pad">
    	<div class="grid home-class-grid">
    
    		<?php if ( get_theme_mod( 'class_title_text' ) ) : ?>
    			<div class="schedule-title">
    				<span><?php echo esc_html( get_theme_mod( 'class_title_text' )); ?></span>
    			</div><!-- schedule-title -->
    		<?php else : ?> 
			<?php endif; ?> 
    
    		<?php query_posts( array ( 'post_type' => 'classes', 'posts_per_page' => 5, 'order' => 'ASC' ) );
			
			while ( have_posts() ) : the_post(); ?> 
    
    		<a href="<?php the_permalink(); ?>">
    			<div class="col-1-5 class">
    				<?php the_post_thumbnail('class-image'); ?>
    				<h1><?php the_title(); ?></h1>
    				<h2><?php global $post; if ( get_post_meta( $post->ID, '_fc_class_day', true ) ) : 
       				$text = get_post_meta( $post->ID, '_fc_class_day', true ); echo $text; 
					echo '</br>';   
					else :   
    				$text = get_post_meta( $post->ID, '_fc_class_date', true ); echo $text;  
					endif; ?></h2>
    			<i class="fa fa-plus dark-plus"></i>
    			</div><!-- class --> 
   			</a>
    
	<?php endwhile; // end of the loop. ?>  
    
    	</div><!-- grid --> 
    </div><!-- class-schedule-container -->
    
    <?php endif; ?>
	<?php // end if ?>
    
    <?php if( get_theme_mod( 'active_cta' ) == '') : ?>
    
    <div class="side-pad">
    	<div class="grid cta" style="background: url('<?php echo esc_url( get_theme_mod( 'cta_background' ), (get_stylesheet_directory_uri() . '/images/cta.jpg')); ?>') center center no-repeat;">
    		<div class="col-1-1">
            	
                <h2> 
            	<?php if ( get_theme_mod( 'cta_text' ) ) : ?>
    				<?php echo esc_html( get_theme_mod( 'cta_text' )); ?> 
                <?php endif; ?>
                
                <?php if ( get_theme_mod( 'cta_button_text' ) ) : ?>
                	<a href="<?php echo esc_url( get_page_link(get_theme_mod('fitcoach_ctalink_url')))?>"><button class="alignright"><?php echo esc_html( get_theme_mod( 'cta_button_text', __( 'Book a Class', 'fitcoach' ) )); ?></button></a> 
                <?php endif; ?> 
                </h2>
                
    		</div><!-- col-1-1 -->
    	</div><!-- grid cta -->
    </div><!-- side-pad -->
    
    <?php endif; ?>
	<?php // end if ?>
    
    <?php if( get_theme_mod( 'active_blog' ) == '') : ?>
    
    <div class="side-pad">
    	<div class="grid home-class-grid"> 
        	<?php if ( get_theme_mod( 'fc_blog_title' ) ) : ?>  
				<div class="home-blog-title"><span><?php echo esc_html( get_theme_mod( 'fc_blog_title' ), __( 'Latest News Posts', 'fitcoach' )); ?></span></div><!-- home-blog-title --> 
        	<?php endif; ?>
		</div><!-- grid -->
    </div><!-- side-pad -->  
    
    <div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php /* Start the Loop */ ?>
			<?php query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 3 ) );
			
			while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'home' );  
				?>

			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    
    <?php endif; ?>
	<?php // end if ?> 

<?php get_footer(); ?>
