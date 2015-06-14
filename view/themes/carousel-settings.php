<?php
/**
 * Project: x-related-posts
 * File: carousel-settings.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 4/5/2015
 * Time: 10:02 μμ
 * Since: 150429
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
		'type'    => 'select',
		'name'    => '[thumbCaption]',
		'title'   => $this->__( 'thumbCaption' ),
		'id'      => 'thumbCaption',
		'attrs'   => '',
		'classes' => '',
		'options'     => array(
			array(
				'value' => '1',
				'label' => 'Yes'
			),
			array(
				'value' => '0',
				'label' => 'No'
			)
		)
	);
	?>
	<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
		<?php echo $inputOptions['title']; ?>
	</label>

	<div class="col-sm-7">
		<?php
		echo $callee->fieldMarkup( $options['thumbCaption'], $inputOptions );
		?>
	</div>
</div>

<div class="form-group row">
	<?php
	$inputOptions = array(
		'type'    => 'select',
		'name'    => '[carouselPauseHover]',
		'title'   => $this->__( 'carouselPauseHover' ),
		'id'      => 'carouselPauseHover',
		'attrs'   => '',
		'classes' => '',
		'options'     => array(
			array(
				'value' => '1',
				'label' => 'Yes'
			),
			array(
				'value' => '0',
				'label' => 'No'
			)
		)
	);
	?>
	<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
		<?php echo $inputOptions['title']; ?>
	</label>

	<div class="col-sm-7">
		<?php
		echo $callee->fieldMarkup( $options['carouselPauseHover'], $inputOptions );
		?>
	</div>
</div>

<div class="form-group row">
	<?php
	$inputOptions = array(
		'type'                => 'number',
		'name'                => '[carouselAutoTime]',
		'title'               => $this->__( 'carouselAutoTime' ),
		'placeholder'         => $this->__( 'carouselAutoTime' ),
		'required'            => true,
		'id'                  => 'carouselAutoTime',
		'attrs'               => '',
		'classes'             => '',
		'validation_patterns' => array(
			array(
				'name'        => 'carouselAutoTimeMin',
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
		echo $callee->fieldMarkup( $options['carouselAutoTime'], $inputOptions );
		?>
	</div>
</div>

<div class="form-group row">
	<?php
	$inputOptions = array(
		'type'                => 'number',
		'name'                => '[carouselMaxVisible]',
		'title'               => $this->__( 'carouselMaxVisible' ),
		'placeholder'         => $this->__( 'carouselMaxVisible' ),
		'required'            => true,
		'id'                  => 'carouselMaxVisible',
		'attrs'               => '',
		'classes'             => '',
		'validation_patterns' => array(
			array(
				'name'        => 'carouselMaxVisibleMin',
				'description' => $this->__( 'Value for this field must be a positive integer' ),
				'regex'       => '/^0*[1-9]{1}[0-9]*$/',
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
		echo $callee->fieldMarkup( $options['carouselMaxVisible'], $inputOptions );
		?>
	</div>
</div>

<div class="form-group row">
	<?php
	$inputOptions = array(
		'type'                => 'number',
		'name'                => '[carouselMinVisible]',
		'title'               => $this->__( 'carouselMinVisible' ),
		'placeholder'         => $this->__( 'carouselMinVisible' ),
		'required'            => true,
		'id'                  => 'carouselMinVisible',
		'attrs'               => '',
		'classes'             => '',
		'validation_patterns' => array(
			array(
				'name'        => 'carouselMinVisibleMin',
				'description' => $this->__( 'Value for this field must be a positive integer' ),
				'regex'       => '/^0*[1-9]{1}[0-9]*$/',
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
		echo $callee->fieldMarkup( $options['carouselMinVisible'], $inputOptions );
		?>
	</div>
</div>
