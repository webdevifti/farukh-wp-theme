<section id="comments">
	<div class="comments_area">
		<?php
			if (!have_comments()) :
				
			else:
				echo "<h2>". get_comments_number(). ' Comments </h2><hr>';
			endif;

		?>
		<div class="comments-inner">
			<?php

			wp_list_comments(
				array(
					'avatar_size' => 50,
					'style' => 'li',
				)
				
			);
			?>
		</div>
		<div class="comments-form">
			<?php 
				if (comments_open()) :
					comment_form(
						array(
							'class_form' => 'post-comment-form',
						)
					);
				endif;

			?>
		</div>
	</div>
</section>