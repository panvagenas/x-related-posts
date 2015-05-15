<?php
/**
 * Project: x-related-posts
 * File: post_exc_color.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 15/5/2015
 * Time: 10:42 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */
if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}

/* @var \x_related_posts\themes\theme $callee */
/* @var \xd_v141226_dev\views $this */
/* @var array $options */

if ( isset( $options['post_exc_color'] ) ) {
	?>
	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'          => 'color',
			'name'          => '[post_exc_color]',
			'title'         => $this->__( 'Post excerpt color' ),
			'placeholder'   => $this->__( 'Post excerpt color' ),
			'id'            => 'post-exc-color',
			'attrs'         => '',
			'default_value' => '#ffffff',
			'classes'       => ''
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-2">
			<?php
			echo $callee->fieldMarkup( $options['post_exc_color'], $inputOptions );
			?>
		</div>
	</div>
<?php
}
