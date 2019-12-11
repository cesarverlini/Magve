$('#form_deposito').hide();
$('#form_transferencia').hide();

$('#cmbTipo_pago').change(function()
{
	if ($(this).val() == "") {
		$('#form_deposito').hide();
		$('#form_transferencia').hide();
	}else if ($(this).val() == 1){
		$('#form_deposito').show();	
		$('#form_transferencia').hide();	
	}else if ($(this).val() == 2) {
		$('#form_deposito').hide();	
		$('#form_transferencia').show();
	}

});
