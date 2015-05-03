<?php
/**
 * Project: x-related-posts
 * File: grid.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 6:13 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}

/* @var \x_related_posts\themes\theme $this */

foreach ( array_slice($related, 0, 10) as $relPost ) {
	/* @var \x_related_posts\posts $post */
	$post = $this->©post($relPost->pid2);
	?>
	<div>
		<h3><?php echo $post->post_title; ?></h3>
		<p>
			<?php echo $post->getExcerpt(10, ' ...more'); ?>
		</p>
	</div>
	<?php
}
