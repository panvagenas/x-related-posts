<?php
/**
 * Project: x-related-posts
 * File: content.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 2/5/2015
 * Time: 9:49 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2015 Panagiotis Vagenas
 */

if ( ! defined( 'WPINC' ) ) {
	exit( 'Do NOT access this file directly: ' . basename( __FILE__ ) );
}

/* @var \x_related_posts\menu_pages\panels\main_settings $callee */
/* @var \xd_v141226_dev\views $this */

?>
<div class="form-horizontal" role="form">

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'select',
			'name'        => '[main_activate]',
			'title'       => $this->__( 'Activate Output in Post Content Area' ),
			'id'          => 'main-activate',
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
			echo $callee->menu_page->option_form_fields->markup( $options[ 'main_activate' ], $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'text',
			'name'        => '[main_title]',
			'title'       => $this->__( 'Plugin Title in Post Content Area' ),
			'placeholder' => $this->__( 'Plugin Title in Post Content Area' ),
			//'required'    => true,
			'id'          => 'main-title',
			'attrs'       => '',
			'classes'     => ''
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $options[ 'main_title' ], $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$selectOptions = array();
		foreach ( \x_related_posts\options::$fetchByOptions as $k => $v ) {
			$selectOptions[] = array(
				'label' => $v,
				'value' => $k,
			);
		}
		$inputOptions = array(
			'type'        => 'select',
			'name'        => '[main_rate_by]',
			'title'       => $this->__( 'Rate related posts by' ),
			'placeholder' => $this->__( 'Rate related posts by' ),
			'required'    => true,
			'id'          => 'main-rate-by',
			'attrs'       => '',
			'classes'     => '',
			'options'     => $selectOptions
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $options[ 'main_rate_by' ], $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$selectOptions = array();
		foreach ( \x_related_posts\options::$sortOptions as $k => $v ) {
			$selectOptions[] = array(
				'label' => $v,
				'value' => $k,
			);
		}
		$inputOptions = array(
			'type'        => 'select',
			'name'        => '[main_sort_by]',
			'title'       => $this->__( 'Sort related posts by' ),
			'placeholder' => $this->__( 'Sort related posts by' ),
			'required'    => true,
			'id'          => 'main-sort-by',
			'attrs'       => '',
			'classes'     => '',
			'options'     => $selectOptions
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $options[ 'main_sort_by' ], $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$selectOptions = array();
		foreach ( \x_related_posts\options::$entropy as $k => $v ) {
			$selectOptions[] = array(
				'label' => $v,
				'value' => $k,
			);
		}
		$inputOptions = array(
			'type'        => 'select',
			'name'        => '[main_entropy]',
			'title'       => $this->__( 'Entropy' ),
			'placeholder' => $this->__( 'Entropy' ),
			'required'    => true,
			'id'          => 'main-entropy',
			'attrs'       => '',
			'classes'     => '',
			'options'     => $selectOptions
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $options[ 'main_entropy' ], $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'number',
			'name'        => '[main_posts_to_display]',
			'title'       => $this->__( 'Number of posts to display' ),
			'placeholder' => $this->__( 'Number of posts to display' ),
			'required'    => true,
			'id'          => 'main-posts-to-display',
			'attrs'       => '',
			'classes'     => '',
			'validation_patterns' => array(
				array(
					'name'        => 'main_posts_to_display_min',
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
			echo $callee->menu_page->option_form_fields->markup( $options[ 'main_posts_to_display' ], $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$inputOptions = array(
			'type'        => 'number',
			'name'        => '[main_offset]',
			'title'       => $this->__( 'Offset' ),
			'placeholder' => $this->__( 'Offset' ),
			'required'    => true,
			'id'          => 'main-offset',
			'attrs'       => '',
			'classes'     => '',
			'validation_patterns' => array(
				array(
					'name'        => 'main_offset',
					'description' => $this->__( 'Value for this field must be zero or a positive integer' ),
					'regex'       => '/^[0-9]$/',
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
			echo $callee->menu_page->option_form_fields->markup( $options[ 'main_offset' ], $inputOptions );
			?>
		</div>
	</div>

</div>