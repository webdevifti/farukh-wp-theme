<footer>
	<?php 
	
	$args = array(
		'post_type' => 'footer_socials',
		'post_status' => 'publish',
		'order_by' => 'post_id',
		'order' => 'ASC'
	);
	$item = new WP_Query($args);
	if($item->have_posts()) :
	
	?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12">
					<h3>Stay Connect With Me</h3>
					<div class="footer-social-link">
						<?php 
							while($item->have_posts()) :
								$item->the_post();
								$url = get_field('social_url');
								$class = get_field('social_class');
						
						?>
						<a href="<?php echo $url; ?>"><i class="fab <?php echo $class; ?>"></i></a>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="footer-bottom">
			<p>Copyright &copy; <?php echo date('Y'); ?> | All Right Resereved <a href="https://faruksheikh.net/">faruksheikh.net</a> | Developed by <a href="https://webdevifti.com">webdevifti</a></p>
		</div>
	</footer>
    <?php wp_footer(); ?>
</body>
</html>