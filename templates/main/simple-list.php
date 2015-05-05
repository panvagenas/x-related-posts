<?php
/**
 * Project: x-related-posts
 * File: simple-list.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 3/5/2015
 * Time: 6:23 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}

/* @var \x_related_posts\themes\theme $this */
/* @var array $related */

$options = $this->getOptions();

if ( ! empty( $related ) ) {
	$style = '';
	if ( isset( $options['borderWeight'] ) && $options['borderWeight'] > 0 ) {
		$style .= ' border: ' . $options['borderWeight'] . 'px solid; ';
	}
	if ( isset( $options['borderRadius'] ) && $options['borderRadius'] > 0 ) {
		$style .= ' border-radius:  ' . $options['borderRadius'] . 'px; ';
	}
	if ( isset( $options['borderColor'] ) && $options['borderColor'] != '#ffffff' ) {
		$style .= ' border-color: ' . $options['borderColor'] . '; ';
	}
	?>
	<div class="x-related-wrapper"  style="<?php echo $style; ?>">
		<?php
		if ($options['orderedList']){
			?>
			<ol>
			<?php
		} else {
			echo '<ul>';
		}
		foreach ( $related as $rel ) {
			/* @var \x_related_posts\posts $post */
			$post = $this->©post( $rel->pid2 );
			?>
			<li>
				<a href="<?php echo $post->getThePermalink(); ?>" target="_self">
					<?php echo $post->post_title; ?>
				</a>
			</li>
		<?php
		}
		if ($options['orderedList']){
			?>
			</ol>
			<?php
		} else {
			echo '</ul>';
		}
			?>
	</div>
<?php
}
