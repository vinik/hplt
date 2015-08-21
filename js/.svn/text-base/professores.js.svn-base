$(document).ready(function(){
	form_professor();
	viewer_professor();
});

function form_professor(){
	if($('#frmProfessor').length > 0){
		$('#divProfessorEstudios').buttonset();
		
		
	}
}

function viewer_professor(){
	if($('#divViewerProfessor').length > 0){
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
		
		$('#divTabsEstudiosAulasDadas').tabs();
		$('#divTabsProfessor').tabs();
		
		initializeMap('divMapaProfessor');
		codeAddress($('#enderecoProfessor').html());
		  
	}
}

function abreFormFoto(){
	$('#containerFotoBox').mb_open();
}

function buscarAulasDadas(idEstudio, idProfessor){
	
	var inicio = $('#txtRangeStart' + idEstudio).val();
	var fim = $('#txtRangeEnd' + idEstudio).val();
	
	var pars = 'range_start=' + inicio + '&range_end=' + fim;
	
	$.ajax({
		url: siteUrl + '/professores/aulas_dadas/' + idEstudio + '/' + idProfessor,
		data: pars,
		type: 'POST',
		success: function(response){
			$('#divAulasDadas' + idEstudio).html(response);
		}
	});
	
}
