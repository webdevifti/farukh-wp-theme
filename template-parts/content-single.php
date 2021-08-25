<article>
    <div class="card">
       
        <?php
            if(has_post_thumbnail()):
                the_post_thumbnail( 'thumbnail', array( 'class' => 'card-img-top' ) );
            else:

            endif;
        ?>
           
        <div class="card-body">
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
        </div>
    </div>
</article>
<?php comments_template(); ?>