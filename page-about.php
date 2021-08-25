<?php 
// Template Name: About
?>
<?php get_header(); ?>
<main style="padding: 30px 0;">
		<div class="container">
			<div class="row">
                <?php
                 if(have_posts()):
                    while(have_posts()):
                        the_post();
                        ?>
                        <div class="col-md-4">
                            <?php
                                if(has_post_thumbnail()):
                                    the_post_thumbnail( 'medium', array( 'class' => 'about-section-top-image' ) );
                                else:

                                endif;
                        
                            ?>
                        </div>
                        <div class="col-md-8">
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>