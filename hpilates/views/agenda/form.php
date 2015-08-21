<?php


if (NULL == $evento->get_id()) {

	$action = 'agenda/processar';

	$inicio = '';
	$fim = '';
	$dia_inteiro = '';
	$hora_inicio = '08:00';
	$hora_fim = '09:00';
} else {
	$action = 'agenda/processar/' . $evento->get_id();
	$inicio = $this->datas->mysql_para_normal($evento->get_inicio());
	$fim = $this->datas->mysql_para_normal($evento->get_fim());

	$dia_inteiro = '';
	$hora_inicio = '08:00';
	$hora_fim = '09:00';

	if (SIM == $evento->get_iddiainteiro()) {
		$dia_inteiro = ' checked="checked" ';
	} else {
		$hora_inicio = $this->datas->hora($evento->get_hora_inicio());
		$hora_fim = $this->datas->hora($evento->get_hora_fim());
	}
}


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
	$opcoes_aluno2[$id_opcao] = htmlentities($opcao);
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
		$opcoes_professor[$professor->get_id()] = htmlentities($professor->get_nome());
	}
}
?>

<script type="text/javascript">

	$('#frmEvento').ready(function(){
		form_agenda();
		$('.DATEFIELD').datepicker({
			dateFormat: 'dd/mm/yy'
		});
	});

	
</script>

<?php

echo form_open($action, array('id' => 'frmEvento'));
?>

<?php 
/*
<div id="divToolbarEvento">
	<div style="">
		<span id="toolbarEvento" class="ui-widget-header ui-corner-all" style="padding: 10px 4px;">
			<button id="btnEditarEvento" onclick="editarEvento(<?php echo $evento->get_id(); ?>);">Editar</button>
			<a href="<?php echo site_url('agenda/remover_evento/' . $evento->get_id()); ?>"	id="btnRemoverEvento">Remover</a>
		</span>
	</div>
</div>
*/
?>


<div class="col-50">
<fieldset>
<table>
	<tbody>
		<tr>
			<th width="30%"><label for="txtInicioDia"><?php echo $this->lang->line('agenda.form.inicio'); ?></label>
			</th>
			<td><input type="text" size="20" name="inicio"
				class="input-text DATEFIELD REQUIRED" value="<?php echo $inicio; ?>"
				id="txtInicioDia" maxlength="10" maxsize="10"
				title="<?php echo $this->lang->line('agenda.form.inicio'); ?>" /></td>
		</tr>
		<tr>
			<th width="30%"></th>
			<td><input type="checkbox" name="iddiainteiro" class="input-text"
				value="s" id="cbIdDiaInteiro" <?php echo $dia_inteiro; ?> /> <label
				for="cbIdDiaInteiro"><?php echo $this->lang->line('agenda.form.diainteiro'); ?></label>
			</td>
		</tr>
		<tr class="campoFim">
			<th width="30%"></th>
			<td><?php
			echo select_horas('hora_inicio', $configs[CONFIG_INTERVALO_CAMPO_HORAS]['valor'], array($hora_inicio), 'id="selHoraInicio"');
			?></td>
		</tr>
		<tr class="campoFim">
			<th width="30%"><label for="txtFimDia"><?php echo $this->lang->line('agenda.form.fim'); ?></label>
			</th>
			<td><input type="text" size="20" name="fim"
				class="input-text DATEFIELD" value="<?php echo $fim; ?>"
				id="txtFimDia" maxlength="10" maxsize="10" /></td>
		</tr>
		<tr class="campoFim">
			<th width="30%"></th>
			<td><?php
			echo select_horas('hora_fim', $configs[CONFIG_INTERVALO_CAMPO_HORAS]['valor'], array($hora_fim), 'id="selHoraFim"');
			?></td>
		</tr>


	</tbody>
</table>
</fieldset>
</div>

<div class="col-50 f-right">
<fieldset>
<table>
	<tbody>
		<tr>
			<th><label for="selIdAluno1"><?php echo $this->lang->line('agenda.form.aluno'); ?></label>
			</th>
			<td>
			<?php
			echo form_dropdown('id_aluno1', $opcoes_aluno1, '', 'id="selIdAluno1"');
			?></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="checkbox" name="iddupla" id="cbDupla" value="s" /> <label
				for="cbDupla"><?php echo $this->lang->line('agenda.form.aulaemdupla'); ?></label>
			</td>
		</tr>
		<tr class="campoDupla">
			<th><label for="selIdAluno2"><?php echo $this->lang->line('agenda.form.dupla'); ?></label>
			</th>
			<td><?php
			echo form_dropdown('id_aluno2', $opcoes_aluno2, '', 'id="selIdAluno2"');
			?></td>
		</tr>
		<tr>
			<th><label for="selIdEstudio"><?php echo $this->lang->line('agenda.form.estudio'); ?></label>
			</th>
			<td><?php
			echo form_dropdown('id_estudio', $opcoes_estudio, $estudio->get_id(), 'id="selIdEstudio"');
			?></td>
		</tr>
		<tr>
			<th><label for="selIdProfessor">Professor</label></th>
			<td><?php
			echo form_dropdown('id_professor', $opcoes_professor, '', 'id="selIdProfessor"');
			?></td>
		</tr>
	</tbody>
</table>
</fieldset>
</div>

<div class="fix"></div>

			<?php
			if (NULL != $evento->get_id()) {
				if (SIM == $evento->get_idrepeticao()) {
					$serie = $evento->get_serie();
					?>
<div class="col-50">
<fieldset><?php 
if (count($serie)) {
	?>
<table class="list">
	<thead>
		<tr>
			<th>#</th>
			<th>Aluno(s)</th>
			<th>Data</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach ($serie as $item_serie) {
		$tr_style = '';
		$checked = '';
		if ($item_serie->get_id() == $evento->get_id()) {
			$tr_style = 'style="background-color: #FF9900;"';
			$checked = 'checked="checked"';
		}
		?>
		<tr <?php echo $tr_style; ?>>
			<td><input type="checkbox" name="selected_serie[]"
				value="<?php echo $item_serie->get_id(); ?>" <?php echo $checked; ?> /></td>
			<td><?php echo htmlentities($item_serie->get_nome_evento()); ?></td>
			<td><?php echo $this->datas->mysql_para_normal($item_serie->get_inicio()); ?></td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table>
	<?php
}
?></fieldset>

</div>
<?php
				}
			} else {
				?>
<div class="col-50">
<fieldset>
<table>
	<tbody>
		<tr>
			<th></th>
			<td><input type="checkbox" name="idrepeticao" id="cbRepeticao"
				value="s" /> <label for="cbRepeticao"><?php echo $this->lang->line('agenda.form.esteeventorepete'); ?></label>
			</td>
		</tr>
		<tr class="campoRepeticao">
			<th></th>
			<td><?php
			echo form_dropdown('id_tiporepeticao', $opcoes_tiporepeticao);
			?></td>
		</tr>
		<tr class="campoRepeticao">
			<th><label for="txtRepeteAte"><?php echo $this->lang->line('agenda.form.ate'); ?></label>
			</th>
			<td><input type="text" size="20" name="repeticaofim"
				class="input-text DATEFIELD" value="" id="txtRepeteAte"
				maxlength="10" maxsize="10"
				title="<?php echo htmlentities($this->lang->line('agenda.form.ate')); ?>" />
			</td>
		</tr>
	</tbody>
</table>
</fieldset>
</div>
			<?php
			}
			?>
<div></div>

			<?php echo form_close(); ?>

<script type="text/javascript">
	//$('#divToolbarEvento').ready(function(){
	
		var availableAlunos = [
			<?php 
			if (count($alunos)) {
				$total_alunos = count($alunos);
				foreach ($alunos as $indice_aluno => $item_aluno) {
					echo '"' . $item_aluno->get_nome() . '"';
					if ($indice_aluno < $total_alunos) {
						echo ',
						';
					}
				}
			}
			?>
		];
		
	
		$('#btnEditarEvento').button({
			text: false,
			icons: {
				primary: 'ui-icon-pencil'
			}
		});
		$('#btnRemoverEvento').button({
			text: false,
			icons: {
				primary: 'ui-icon-trash'
			}
		});

	//});
</script>
