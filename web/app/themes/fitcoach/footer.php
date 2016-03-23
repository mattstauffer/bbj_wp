<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package fitcoach
 */
?>

	</section><!-- #content --> 

	<footer id="colophon" class="site-footer" role="contentinfo" style="background: url('<?php echo esc_url( get_theme_mod( 'footer_background', (get_stylesheet_directory_uri() . '/images/footer-bg.png') )); ?>') no-repeat scroll center bottom;"> 
    
    	<div class="grid grid-pad"> 
        	
            <div class="col-1-1">
        		
                <p class="top-footer-text">
                	<a href="#go-to-top">
                		<i class="fa fa-angle-up"></i> 
                	</a>
                </p>
                
				<?php if ( get_theme_mod( 'fitcoach_footer_logo' ) ) : ?>
        			
                    <img src="<?php echo esc_url( get_theme_mod( 'fitcoach_footer_logo' ) ); ?>" class="site-footer-image aligncenter" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">  
                
                <?php endif; ?>
                 
        	</div><!-- col-1-1 --> 
        
        	<div class="col-1-3">
            	
                <?php if ( get_theme_mod( 'footer_icon_1' ) ) : ?>
            		
                    <i class="fa <?php echo esc_attr( get_theme_mod( 'footer_icon_1' )); ?> fa-4x"></i> 
				
				<?php endif; ?> 
                
                <?php if ( get_theme_mod( 'fitcoach_footer_phone' ) ) : ?>
        			
                    <h5><?php echo wp_kses_post( get_theme_mod( 'fitcoach_footer_phone' )); ?></h5>
                
				<?php endif; ?>
                
        	</div><!-- col-1-3 --> 
        
        	<div class="col-1-3">
            
            	<?php if ( get_theme_mod( 'footer_icon_2' ) ) : ?>
            		
                    <i class="fa <?php echo esc_attr( get_theme_mod( 'footer_icon_2' )); ?> fa-4x"></i> 
            	
				<?php endif; ?> 
            	       
                <?php if ( get_theme_mod( 'fitcoach_footer_address' ) ) : ?>
        			
                    <h5><?php echo wp_kses_post( get_theme_mod( 'fitcoach_footer_address' )); ?></h5>
              
                <?php endif; ?>
                
        	</div><!-- col-1-3 -->  
        
        	<div class="col-1-3">
            
            	<?php if ( get_theme_mod( 'footer_icon_3' ) ) : ?>
            		
                    <i class="fa <?php echo esc_attr( get_theme_mod( 'footer_icon_3' )); ?> fa-4x"></i> 
            	
				<?php endif; ?> 
                
                <?php if ( get_theme_mod( 'fitcoach_footer_contact' ) ) : ?>
        			
                    <h5><?php echo wp_kses_post( get_theme_mod( 'fitcoach_footer_contact' )); ?></h5>
                
                <?php endif; ?>
                
        	</div><!-- col-1-3 -->  
        
        </div><!-- grid --> 
        
        <div class="site-info">
        
        	<?php if ( get_theme_mod( 'fitcoach_footerid' ) ) : ?>
        			<?php echo wp_kses_post( get_theme_mod( 'fitcoach_footerid' )); ?>  
				<?php else : ?>  
    				<?php printf( __( 'Theme: %1$s by %2$s', 'fitcoach' ), 'fitcoach', '<a href="http://modernthemes.net" rel="designer">modernthemes.net</a>' ); ?>
			<?php endif; ?> 

		</div><!-- .site-info -->
	
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
