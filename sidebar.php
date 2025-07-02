<div id="sidebar">
	<?php remove_action( 'pre_get_posts', 'reorder_tax' ); remove_action( 'pre_get_posts', 'reorder_blog' ); ts_playlist('DESC','F j, Y'); ?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	<?php endif; ?>			
</div>