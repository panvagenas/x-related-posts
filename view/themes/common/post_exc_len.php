<?php
/**
 * Project: x-related-posts
 * File: post_exc_len.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 15/5/2015
 * Time: 10:42 μμ
 * Since: 150429
 * Copyright: 2015 Panagiotis Vagenas
 */
if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}

/* @var \x_related_posts\themes\theme $callee */
/* @var \xd_v141226_dev\views $this */
/* @var array $options */

if ( isset( $options['post_exc_len'] ) ) {
	?>
	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'                => 'number',
			'name'                => '[post_exc_len]',
			'title'               => $this->__( 'Post excerpt length (words)' ),
			'placeholder'         => $this->__( 'Post excerpt length (words)' ),
			'id'                  => 'post-exc-len',
			'attrs'               => '',
			'classes'             => '',
			'validation_patterns' => array(
				array(
					'name'        => 'post_exc_len',
					'description' => $this->__( 'Value for this field must be zero or a positive integer' ),
					'regex'       => '/^[0-9]+$/',
					'minimum'     => 0,
				)
			),
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->fieldMarkup( $options['post_exc_len'], $inputOptions );
			?>
		</div>
	</div>
<?php
}
