
<?php  
// Template Name: Contact
?>
<?php get_header(); ?>
    <main style="padding: 30px 0;">
		<div class="container">
			<div class="row">
                <h3>Hey, Feel Free To Contact With Me</h3>
                <hr>
                <?php

                if(have_posts()):
                    while(have_posts()):
                        the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>