<?php
/**
 * Project: x-related-posts
 * File: excluded.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 2/5/2015
 * Time: 9:51 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}

/* @var \x_related_posts\menu_pages\panels\layout $callee */
/* @var \xd_v141226_dev\views $this */

?>
<div class="form-horizontal" role="form">

	<div class="form-group row">
		<?php
		$options = array();
		foreach ( \x_related_posts\options::$contentPositioningOptions as $k => $v ) {
			$options[] = array(
				'label' => $v,
				'value' => $k,
			);
		}

		$inputOptions = array(
			'type'        => 'select',
			'name'        => '[main_content]',
			'title'       => $this->__( 'Content' ),
			'id'          => 'main-content',
			'attrs'       => '',
			'classes'     => '',
			'options'     => $options
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_content' ), $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'select',
			'name'        => '[main_crop_thumb]',
			'title'       => $this->__( 'Crop thumbnail' ),
			'id'          => 'main-crop-thumb',
			'attrs'       => '',
			'classes'     => '',
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
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_crop_thumb' ), $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'number',
			'name'        => '[main_thumb_width]',
			'title'       => $this->__( 'Thumbnail width' ),
			'placeholder' => $this->__( 'Thumbnail width' ),
			'id'          => 'main-thumb-width',
			'attrs'       => '',
			'classes'     => '',
			'validation_patterns' => array(
				array(
					'name'        => 'main_thumb_width',
					'description' => $this->__( 'Value for this field must be zero or a positive integer' ),
					'regex'       => '/^[0-9]+$/',
					'minimum' => 0,
				)
			),
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_thumb_width' ), $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'number',
			'name'        => '[main_thumb_height]',
			'title'       => $this->__( 'Thumbnail height' ),
			'placeholder' => $this->__( 'Thumbnail height' ),
			'id'          => 'main-thumb-height',
			'attrs'       => '',
			'classes'     => '',
			'validation_patterns' => array(
				array(
					'name'        => 'main_thumb_height',
					'description' => $this->__( 'Value for this field must be zero or a positive integer' ),
					'regex'       => '/^[0-9]+$/',
					'minimum' => 0,
				)
			),
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_thumb_height' ), $inputOptions );
			?>
		</div>
	</div>

</div>