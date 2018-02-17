jQuery(document).ready(function() {
var fields = [{id:"29e5cfa6-d9d2-11e4-9f74-f01faf52022a", type:"shop"}, {id:"51ff520a-7c9c-45a2-8422-24ca9c881044", type:"boolean"}, {id:"51ff51c6-ae38-48c9-ae00-24cc9c881044", type:"boolean"}, {id:"517fee0d-8990-4ca0-a901-63fa9c881044", type:"text"}, {id:"6e509812-21e8-11e6-9704-020000e8924a", type:"boolean"}, {id:"51f6a6a9-f35c-4fce-8891-49989c881044", type:"numeric"}, {id:"51f6b4ed-0c1c-44c5-a955-49949c881044", type:"date"}, {id:"51f6a6d1-8040-465f-b817-55439c881044", type:"date"}, {id:"52a0859d-4ba8-40bd-b928-32bf5e17cb51", type:"date"}, {id:"52a085b4-e9d4-4d3a-9929-32bf5e17cb51", type:"date"}, {id:"5c873b5c-d9bf-11e4-9f74-f01faf52022a", type:"shop"}, {id:"e533f300-d957-11e4-80d1-020000e8924a", type:"numeric"}, {id:"51f6a678-fc20-4602-ae63-49939c881044", type:"text"}, {id:"52a085cd-cbac-4db8-8466-30925e17cb51", type:"numeric"}, {id:"517fee1a-7bf0-4a82-b4f7-621c9c881044", type:"text"}, {id:"7e604a94-8649-11e6-9704-020000e8924a", type:"boolean"}, {id:"51f6a65d-bf88-4dbb-b596-49949c881044", type:"text"}, {id:"ffa9e814-d938-11e4-9f74-f01faf52022a", type:"gender"}, {id:"51f6b245-8dcc-4e68-98fb-49989c881044", type:"numeric"}, ];
var x = new Array();
	var shops = [];
	var date , text , numeric ;
/*$.ajax({
  type: "GET",
  url: 'http://localhost/basic/web/criteres/view?id=41',
  data: 'html',
  success: '1',
 
});*/

	$(function() {
		// Initialise the previous type for each field

		$('#ConditionTEMPLATESelect').hide()
		$select = $('#selecta');
	//q	$date=	$('#date-kvdate');
		$text=	$('#text').clone();
		$numeric = $('#number').clone();
		$('#w0').remove();
		$('#date-kvdate').parent().hide();
		$("#date-kvdate").children('input').removeAttr('id');
		$("#date-kvdate").children('input').removeAttr('name');
		$('#number').remove();
		$('#text').remove();
		$('#selecta').remove();
		$('.fieldCriterion').each(function() {
			changeField($(this));
		});
		$('#ConditionTEMPLATEFieldId').data('otherType');

		// Copy the template row as a new criterion
		
		$('#addCriterion').click(function(){
			 $('#criterionTemplate').removeAttr('id class');
			 $('#addCriterion').hide();

			 // Unique ID for the new criterion
		

			return false;
		});

$('#operateurhascriteres-critere_id ').on('change', function() {
				$('#operateur_id').on('change', function() {
 				
 				 
 				 switch(montableau[$('#operateurhascriteres-critere_id').val()])
 				 {
 				 	case 'DATE' :
 				 					x=[];$select.empty()
				 				 	$('#number').remove();
									$('#text').remove();
									$('#selecta').remove();
									$("#date-kvdate").children('input').attr('name','FilterhasCriteres[selected_value]');
				 				 	$('#date-kvdate').parent().show();

 				 	break;

 				 	case 'TEXT' :
 				 					x=[];			
 				 					$select.empty()
				 				 	$('#selecta').remove();
				 				 	$('#number').remove();
				 				 	$("#date-kvdate").children('input').removeAttr('id');
									$("#date-kvdate").children('input').removeAttr('name');
									$('#date-kvdate').parent().hide();
				 				 	$text.appendTo('#valeurs');	
 				 	break ;

 				 	case 'INTEGER' :
 				 					x=[];			
 				 					$select.empty()
				 				 	$('#selecta').remove();
				 				 	$('#text').remove();
				 				    $("#date-kvdate").children('input').removeAttr('id');
									$("#date-kvdate").children('input').removeAttr('name');
				 				 	$('#date-kvdate').parent().hide();
				 				 	$numeric.appendTo('#valeurs');
 				 	break ;
 				 	
 				 	case 'SELECT' :
 				 					$select.empty()
 				 					x=[];
 				 					x = montableau_valeur[$('#operateurhascriteres-critere_id').val()].split(',');
				 				 	$('#number').remove();
				 				 	$('#text').remove();
				 					$("#date-kvdate").children('input').removeAttr('id');
									$("#date-kvdate").children('input').removeAttr('name');
				 				 	$('#date-kvdate').parent().hide();
				 				 		 	$select.appendTo('#valeurs');	
								for (i = 0; i < x.length; i++) { 
   										 $('#selecta').append($('<option>', {
  										  value: x[i].slice(0,x[i].indexOf('|')),
   										 text: x[i].slice(x[i].indexOf('|')+1)
													}));
									}
				 		
 				 	break ;
 				 }
 			

		})
 $('#ConditionTEMPLATESelect').hide();
})



		// Delete the Criterion
		$('html').on('click', '.deleteCriterion', function(){
			$(this).parent().parent().remove();

			return false;
		});

		// Refresh the valid data (format) when the field is changed
		$('html').on('change', '.fieldCriterion', function(){
			changeField($(this));
		});

		// The value of select field is mapped to the valueA field
		$('html').on('change', '.selectCriterion', function(){
			var $valueField = $(this).parent().siblings().find(".valueCriterion");
			$valueField.val($(this).val());
		});
	});
});
	
	