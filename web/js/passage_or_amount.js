$(function() {
		//updateTooltipContact();
if ($('input[name="Enseigne[register_to_use_points]"]').val() == 'non') {
		
					$('#contactTooltip').hide();
		} else {
			$('#contactTooltip').show();
		}
		


$('input[name="Enseigne[register_to_use_points]"]').change(function(){
			var val = $(this).val();

			if (val == 'non') {
				
					$('#contactTooltip').hide();
		} else {
			$('#contactTooltip').show();
		}
		});

			if ($('input[name="Enseigne[passage_or_amount]"]').val() == 'passage') {
		
				$('div.passage').show();
				$('div.montant').hide();
				$('#EnseignePointsPerEuro').val('1');
			} else {
				
				$('div.passage').hide();
				$('div.montant').show();
				$('EnseignePointsPerPassage').val('1');

				$('#EnseigneAmountCommunication').trigger("change");
			}
		

		$('input[name="Enseigne[passage_or_amount]"]').change(function(){
			var val = $(this).val();

			if (val == 'passage') {
				
				$('div.passage').show();
				$('div.montant').hide();
				$('#EnseignePointsPerEuro').val('1');
			} else {
				
				$('div.passage').hide();
				$('div.montant').show();
				$('EnseignePointsPerPassage').val('1');

				$('#EnseigneAmountCommunication').trigger("change");
			}
		});

		$('#EnseigneAmountCommunication').change(function(){
			var val = $(this).val();
			$('div.amountcomm').hide();
			$('div.amountcomm-'+val).show();
		});

		$('#EnseigneCurrencyId').change(function(){
			updateCurrency();
		});

		$('#EnseigneManagerOptionsForm').submit(function(e){
			var nbValid = 0;
			$('#languagesFieldset').find('input:checked').each(function() {
				if ($(this).val() == 1) {
					nbValid ++;
				}
			});
			if (nbValid == 0) {
				$('#languagesError').show();
				e.preventDefault();
			}
		});

$('input[name="Enseigne[number_dirhams]"]').change(function(){
		$('label[for="enseigne-pts_per_dirham"]').text("Nombre de points à attribuer pour chaque " + $('input[name="Enseigne[number_dirhams]"]').val() + " dirhams dépensé :");
		});

	

	});

	

	
	