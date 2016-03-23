<?php
/**
 * @package fitcoach
 */
?>

	<div class="side-pad">
		<div class="grid home-blog">
			<div class="col-1-2 home-blog-info">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    				<header class="entry-header">
				
					<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

					<?php if ( 'post' == get_post_type() ) : ?>
		
        			<div class="entry-meta">
						<h2 class="custom_color"><?php fitcoach_posted_on(); ?></h2>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				
                	</header><!-- .entry-header -->

					<div class="entry-content">
					<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'fitcoach' ) ); ?>
		
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'fitcoach' ), 
							'after'  => '</div>',
						) );
					?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
                    
						<a href="<?php the_permalink(); ?>">
                        	<button class="read-more"> 
								<?php echo __( 'Read More', 'fitcoach' ); ?>
                            </button>
                        </a>

						<?php edit_post_link( __( 'Edit', 'fitcoach' ), '<span class="edit-link">', '</span>' ); ?> 
      				</footer><!-- .entry-footer -->

				</article><!-- #post-## --> 
			</div><!-- home-blog-info -->

			<div class="col-1-2 home-blog-photo">
				<?php the_post_thumbnail('home-blog-image'); ?>
			</div><!-- home-blog-photo -->     
         
		</div><!-- grid -->   
	</div><!-- side-pad -->  