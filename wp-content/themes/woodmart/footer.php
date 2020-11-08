<?php
/**
 * The template for displaying the footer
 *
 */
?>
<?php if ( woodmart_needs_footer() ): ?>
	<?php if ( ! woodmart_is_woo_ajax() ): ?>
		</div><!-- .main-page-wrapper --> 
	<?php endif ?>
		</div> <!-- end row -->
	</div> <!-- end container -->
	<?php
		$page_id = woodmart_page_ID();
		$disable_prefooter = get_post_meta( $page_id, '_woodmart_prefooter_off', true );
		$disable_footer_page = get_post_meta( $page_id, '_woodmart_footer_off', true );
		$disable_copyrights_page = get_post_meta( $page_id, '_woodmart_copyrights_off', true );
	?>
	<?php if ( ! $disable_prefooter && woodmart_get_opt( 'prefooter_area' ) ): ?>
		<div class="woodmart-prefooter">
			<div class="container">
				<?php echo do_shortcode( woodmart_get_opt( 'prefooter_area' ) ); ?>
			</div>
		</div>
	<?php endif ?>
	
	<!-- FOOTER -->
	<footer class="footer-container color-scheme-<?php echo esc_attr( woodmart_get_opt( 'footer-style' ) ); ?>">

		<?php
			if ( ! $disable_footer_page && woodmart_get_opt( 'disable_footer' ) ) {
				get_sidebar( 'footer' );
			}
		 ?>
		<?php if ( !$disable_copyrights_page && woodmart_get_opt( 'disable_copyrights' ) ): ?>
			<div class="copyrights-wrapper copyrights-<?php echo esc_attr( woodmart_get_opt( 'copyrights-layout' ) ); ?>">
				<div class="container">
					<div class="min-footer">
						<div class="col-left reset-mb-10">
							<?php if ( woodmart_get_opt( 'copyrights' ) != '' ): ?>
								<?php echo do_shortcode( woodmart_get_opt( 'copyrights' ) ); ?>
							<?php else: ?>
								<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. <?php esc_html_e( 'All rights reserved', 'woodmart' ) ?></p>
							<?php endif ?>
						</div>
						<?php if ( woodmart_get_opt( 'copyrights2' ) != '' ): ?>
							<div class="col-right reset-mb-10">
								<?php echo do_shortcode( woodmart_get_opt( 'copyrights2' ) ); ?>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
		<?php endif ?>
		

	<!-- Yandex.Metrika counter -->
<script type="text/javascript" async>
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(36375505, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/36375505" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
		<script type="text/javascript">
    var head = document.head
            , link = document.createElement('link');

    link.type = 'text/css';
    link.rel = 'stylesheet';
    link.href = '{{ css_file }}';
    head.appendChild(link);
</script>
	</footer>
<?php endif ?>
</div> <!-- end wrapper -->
<div class="woodmart-close-side"></div>
<?php do_action( 'woodmart_before_wp_footer' ); ?>
<?php wp_footer(); ?>
<script src="//code.jivosite.com/widget.js" data-jv-id="0l3Sgsaj5R" async></script>
</body>
</html>
