<div class="clear"></div>
</div>
</div>
<div id="footer">
	<footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter" role="contentinfo">
	<?php $footermenu = wp_nav_menu( array( 'theme_location' => 'footer','fallback_cb' => '','echo' => '0' ) ); if($footermenu){ echo '<div class="footermenu">'.$footermenu.'</div>'; } ?>
	<div class="footercopyright">
		<?php get_template_part('footer-az'); 
		$logo = get_option('logo'); 
		$lightlogo = get_option('logox');
		if ( ! $logo) $logo = $lightlogo;
		?>
		<div class="copyright<?php $azslugx = get_option('azslug'); if($azslugx==''){echo ' marx'; } ?>">
			<div class="footer-logo"><img src="<?php echo $logo; ?>" title="" alt=""><script>updateFooterLogo();</script></div>
			<div class="txt">
				<span>Copyright © <?php echo date('Y'); ?>All Rights Reserved</span>
			</div>
		</div>
	</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>