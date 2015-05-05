<?php
/**
 * Project: x-related-posts
 * File: themes-common.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 5/5/2015
 * Time: 2:40 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

/* @var \x_related_posts\themes\theme $callee */
/* @var \xd_v141226_dev\views $this */
/* @var array $options */
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

<div class="form-group row">
	<?php
	$inputOptions = array(
		'type'          => 'color',
		'name'          => '[post_ttl_color]',
		'title'         => $this->__( 'Post title color' ),
		'placeholder'   => $this->__( 'Post title color' ),
		'id'            => 'post-ttl-color',
		'attrs'         => '',
		'default_value' => '#ffffff',
		'classes'       => 'form-control col-md-10'
	);
	?>
	<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
		<?php echo $inputOptions['title']; ?>
	</label>

	<div class="col-sm-2">
		<?php
		echo $callee->fieldMarkup( $options['post_ttl_color'], $inputOptions );
		?>
	</div>
</div>

<div class="form-group row">
	<?php
	$inputOptions = array(
		'type'                => 'number',
		'name'                => '[post_exc_size]',
		'title'               => $this->__( 'Post excerpt size' ),
		'placeholder'         => $this->__( 'Post excerpt size' ),
		'id'                  => 'post-exc-size',
		'attrs'               => '',
		'classes'             => 'form-control col-md-10',
		'validation_patterns' => array(
			array(
				'name'        => 'post_exc_size',
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
		echo $callee->fieldMarkup( $options['post_exc_size'], $inputOptions );
		?>
	</div>
</div>

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
		'classes'       => 'form-control col-md-10'
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