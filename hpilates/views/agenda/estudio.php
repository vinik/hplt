<?php 

$opcoes_aluno1 = array();
if(count($alunos) > 0){
	foreach($alunos as $aluno){
		$opcoes_aluno1[$aluno->get_id()] = $aluno->get_nome();
	}
}

$opcoes_aluno2 = array(
	'' => ' -- em aberto -- '
);
foreach($opcoes_aluno1 as $id_opcao => $opcao){
	$opcoes_aluno2[$id_opcao] = $opcao;
}

$opcoes_estudio = array();
if(count($estudios) > 0){
	foreach($estudios as $item_estudio){
		$opcoes_estudio[$item_estudio->get_id()] = $item_estudio->get_nome();
	}
}

$opcoes_tiporepeticao = $tipos_repeticao;

$opcoes_professor = array();
if(count($professores) > 0){
	foreach($professores as $professor){
		$opcoes_professor[$professor->get_id()] = $professor->get_nome();
	}
}

?>


<?php 
if (intval($this->session->userdata('nivel')) != NIVEL_ALUNO) {
	?>
<div id="divToolbarAgenda" >
	<button id="lnkNovoEvento">Novo evento</button>
</div>

<BR></BR>
	<?php 
}
?>



<div id="divAbasAgenda" class="menu_agenda">
	<ul class="abas">
<?php
foreach($estudios as $item_estudio){
	$classe = $item_estudio->get_id() == $estudio->get_id() ? 'class="here"' : '';
	?>
		<li><?php echo anchor('agenda/agenda_estudio/' . $item_estudio->get_id(), $item_estudio->get_nome(), $classe); ?></li>
	<?php 
}
?>
	</ul>
	
</div>


<div class="conteudo_agenda">

	<div id="#abaEstudio<?php echo $estudio->get_id(); ?>">
		<div id="divAgenda<?php echo $estudio->get_id(); ?>"></div>
			<script type="text/javascript">
$("#abaEstudio<?php echo $estudio->get_id(); ?>").ready(function(){
	
	$('#divAgenda<?php echo $estudio->get_id(); ?>').fullCalendar({
		theme: true,
		
		defaultView: 'agendaDay',
		
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		
		editable: true,
		
		buttonText: {
			today: 'hoje',
			month: 'mes',
			week: 'semana',
			day: 'dia'
		},

		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
		
		weekMode: 'liquid',

		viewDisplay: function(view) {
	        //alert('The new title of the view is ' + view.title);
	    },
		
		dayClick: function(date, allDay, jsEvent, view) {
//			$("#box").fadeIn();

			// abrirFormEvento();
			
//	        if (allDay) {
//	            alert('Clicked on the entire day: ' + date);
//	            $('#cdIdDiaInteiro').check();
//	        }else{
//	            alert('Clicked on the slot: ' + date);
//	        }
//
//	        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
//
//	        alert('Current view: ' + view.name);
//
//	        // change the day's background color just for fun
//	        $(this).css('background-color', 'red');
	        

	        

	    },
			
		events: siteUrl + '/agenda/busca_eventos/<?php echo $estudio->get_id(); ?>'
	});
	
	
});
		</script>


	</div>
	
	
	
</div>

<div id="containerBox" class="containerPlus draggable {buttons:'c', icon:'', skin:'default', width:'640', closed:'true', rememberMe:false, title:'Evento'}" style="position:absolute;top:200px;left:400px; height:460px;">
	
</div>

<div id="divDialogEventoForm">
	<div id="divEventoFormContent"></div>
</div>

<div id="divDialogEventoViewer">
	<div id="divEventoViewerContent"></div>
</div>

<div id="divDialogEventoViewOnly">
	<div id="divEventoViewOnlyContent"></div>
</div>

<input type="hidden" id="hdnIdEstudio" value="<?php echo $estudio->get_id(); ?>"/>