<!doctype html>
<html>
<head>

	<?php
	if('post_produtos' != get_post_type() && !is_page('contato') && !is_page('trabalhe-conosco') ){
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

<body <?php body_class() ?>>

<div class="nav-container">
	<div class="container nav-container__container">
		<div class="nav-container__logo">
			<a href="/"><img src="<?php echo IMGPATH ?>diagnocel-biocore.png" title="Diagnocel + Biocore"></a>
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

		<div class="nav-container__social">
			<div><a href="https://www.linkedin.com/company/diagnocel-com-rcio-e-representa-es-ltda/" target="_blank">
				<svg class="" viewBox="0 0 22 22">
					<use href="<?php echo SVGPATH ?>linkedin"></use>
				</svg>
			</a></div>
			<div><a href="https://www.instagram.com/grupodiagnocel/" target="_blank">
				<svg class="" viewBox="0 0 22 22">
					<use href="<?php echo SVGPATH ?>instagram"></use>
				</svg>
			</a></div>
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

 <!-- <div class="search-bar">
	<form 
		role="search" 
		method="get" 
		id="searchform" 
		class="searchform" 
		action="<?php echo esc_url( home_url( '/' ) ); ?>" >
		<div>
			<input type="text" value="" name="s" id="s" placeholder="Buscar" data-msg-required="" required>
			<input type="submit" id="searchsubmit" value="Pesquisar">
		</div>
	</form>
 </div> -->

 <?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>
