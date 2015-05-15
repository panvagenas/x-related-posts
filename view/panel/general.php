<?php
/**
 * Project: x-related-posts
 * File: general.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 2/5/2015
 * Time: 9:48 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}

/* @var \x_related_posts\menu_pages\panels\general $callee */
/* @var \xd_v141226_dev\views $this */

?>
<div class="form-horizontal" role="form">

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'select',
			'name'        => '[track_visited]',
			'title'       => $this->__( 'Enable Tracking System' ),
			'id'          => 'track-visited',
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
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'track_visited' ), $inputOptions );
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
			'classes'     => ''
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
			'classes'        => ''
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

</div>