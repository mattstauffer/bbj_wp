<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fitcoach
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php add_action( 'wp_enqueue_scripts', 'fitcoach_scripts' ); ?>

<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php if ( get_theme_mod('apple_touch_144') ) : ?>
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('apple_touch_144')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_114') ) : ?>
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('apple_touch_114')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_72') ) : ?>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_theme_mod('apple_touch_72')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('apple_touch_57') ) : ?>
	<link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('apple_touch_57')); ?>" />
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'fitcoach' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
    		<div class="grid side-pad header-overflow">
			<div class="site-branding col-3-12 mobile-col-2-3">
        	<?php if ( get_theme_mod( 'fitcoach_logo' ) ) : ?>
    		<div class="site-logo">
       			<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'fitcoach_logo' ) ); ?>' <?php if ( get_theme_mod( 'logo_size' ) ) : ?>width="<?php echo esc_attr( get_theme_mod( 'logo_size' )); ?>"<?php endif; ?> alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
    		</div>
			<?php else : ?>
    		<hgroup>
       			<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
    		</hgroup>
			<?php endif; ?>
			</div><!-- site-logo -->


			<div class="nav-container col-8-12 mobile-col-1-3">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Menu', 'fitcoach' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
        	</div><!-- .nav-container -->


        	<div class="social-container col-1-12 hide-on-mobile">
        		<?php echo fitcoach_media_icons(); ?>
        	</div><!-- social-container -->

        	</div><!-- grid -->
		</header><!-- #masthead -->

	<section id="content" class="site-content">
