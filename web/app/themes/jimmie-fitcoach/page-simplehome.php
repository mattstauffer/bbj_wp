<?php
/**
 Template Name: Simple Home Page

 * @package fitcoach
 */

get_header(); ?>
<style>
    #sequence {
        height: 182px;
    }

    @media only screen and (min-width: 600px) {
        #sequence {
            height: 226px;
        }
    }

    @media only screen and (min-width: 750px) {
        #sequence {
            height: 300px;
        }
    }

    @media only screen and (min-width: 1000px) {
        #sequence {
            height: 530px;
        }
    }
    .home-page-sign-up {
        background: #000;
        color: #fff;
        padding: 1em;
        max-width: 40em;
        margin: 0 auto 1em;
        border-radius: 1em;
    }
        .home-page-sign-up h2 {
            font-size: 1.9em;
            line-height: 1.1;
        }
        .home-page-sign-up input[type=email] {
            margin: 0.6em 0;
            max-width: 30em;
        }

    .train-links {
        font-size: 1.5em;
        margin-bottom: 2em;
    }
        .train-section__header {
            margin-top: 2em;
            text-align: center;
        }

</style>
	<div id="sequence" style="max-width: 1400px;"> 
        <?php query_posts( array ( 'post_type' => 'slider', 'posts_per_page' => -1 ) );?>
        <?php if ($wp_query->post_count > 1): ?>
		<span class="sequence-prev hide-on-mobile" alt="Previous" ><i class="fa fa-angle-left"></i></span>
		<span class="sequence-next hide-on-mobile" alt="Next" ><i class="fa fa-angle-right"></i></span>
        <?php endif; ?>

			<ul class="sequence-canvas"> 
			
                <?php while (have_posts() ) : the_post(); ?> 
                    
                <li>
<!-- 
				<div class="slide-title">
					<span><?php the_title(); ?></span> 
				</div><!-- slide-title -->

<!--
                <div class="slide-description">
                	<span><?php global $post; $text = get_post_meta( $post->ID, '_sr_slide_description', true ); echo $text; ?></span>
                	<a href="<?php global $post; $text = get_post_meta( $post->ID, '_sr_slider_url', true ); echo $text; ?>"><i class="fa fa-plus red-plus"></i></a>
                </div><!-- slide-description -->
-->
                    
                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); $url = $thumb['0']; ?> 
                <div class="bg" style="background: url('<?php echo $url?>') center center; -webkit-background-size: cover; -moz-background-size: cover; -ms-background-size: cover; -o-background-size: cover; background-size: cover;"> 
				</li> 
    
			  <?php endwhile; // end of the loop. ?>      
			</ul><!-- sequence-canvas -->
	</div><!-- sequence -->

	<div class="grid grid-pad page-area" style="padding-top: 50px !important;">
		<div id="primary" class="content-area page-wrapper col-1-1 custom_border_top">
			<main id="main" class="site-main" role="main">

            <?php query_posts('pagename=home');?>

			<?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <div class="home-page-wrapper">
                        <?php the_content(); ?>
                        <?php
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'fitcoach' ),
                                'after'  => '</div>',
                            ) );
                        ?>
                        </div>
                    </div><!-- .entry-content -->
                
                    <footer class="entry-footer">
                        <?php edit_post_link( __( 'Edit', 'fitcoach' ), '<span class="edit-link">', '</span>' ); ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-## -->
			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- grid -->  

<?php get_footer(); ?>
