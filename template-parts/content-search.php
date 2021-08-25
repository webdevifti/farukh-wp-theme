<article>
    <div class="card">
        <a href="<?php the_permalink(); ?>">
        <?php
            if(has_post_thumbnail()):
                the_post_thumbnail( 'thumbnail', array( 'class' => 'card-img-top' ) );
            else:

            endif;
        ?>
            <!-- <img src="assets/img/bg.jpg" class="card-img-top"> -->
        </a>
        <div class="card-body">
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>