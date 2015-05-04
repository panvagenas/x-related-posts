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
		$inputOptions = array(
			'type'        => 'select',
			'name'        => '[main_position]',
			'title'       => $this->__( 'Position' ),
			'placeholder' => $this->__( 'Position' ),
			'required'    => true,
			'id'          => 'main-position',
			'attrs'       => '',
			'classes'     => 'form-control col-md-10',
			'options'     => array(
				array(
					'label' => $this->__( 'Top' ),
					'value' => 'top'
				),
				array(
					'label' => $this->__( 'Bottom' ),
					'value' => 'bottom'
				)
			)
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_position' ), $inputOptions );
			?>
		</div>
	</div>

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
			'classes'     => 'form-control col-md-10',
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
			'type'        => 'checkbox',
			'name'        => '[main_crop_thumb]',
			'title'       => $this->__( 'Crop thumbnail' ),
			'id'          => 'main-crop-thumb',
			'attrs'       => '',
			'classes'     => 'form-control col-md-10'
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
			'classes'     => 'form-control col-md-10',
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
			'classes'     => 'form-control col-md-10',
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

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'           => 'media',
			'name'           => '[default_thumb]',
			'title'          => $this->__( 'Default thumbnail' ),
			'placeholder'    => $this->__( 'Default thumbnail' ),
			'button_label'   => $this->__('Choose Image'),
			'alt'            => $this->__('Default thumbnail'),
			'src'            => '',
			'use_button_tag' => false,
			'required'       => true,
			'id'             => 'default-thumb',
			'attrs'          => '',
			'classes'        => 'form-control col-md-9'
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'default_thumb' ), $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'number',
			'name'        => '[main_post_ttl_size]',
			'title'       => $this->__( 'Post title size' ),
			'placeholder' => $this->__( 'Post title size' ),
			'id'          => 'main-post-ttl-size',
			'attrs'       => '',
			'classes'     => 'form-control col-md-10',
			'validation_patterns' => array(
				array(
					'name'        => 'main_post_ttl_size',
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
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_post_ttl_size' ), $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'color',
			'name'        => '[main_post_ttl_color]',
			'title'       => $this->__( 'Post title color' ),
			'placeholder' => $this->__( 'Post title color' ),
			'id'          => 'main-post-ttl-color',
			'attrs'       => '',
			'classes'     => 'form-control col-md-10'
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-2">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_post_ttl_color' ), $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'number',
			'name'        => '[main_post_exc_size]',
			'title'       => $this->__( 'Post excerpt size' ),
			'placeholder' => $this->__( 'Post excerpt size' ),
			'id'          => 'main-post-exc-size',
			'attrs'       => '',
			'classes'     => 'form-control col-md-10',
			'validation_patterns' => array(
				array(
					'name'        => 'main_post_exc_size',
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
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_post_exc_size' ), $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'color',
			'name'        => '[main_post_exc_color]',
			'title'       => $this->__( 'Post excerpt color' ),
			'placeholder' => $this->__( 'Post excerpt color' ),
			'id'          => 'main-post-exc-color',
			'attrs'       => '',
			'classes'     => 'form-control col-md-10'
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-2">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_post_exc_color' ), $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'text',
			'name'        => '[read_more]',
			'title'       => $this->__( 'Read more text' ),
			'placeholder' => $this->__( 'Read more text' ),
			'id'          => 'read-more',
			'attrs'       => '',
			'classes'     => 'form-control col-md-10'
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'read_more' ), $inputOptions );
			?>
		</div>
	</div>

</div>