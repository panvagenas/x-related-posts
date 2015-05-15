<?php
/**
 * Project: x-related-posts
 * File: post_ttl_size.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 15/5/2015
 * Time: 10:40 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */
if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}

/* @var \x_related_posts\themes\theme $callee */
/* @var \xd_v141226_dev\views $this */
/* @var array $options */

if(isset($options['post_ttl_size'])) {
	?>
	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'                => 'number',
			'name'                => '[post_ttl_size]',
			'title'               => $this->__( 'Post title size' ),
			'placeholder'         => $this->__( 'Post title size' ),
			'id'                  => 'post-ttl-size',
			'attrs'               => '',
			'classes'             => 'form-control col-md-10',
			'validation_patterns' => array(
				array(
					'name'        => 'post_ttl_size',
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
			echo $callee->fieldMarkup( $options['post_ttl_size'], $inputOptions );
			?>
		</div>
	</div>
<?php
}