<?php 

get_header();

?>
<main style="background: #f9f9f9;padding: 30px 0;">
		<div class="container">
			<div class="row">
				
				<div class="col-md-8">
					<nav style="--bs-breadcrumb-divider: '>';background: #fff;margin-top: 20px;margin-bottom: 20px;" aria-label="breadcrumb">
				  <ol class="breadcrumb" style="padding: 10px 20px;">
				    <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">Home</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Blog</li>
				  </ol>
				</nav>
					<?php
                        if(have_posts()) :
                            while(have_posts()) :
                                the_post();
                                get_template_part('template-parts/content');
                            endwhile;
                        else:
                            get_template_part('template-parts/content','none');
                        endif;
                    ?>
					
					<?php the_posts_pagination(); ?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main>

<?php get_footer(); ?>