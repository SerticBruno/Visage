</div>
	<?php $footer = get_field('footer', 'option'); ?>

		<footer class="footer" role="contentinfo">

			<?php
				if(!is_page('kontakt'))
					include THEME_DIR . '/templates/acf/footer_contact_form.php';  
			?>

			<div class="modal fade" id="modal" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						<div class="modal-body">
						</div>
					</div>
				</div>
			</div>

			<div class="footer-border">
				<div class="container">
					<div class="row pt-4">
						<div class="col-12 col-md-2 info-text">
							<?php echo $footer['description'] ?>
						</div>
						<div class="col-12 col-md-8">
							<ul class="footer-socials d-flex justify-content-around">
								<?php
									foreach ($footer['social_icons'] as $k => $v) { 
										
										$logo = $v['logo']['url']
										
									?>
										<li class="d-inline">
											<a class="d-inline-block" target="_blank" href="<?php echo $v['url'] ?>">
												<img src="<?php echo $logo ?>" alt="<?php echo $v['logo']['alt']?>"/>
											</a>
										</li>
									<?php }
								?>
								<li class="d-inline">
									<a class="d-inline-block" href="https://wa.me/<?php echo urlencode($footer['telephone']); ?>">
										<img src="<?php echo $footer['whatsapp_logo']['url'] ?>"/>
									</a>
								</li>
							</ul>						
						</div>
						<div class="col-12 col-md-2">
							<?php echo $footer['payment_description'] ?>
							<ul class="footer-payments d-flex d-md-inline d-lg-flex">
								<?php
									foreach ($footer['payment_options'] as $k => $v) { 
										
										$logo = $v['logo']['url']
										
									?>
										<li>
											<img src="<?php echo $logo ?>" alt="<?php echo $v['logo']['alt']?>"/>
										</li>
									<?php }
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="copyright" class="text-center pt-3 pb-2">
				<a href="<?php echo home_url()?>">&copy; <?php echo esc_html( date_i18n( __( 'Y', 'visage' ) ) ); ?> VISAGE Studio</a>
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