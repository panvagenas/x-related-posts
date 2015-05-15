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
/* @var array $related */
/* @var string $relPostClass */

$numOfPostsPerRow = (int) $this->options['numOfPostsPerRow'];
$contentPositions = str_split( $this->options[ 'content' ] );
?>
<div class="xrp">
	<h2><?php echo $this->©option->get( 'main_title' ); ?></h2>
	<?php
	$i            = 0;
	$numOfRelLeft = count( $related );
	while ( $numOfRelLeft > 0 ) {
		$relRow = array_slice( $related, $i ++ * $numOfPostsPerRow, $numOfPostsPerRow );
		$numOfRelLeft -= count( $relRow );
		?>
		<div class="row">
			<?php
			foreach ( $relRow as $key => $rel ) {
				/* @var \x_related_posts\posts $post */
				$rel  = (object) $rel;
				$post = $this->©post( $rel->pid2 );
				?>
				<div class="<?php echo $relPostClass; ?> col">
					<a href="<?php echo $post->getThePermalink(); ?>">
						<?php
						foreach ( $contentPositions as $c ) {
							if ( $c === 't' ) {
								// title
								echo $this->getPostTitleFormatted($post);
							} elseif ( $c === 'p' ) {
								// thumbnail
								echo '<img src="' . $post->getThumbnail() . '">';
							} else {
								// exc
								echo $this->getPostExcFormatted($post);
							}
						}
						?>
					</a>
					<?php
					if($this->©user->is_super_admin()){
						echo '<p>';
						echo 'host ID: ' . $rel->pid1;
						echo '<br>ID: ' . $rel->pid2;
						echo '<br>Rating: ' . round($rel->rating, 4);
						echo '<br>Date: ' . $rel->post_date;
						echo '</p>';
					}
					?>
				</div>
			<?php
			}
			?>
		</div>
	<?php
	}
	?>
</div>
