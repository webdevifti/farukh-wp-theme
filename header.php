<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
	
	<header>
		<nav class="navbar navbar-expand-lg navbar-light sticky-top">
		  <div class="container">
		    <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
			<?php 
			if ( function_exists( 'the_custom_logo' ) ) {
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				
				if ( has_custom_logo() ) {
					echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
				} else {
					echo '<h1>' . get_bloginfo('name') . '</h1>';
				}
			}
			
			?>
<!-- 			
		    	<img src="/assets/img/logo.png"> -->
		    	<!-- <p>Something Write about the site</p> -->
		    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'bs-example-navbar-collapse-1',
					'menu_class'      => 'navbar-nav ms-auto',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) );
				?>
		     
		    </div>
		  </div>
		</nav>
	</header>