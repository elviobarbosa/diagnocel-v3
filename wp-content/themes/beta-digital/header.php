<!doctype html>
<html>
<head>
	<?php
	if('post_empreendimentos' != get_post_type() ){
		add_action( 'wpcf7_enqueue_styles', function() { wp_deregister_style( 'contact-form-7' ); } );
		add_action( 'wpcf7_enqueue_scripts', function() { wp_deregister_script( 'jquery-form' ); } );
		add_action( 'wpcf7_enqueue_scripts', function() { wp_deregister_script( 'contact-form-7' ); } );
	}
	?>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name=viewport content="width=device-width">
	<meta charset="UTF-8">
	<title><?php wp_title();?></title>
	<link rel="shortcut icon" href="<?php bloginfo('wpurl');?>/favicon.ico" />

	<?php wp_head() ?>


</head>

<body <?php post_class('front-page') ?>>

<div class="nav-container">
	<div class="container nav-container__container">
		<div class="nav-container__logo">
			<a href="/"><?php the_SVG('logo'); ?></a>
		</div>

		<div class="nav-container__menu js-nav-menu">
			<?php 
				wp_nav_menu( 
				array( 
					'theme_location' 	=> 'header-menu',
					'menu_class'		=> 'menu',
					'container'			=> 'nav',
					'container_class' 	=> 'main-menu'
				) ); 
			?>
		</div>
		<div class="nav-container__control">
			<div class="h-menu js-menu">
				<span class="h-menu__line"></span>
				<span class="h-menu__line"></span>
				<span class="h-menu__line"></span>
			</div>
		</div>
	</div>
 </div>
