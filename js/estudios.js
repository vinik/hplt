$(document).ready(function(){
	form_estudio();
	viewer_estudio();
});

function form_estudio(){
	if($('#frmEstudio').length > 0){
		$('#btnSubmit').button();
	}
}

function viewer_estudio(){
	if($('#divViewerEstudio').length > 0){
		
		
		
		$('#btnAddFoto').button({
			text: true,
			icons: {
				primary: 'ui-icon-plus'
			}
		});
		
		initializeMap('divMapaEstudio');
		codeAddress($('#enderecoEstudio').html());
		  
	}
}


