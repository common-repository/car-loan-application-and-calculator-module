<?php

class clm_form {

	public function getSupportedFields()
	{

		$fields = array('text','textarea','dropdown','checkbox','radio');

		return $fields;

	}

	public function getFieldPanels(){

		$panels = array();

		$panels[] = array(

			'class' => 'input_form_fields',
			'id'	=> 'clm_input_type',
			'panel_fields' => array(

				'field_1' => array(

					'label' => 'label',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'input_type_label',
					'name'	=> 'input_type_label'
					
				),
				'field_2' => array(

					'label' => 'ID',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'input_type_id',
					'name'	=> 'input_type_id'

				),

				'field_3' => array(

					'label' => 'Class',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'input_type_class',
					'name'	=> 'input_type_class'

				),

				'field_4' => array(

					'label' => 'Placeholder',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'input_type_placeholder',
					'name'	=> 'input_type_placeholder'

				),

				'field_5' => array(

					'type'	=> 'button',
					'class' => 'afm-field',
					'id'	=> 'clm_input_type_button',
					'inner_html' => 'Add Field'

				)

			)
		);

		$panels[] = array(

			'class' => 'input_form_fields',
			'id'	=> 'clm_textarea_type',
			'panel_fields' => array(

				'field_1' => array(

					'label' => 'Label',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'textarea_type_label',
					'name'	=> 'textarea_type_label',
					'notice' => ''
					
				),

				'field_2' => array(

					'label' => 'ID',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'textarea_type_id',
					'name'	=> 'textarea_type_id',
					'notice' => ''
					
				),

				'field_3' => array(

					'label' => 'Class',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'textarea_type_class',
					'name'	=> 'textarea_type_class',
					'notice' => ''
					
				),

				'field_4' => array(

					'label' => 'Col Number',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'textarea_type_col',
					'name'	=> 'textarea_type_col',
					'notice' => ''
					
				),

				'field_5' => array(

					'label' => 'Row Number',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'textarea_type_row',
					'name'	=> 'textarea_type_row',
					'notice' => ''
					
				),

				'field_6' => array(

					'type'	=> 'button',
					'class' => 'afm-field',
					'id'	=> 'clm_textarea_type_button',
					'inner_html' => 'Add Field',
					'notice' => ''

				)

			)

		);


		$panels[] = array(

			'class' => 'input_form_fields',
			'id'	=> 'clm_dropdown_type',
			'panel_fields' => array(

				'field_1' => array(

					'label' => 'Label',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'dropdown_type_label',
					'name'	=> 'dropdown_type_label',
					'notice' => ''
					
				),

				'field_2' => array(

					'label' => 'ID',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'dropdown_type_id',
					'name'	=> 'dropdown_type_id',
					'notice' => ''
					
				),

				'field_3' => array(

					'label' => 'Class',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'dropdown_type_class',
					'name'	=> 'dropdown_type_class',
					'notice' => ''
					
				),

				'field_4' => array(

					'label' => 'Options',
					'type'	=> 'textarea',
					'class' => 'afm-field',
					'id'	=> 'dropdown_type_options',
					'name'	=> 'dropdown_type_options',
					'notice' => 'Note: Separate options with comma, no spaces.'
					
				),

				'field_5' => array(

					'type'	=> 'button',
					'class' => 'afm-field',
					'id'	=> 'clm_dropdown_type_button',
					'inner_html' => 'Add Field',
					'notice' => ''

				)

			)

		);


		$panels[] = array(

			'class' => 'input_form_fields',
			'id'	=> 'clm_checkbox_type',
			'panel_fields' => array(

				'field_1' => array(

					'label' => 'Label',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'checkbox_type_label',
					'name'	=> 'checkbox_type_label',
					'notice' => ''
					
				),

				'field_2' => array(

					'label' => 'ID',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'checkbox_type_id',
					'name'	=> 'checkbox_type_id',
					'notice' => ''
					
				),

				'field_3' => array(

					'label' => 'Class',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'checkbox_type_class',
					'name'	=> 'checkbox_type_class',
					'notice' => ''
					
				),

				'field_4' => array(

					'label' => 'Default Value',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'checkbox_type_default_val',
					'name'	=> 'checkbox_type_default_val',
					'notice' => ''
					
				),

				'field_5' => array(

					'type'	=> 'button',
					'class' => 'afm-field',
					'id'	=> 'clm_checkbox_type_button',
					'inner_html' => 'Add Field',
					'notice' => ''

				)

			)

		);

		$panels[] = array(

			'class' => 'input_form_fields',
			'id'	=> 'clm_radio_type',
			'panel_fields' => array(

				'field_1' => array(

					'label' => 'Label',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'radio_type_label',
					'name'	=> 'radio_type_label',
					'notice' => ''
					
				),

				'field_2' => array(

					'label' => 'ID',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'radio_type_id',
					'name'	=> 'radio_type_id',
					'notice' => ''
					
				),

				'field_3' => array(

					'label' => 'Class',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'radio_type_class',
					'name'	=> 'radio_type_class',
					'notice' => ''
					
				),

				'field_4' => array(

					'label' => 'Name',
					'type'	=> 'text',
					'class' => 'afm-field',
					'id'	=> 'radio_type_name',
					'name'	=> 'radio_type_name',
					'notice' => ''
					
				),

				'field_5' => array(

					'label' => 'Options',
					'type'	=> 'textarea',
					'class' => 'afm-field',
					'id'	=> 'radio_type_options',
					'name'	=> 'radio_type_options',
					'notice' => 'Note: Separate options with comma, no spaces.'
					
				),

				'field_6' => array(

					'type'	=> 'button',
					'class' => 'afm-field',
					'id'	=> 'clm_checkbox_type_button',
					'inner_html' => 'Add Field',
					'notice' => ''

				)

			)

		);

		return $panels;

	}

}