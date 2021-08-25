<?php 
// Template Name: Home
?>
<?php get_header(); ?>

<?php

$intro_image = get_field('intro_image');
$intro_title = get_field('intro_title');
$intro_description = get_field('intro_description');
$intro_facebook_link = get_field('intro_facebook_link');
$intro_twitter_link = get_field('intro_twitter_link');

$about_img = get_field('image');
$about_bio = get_field('short_bio');

?>
<?php 
    $hire_args = array(
        'post_type' => 'hiring_options',
        'post_status' => 'publish',
        'order_by' => 'post_id',
        'order' => 'ASC'
    );

    $options = new WP_Query($hire_args);
    if($options->have_posts()) :

?>
<div class="hire-popup">
    <div class="hire-options">
        <a href="javascript:void(0)" class="form-cancel">
            <i class="fa fa-times"></i>
        </a>
        <div class="hire-links">
            <?php 
                while($options->have_posts()) :
                    $options->the_post();
                    
                    $site_name = get_field('site_name');
                    $hiring_profile_link = get_field('hiring_profile_link');
                    $class = get_field('css_class');

            ?>
            <a class="<?php echo $class; ?>" target="_blank" href="<?php echo $hiring_profile_link; ?>"><?php echo $site_name; ?></a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<main>
		<section id="hero" class="hero-section">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="hero-left-content">
							<img src="<?php echo $intro_image['url']; ?>" alt="<?php echo $intro_image['alt']; ?>" title="<?php echo $intro_image['title']; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="hero-right-content">
							<h3><?php echo $intro_title; ?></h3>
							<p><?php echo $intro_description; ?></p>
							<a href="<?php echo $intro_twitter_link; ?>">Follow me on Twitter <i class="fab fa-twitter"></i></a>
							<a href="<?php echo $intro_facebook_link; ?>">Follow me on Facebook <i class="fab fa-facebook"></i></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="about" class="section-about">
			<div class="container">
				<h3 class="section-title text-center mb-5">About Myself</h3>
				<div class="row">
					<div class="col-md-3">
						<img src="<?php echo $about_img['url']; ?>" alt="<?php echo $about_img['alt']; ?>" title="<?php echo $about_img['title']; ?>">
					</div>
					<div class="col-md-6">
						<p><?php echo $about_bio; ?></p>
					</div>

                   <?php 
                        $hire_args = array(
                            'post_type' => 'hiring_options',
                            'post_status' => 'publish',
                            'order_by' => 'post_id',
                            'order' => 'ASC'
                        );

                        $options = new WP_Query($hire_args);
                        if($options->have_posts()) :

                    ?>
					<div class="col-md-3">
						<div class="button-section">
				            <div class="about-hire-links">
				            	<h5>Let's Handle Your Project On</h5>
				                <!-- <a class="fiverr" target="_blank" href="https://www.fiverr.com">Fiverr</a> -->
                                 <?php 
                                    while($options->have_posts()) :
                                        $options->the_post();
                                        
                                        $site_name = get_field('site_name');
                                        $hiring_profile_link = get_field('hiring_profile_link');
                                        $class = get_field('css_class');

                                ?>
                                <a class="<?php echo $class; ?>" target="_blank" href="<?php echo $hiring_profile_link; ?>"><?php echo $site_name; ?></a>
                                <?php endwhile; wp_reset_postdata(); ?>
				            </div>
						</div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

        <!-- Youtube Video -->
        <?php 

            $youtube_arr = array(
                'post_type' => 'youtube',
                'post_status' => 'publish',
                'post_per_page' => 6,
                'order_by' => 'post_id',
                'order' => 'DESC'
            );
            $youtube = new WP_Query($youtube_arr);
            if($youtube->have_posts()) :
        
        ?>
		<section id="recentActivity" class="section-recent-activity" style="background-image: url('assets/img/bg.jpg');background-repeat: no-repeat;background-size: cover;background-position: center;">
			<div class="container">
				<h3 class="section-title text-center mb-5">Some Of My Popular Video</h3>
				<div class="row">
                    <?php 
                        while($youtube->have_posts()) :
                            $youtube->the_post();
                            $url = get_field('youtube_video_share_link');
                    ?>
					<div class="col-md-6">
						<?php echo $url; ?>
					</div>
                    <?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
        <?php endif; ?>

        <!-- FAQ -->
        <?php
        
        $faq_arr = array(
            'post_type' => 'faq',
            'post_status' => 'publish',
            'order_by' => 'post_id',
            'order' => 'DESC'
        );
        $faqs = new WP_Query($faq_arr);
        if($faqs->have_posts())  :
        
        ?>
		<section id="faq" class="section-faq">
			<div class="container">
				<h3 class="section-title text-center mb-5 text-white">Frequently Asked Question</h3>
				<div class="row">
					<div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php 
                        $id = 0;
                        while($faqs->have_posts()) :
                            $faqs->the_post();
                            $qns = get_field('question');
                            $ans = get_field('answer');
                            $id = $id++;
                        
                        ?>
					  <div class="accordion-item">
					    <h2 class="accordion-header" id="flush-headingOne">
					      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $id; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
					        <?php echo $qns; ?>
					      </button>
					    </h2>
					    <div id="flush-collapseOne<?php echo $id; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
					      <div class="accordion-body"><?php echo $ans; ?></div>
					    </div>
					  </div>
                      <?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</section>

        <?php endif;  ?>

        <!-- Testimonial -->
        <?php 
                              
                $arg = array(
                    'post_type' => 'testimonials',
                    'post_status' => 'publish',
                    'order_by' => 'post_id',
                    'order' => 'DESC'
                );
                
                $testimonials = new WP_Query($arg);

                if($testimonials->have_posts()) :
                ?>
		<section id="testimonial" class="section-testimonial">
			<div class="container">
				<h3 class="section-title text-center mb-5">What My Clients Say</h3>
				<div class="row">
					<div class="testimonial-slider">
              			<?php 
                          
                          while($testimonials->have_posts()) :
                            $testimonials->the_post();
                            $client_img = get_field('client_image');
                            $client_name = get_field('client_name');
                            $client_designation = get_field('client_designation');
                            $client_review = get_field('client_review');
                          ?>
                        <div class="col-md-6 single-slider">
                            <?php if($client_img): ?>
                            <div class="client-img">
                                <img src="<?php echo $client_img['url'] ?>" alt="<?php echo $client_img['alt']; ?>">
                            </div>
                            <?php  endif; ?>
                            <div class="client-info">
                                <h4 class="client-name"><?php echo $client_name; ?></h4>
                                <p class="desination"><?php echo $client_designation; ?></p>
                            </div>
                            <div class="client-comment">
                                <p><?php echo $client_review; ?></p>
                            </div>
                           
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
				</div>
			</div>
		</section>
        <?php endif; ?>
	</main>
<?php get_footer(); ?>