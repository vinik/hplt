var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

var idEvento = '';

$(document).ready(function(){
	agenda();
	form_agenda();
});

function agenda(){
	
	$('#containerBox').buildContainers({
        containment:"document",
        elementsPath: baseUrl + "/css/elements/",
        onClose:function(o){},
        onIconize:function(o){},
        effectDuration:200,
        onRestore: function(){
        	$('#containerBox').mb_centerOnWindow(false);
        }
      });
	
	$('#lnkNovoEvento').button({
		icons: {primary: 'ui-icon-plus'}
	}).click(function(){
		editarEvento();
	});
	
	$("#divDialogEventoForm").dialog({
		autoOpen: false,
		resizable: false,
		position: 'center',
		width: 720,
		height:'auto',
		modal: true,
		buttons: {
			'Salvar evento': function() {
				$('#frmEvento').submit();
				$(this).dialog('close');
			},
			
			'Remover selecionados': function() {
				removerSelecionados();
				$(this).dialog('close');
			},
			
			'Cancelar': function() {
				$(this).dialog('close');
			}
		}
	});
	
	$("#divDialogEventoViewer").dialog({
		autoOpen: false,
		resizable: false,
		position: 'center',
		width: 600,
		height:'auto',
		modal: true,
		buttons: {
			'Editar evento': function() {
				editarEvento(idEvento);
				$(this).dialog('close');
			},
			
			'Remover evento': function() {
				removerEvento();
				$(this).dialog('close');
			},
			
			'Cancelar': function() {
				$(this).dialog('close');
			}
		}
	});
	

	$("#divDialogEventoViewOnly").dialog({
		autoOpen: false,
		resizable: false,
		position: 'center',
		width: 600,
		height:'auto',
		modal: true,
		buttons: {
			'Fechar': function() {
				$(this).dialog('close');
			}
		}
	});

}

function abrirFormEvento(){
	$('#divFormEvento').show('slow');
}
function fecharFormEvento(){
	$('#divFormEvento').hide('slow');
}

function form_agenda(){
	
	if($('#frmEvento').length > 0){
		$('#divFormEvento').hide();
		
		$('#lnkNovoEvento').toggle(
			abrirFormEvento,
			fecharFormEvento
		);
		
		if($('#cbIdDiaInteiro').attr('checked')){
			$('.campoFim').hide();
		}
		if(!$('#cbDupla').attr('checked')){
			$('.campoDupla').hide();
		}
		if(!$('#cbRepeticao').attr('checked')){
			$('.campoRepeticao').hide();
		}
		
		$('#txtInicioDia').change(function(){
			$('#txtFimDia').val($('#txtInicioDia').val());
		});
		
		$('#selHoraInicio').change(function(){
			$('#selHoraFim').val($('#selHoraInicio').val());
		});
		
		$('#cbIdDiaInteiro').change(function(){
			$('.campoFim').toggle();
		});
		$('#cbDupla').change(function(){
			$('.campoDupla').toggle();
		});
		
		$('#btnSubmitEvento').button();
		
//		$("#birds").autocomplete({
//			source: "search.php",
//			minLength: 2,
//			select: function(event, ui) {
//				log(ui.item ? ("Selected: " + ui.item.value + " aka " + ui.item.id) : "Nothing selected, input was " + this.value);
//			}
//		});

		
		$('#cbRepeticao').change(function(){
			$('.campoRepeticao').toggle();
			if($('#cbRepeticao').attr("checked") == true){
				$("#txtRepeteAte").addClass('REQUIRED');
			} else {
				$("#txtRepeteAte").removeClass('REQUIRED');
			}
		});
		
		$('#frmEvento').submit(validate_required_fields);
	
	}
	
	
}

function abrirEvento(idEv){
	var url = siteUrl + '/agenda/evento/' + idEv;
//	$('#containerBox').mb_changeContainerContent(url);
//	$('#containerBox').mb_open();
	
	var idEstudio = $('#hdnIdEstudio').val();
	var pars = 'id_estudio=' + idEstudio;
	
	idEvento = idEv;
	
	$.ajax({
		url: url,
		type: 'POST',
		data: pars,
		success: function(response){
			$('#divEventoViewerContent').html(response);
			$("#divDialogEventoViewer").dialog('option', 'position', 'center');
			$("#divDialogEventoViewer").dialog('open');
		}
	});
}

function abrirEventoViewOnly(idEv){
	var url = siteUrl + '/agenda/evento/' + idEv;
//	$('#containerBox').mb_changeContainerContent(url);
//	$('#containerBox').mb_open();
	
	var idEstudio = $('#hdnIdEstudio').val();
	var pars = 'id_estudio=' + idEstudio;
	
	idEvento = idEv;
	
	$.ajax({
		url: url,
		type: 'POST',
		data: pars,
		success: function(response){
			$('#divEventoViewOnlyContent').html(response);
			$("#divDialogEventoViewOnly").dialog('option', 'position', 'center');
			$("#divDialogEventoViewOnly").dialog('open');
		}
	});
}

function editarEvento(idEvento){
	
	var idEstudio = $('#hdnIdEstudio').val();
	var pars = 'id_estudio=' + idEstudio;
	
	var url = siteUrl + '/agenda/editar_evento';
	if(!idEvento){
		url += '/';
	} else {
		url += '/' + idEvento;
	}
	
	$.ajax({
		url: url,
		type: 'POST',
		data: pars,
		success: function(response){
			$('#divEventoFormContent').html(response);
			$("#divDialogEventoForm").dialog('option', 'position', 'center');
			$("#divDialogEventoForm").dialog('open');
		}
	});
	
//	$('#containerBox').mb_changeContainerContent(url);
//	$('#containerBox').mb_open();
	return false;
}

function removerEvento(){
	var serie = new Array();
	serie.push(idEvento);
	
	$.ajax({
		url: siteUrl + '/agenda/remover_eventos',
		data: 'serie='+serie,
		type: 'POST',
		success: function(response){
			dialog(response);
			var idEstudio = $('#hdnIdEstudio').val();
			$('#divAgenda' + idEstudio).fullCalendar('refetchEvents');
			//idEvento = 0;
		}
	});
}

function removerSelecionados(){
	var serie = new Array();
	$("input[name='selected_serie[]']").each(function(){
		if (!$(this).attr('checked')) {
		} else {
			serie.push($(this).val());
		}
	});
	
	$.ajax({
		url: siteUrl + '/agenda/remover_eventos',
		data: 'serie='+serie,
		type: 'POST',
		success: function(response){
			dialog(response);
			var idEstudio = $('#hdnIdEstudio').val();
			$('#divAgenda' + idEstudio).fullCalendar('refetchEvents');
		}
	});
}