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
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_activate' ), $inputOptions );
			?>
		</div>
	</div>

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
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_title' ), $inputOptions );
			?>
		</div>
	</div>

	<div class="form-group row">
		<?php
		$options = array();
		foreach ( \x_related_posts\options::$fetchByOptions as $k => $v ) {
			$options[] = array(
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
			'options'     => $options
		);
		?>
		<label for="<?php echo $inputOptions['id']; ?>" class="col-md-3 control-label">
			<?php echo $inputOptions['title']; ?>
		</label>

		<div class="col-sm-7">
			<?php
			echo $callee->menu_page->option_form_fields->markup( $this->©option->get( 'main_rate_by' ), $inputOptions );
			?>
		</div>
	</div>

</div>