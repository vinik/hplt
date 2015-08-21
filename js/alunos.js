$(document).ready(function(){
	form_aluno();
	viewer_aluno();
});

function form_aluno(){
	if($('#frmAluno').length > 0){
		$('#btnSubmit').button();
	}
}

function viewer_aluno(){
	if($('#divViewerAluno').length > 0){
		$('#btnAddFoto').button({
			text: true,
			icons: {
				primary: 'ui-icon-plus'
			}
		}).click(abreFormFoto);
		
		$('#containerFotoBox').buildContainers({
	        containment:"document",
	        elementsPath: baseUrl + "/css/elements/",
	        onClose:function(o){},
	        onIconize:function(o){},
	        effectDuration:200
	      });
		  
		$('#btnEnviarFoto').button();
		
		initializeMap('divMapaAluno');
		codeAddress($('#enderecoAluno').html());
		  
	}
}

function abreFormFoto(){
	$('#containerFotoBox').mb_open();
}
