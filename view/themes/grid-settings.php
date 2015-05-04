<?php
/**
 * Project: x-related-posts
 * File: grid-settings.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 4/5/2015
 * Time: 10:02 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */
if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}

/* @var \x_related_posts\themes\theme $callee */
/* @var \xd_v141226_dev\views $this */
/* @var array $options */

?>
<div class="form-horizontal" role="form">

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'number',
			'name'        => '[numOfPostsPerRow]',
			'title'       => $this->__( 'numOfPostsPerRow' ),
			'placeholder' => $this->__( 'numOfPostsPerRow' ),
			'required'    => true,
			'id'          => 'numOfPostsPerRow',
			'attrs'       => '',
			'classes'     => 'form-control col-md-10',
			'validation_patterns' => array(
				array(
					'name'        => 'numOfPostsPerRowMin',
					'description' => $this->__( 'Value for this field must be a positive integer' ),
					'regex'       => '/^0*[1-9]+[0-9]*$/',
					'minimum' => 1,
				)
			),
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->fieldMarkup( $options['numOfPostsPerRow'], $inputOptions );
			?>
		</div>
	</div>

</div>