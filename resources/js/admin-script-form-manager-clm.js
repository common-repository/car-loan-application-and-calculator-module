
jQuery(function($){

	var uniqueID = [];

	var formManager = {

		init: function(){

			$(document).ajaxSuccess(function(){ $('#form_preview').sortable(); });

			$(document).bind('change', '#clm_input_type', this.formManagerEvents.getSelectedValue);

			//adding input type=text field
			$('#clm_input_type_button').live('click', this.addField.inputText);

			//adding textarea field
			$('#clm_textarea_type_button').live('click', this.addField.textArea);

			//adding dropdown field
			$('#clm_dropdown_type_button').live('click', this.addField.dropDown);

			//removing field
			$('.remove_field').live('click', function(){

				$(this).closest('li').remove();

				$elid = $(this).data('id');

				$index = uniqueID.indexOf($elid);
				uniqueID.splice($index, 1);

				//console.log(uniqueID);

			} );

		},

		formManagerEvents: {

			getSelectedValue: function(){

				$selVal = $('#select_field_input').val();

				if( $selVal == 'text' ){

					$('#clm_input_type').show();

				} else {

					$('#clm_input_type').hide();

				}

				if( $selVal == 'textarea' ){

					$('#clm_textarea_type').show();

				} else {

					$('#clm_textarea_type').hide();

				}

				if( $selVal == 'dropdown' ){

					$('#clm_dropdown_type').show();

				} else {

					$('#clm_dropdown_type').hide();

				}

				if( $selVal == 'checkbox' ){

					$('#clm_checkbox_type').show();

				} else {

					$('#clm_checkbox_type').hide();

				}

				if( $selVal == 'radio' ){

					$('#clm_radio_type').show();

				} else {

					$('#clm_radio_type').hide();

				}

			}

		},

		addField: {

			inputText: function(e){

				$label = $('#input_type_label').val();

				$id = $('#input_type_id').val();

				$class = $('#input_type_class').val();

				$placeholder = $('#input_type_placeholder').val();

				$removeButton = '<a class="remove_field" data-id="'+$id+'">[x]</a>';

				$field = '<input type="text" placeholder="'+$placeholder+'" class="'+$class+'" id="'+$id+'">';

				$theField = '<li><label>'+$label+'</label><br/>'+$field+$removeButton+'</li>';


				var $error;

				//check if id field is empty
				if( $id == '' ){

					alert('ID cannot be empted!');

					return false;

				}

				//store ID to make sure ID in fields are always unique
				if( ($.inArray($id, uniqueID)) == -1 ){

					uniqueID.push($id);

				} else {

					alert('ID cannot be duplicated');

					return false;

				}

				$('#form_preview').append($theField);
				
			},

			textArea: function(e){

				$label = $('#textarea_type_label').val();

				$id = $('#textarea_type_id').val();

				$class = $('#textarea_type_class').val();

				$row = $('#textarea_type_row').val();

				$col = $('#textarea_type_col').val();

				$removeButton = '<a class="remove_field" data-id="'+$id+'">[x]</a>';

				$field = '<textarea id="'+$id+'" cols="'+$col+'" rows="'+$row+'"></textarea>';

				$theField = '<li><label>'+$label+'</label><br/>'+$field+$removeButton+'</li>';

				var $error;

				//check if id field is empty
				if( $id == '' ){

					alert('ID cannot be empted!');

					return false;

				}

				//store ID to make sure ID in fields are always unique
				if( ($.inArray($id, uniqueID)) == -1 ){

					uniqueID.push($id);

				} else {

					alert('ID cannot be duplicated');

					return false;

				}

				$('#form_preview').append($theField);

			},

			dropDown: function(){

				$label = $('#dropdown_type_label').val();

				$id = $('#dropdown_type_id').val();

				$class = $('#dropdown_type_class').val();

				$options = $('#dropdown_type_options').val();

				//split options
				$optArr = $options.split(",");

				$removeButton = '<a class="remove_field" data-id="'+$id+'">[x]</a>';

				var $selectOptions = '';

				for(var i = 0; i < $optArr.length ; i++){

					$selectOptions += '<option>'+$optArr[i]+'</option>';

				}

				$field = '<select id="'+$id+'">'+$selectOptions+'</select>';

				$theField = '<li><label>'+$label+'</label><br/>'+$field+$removeButton+'</li>';

				var $error;

				//check if id field is empty
				if( $id == '' ){

					alert('ID cannot be empted!');

					return false;

				}

				//store ID to make sure ID in fields are always unique
				if( ($.inArray($id, uniqueID)) == -1 ){

					uniqueID.push($id);

				} else {

					alert('ID cannot be duplicated');

					return false;

				}

				$('#form_preview').append($theField);

				

			}

		},

	}
	
	formManager.init();

});