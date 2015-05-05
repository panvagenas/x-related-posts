<?php
/**
 * Project: x-related-posts
 * File: simple-list-settings.php
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

<div class="form-group row">
	<?php
	$inputOptions = array(
		'type'    => 'checkbox',
		'name'    => '[orderedList]',
		'title'   => $this->__( 'orderedList' ),
		'id'      => 'orderedList',
		'attrs'   => '',
		'classes' => 'form-control col-md-10'
	);
	?>
	<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
		<?php echo $inputOptions['title']; ?>
	</label>

	<div class="col-sm-7">
		<?php
		echo $callee->fieldMarkup( $options['orderedList'], $inputOptions );
		?>
	</div>
</div>

<div class="form-group row">
	<?php
	$inputOptions = array(
		'type'          => 'color',
		'name'          => '[borderColor]',
		'title'         => $this->__( 'borderColor' ),
		'placeholder'   => $this->__( 'borderColor' ),
		'id'            => 'borderColor',
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
		echo $callee->fieldMarkup( $options['borderColor'], $inputOptions );
		?>
	</div>
</div>

<div class="form-group row">
	<?php
	$inputOptions = array(
		'type'                => 'number',
		'name'                => '[borderRadius]',
		'title'               => $this->__( 'borderRadius' ),
		'placeholder'         => $this->__( 'borderRadius' ),
		'required'            => true,
		'id'                  => 'borderRadius',
		'attrs'               => '',
		'classes'             => 'form-control col-md-10',
		'validation_patterns' => array(
			array(
				'name'        => 'borderRadiusMin',
				'description' => $this->__( 'Value for this field must be a positive integer' ),
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
		echo $callee->fieldMarkup( $options['borderRadius'], $inputOptions );
		?>
	</div>
</div>

<div class="form-group row">
	<?php
	$inputOptions = array(
		'type'                => 'number',
		'name'                => '[borderWeight]',
		'title'               => $this->__( 'borderWeight' ),
		'placeholder'         => $this->__( 'borderWeight' ),
		'required'            => true,
		'id'                  => 'borderWeight',
		'attrs'               => '',
		'classes'             => 'form-control col-md-10',
		'validation_patterns' => array(
			array(
				'name'        => 'borderWeightMin',
				'description' => $this->__( 'Value for this field must be a positive integer' ),
				'regex'       => '/^[0-9]+$/',
				'minimum'     => 1,
			)
		),
	);
	?>
	<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
		<?php echo $inputOptions['title']; ?>
	</label>

	<div class="col-sm-7">
		<?php
		echo $callee->fieldMarkup( $options['borderWeight'], $inputOptions );
		?>
	</div>
</div>
