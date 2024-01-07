</div>
		<?php
			$footer = get_field('footer', 'option');
			//myErr($footer);
		?>

		<footer class="footer py-4" role="contentinfo">

			<div class="modal fade" id="modal" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="modal-body">
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-6 col-md-2 info-text order-md-first">
						<?php echo $footer['description'] ?>
					</div>
					<div class="col-12 col-md-8 order-last">
						<ul class="footer-socials d-flex justify-content-around">
							<?php
								foreach ($footer['social_icons'] as $k => $v) { 
									
									$logo = $v['logo']['url']
									
								?>
									<li class="d-inline">
										<a class="d-inline-block" target="_blank" href="<?php echo $v['url'] ?>">
											<img src="<?php echo $logo ?>"/>
										</a>
									</li>
								<?php }
							?>
						</ul>						
					</div>
				</div>
			</div>
			<div id="copyright" class="text-center">
				&copy; <a href="<?php echo home_url()?>"> <?php echo esc_html( date_i18n( __( 'Y', 'visage' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?> </a>
			</div>
		</footer>
		</div>
		<?php wp_footer(); ?>
		<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
		<script type="text/javascript">
			var homeUrl = '<?php echo get_template_directory_uri(); ?>';
			var curr_post_id = '<?php echo $post->ID; ?>';
			var adminAjax = '<?php echo admin_url('admin-ajax.php'); ?>';
		</script>
	</body>
</html>