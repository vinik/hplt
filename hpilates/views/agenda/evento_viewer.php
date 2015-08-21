<?php 
if(NULL === $evento){
	
	$id_evento = '';
	$lbl_id = '';
	
	$inicio_dia = '';
	$fim_dia = '';
	$dia_inteiro = 'checked';
	$id_aluno1 = '';
	$id_aluno2 = '';
	$id_estudio = '';
	$dupla = 'false';
	$hora_inicio = '08:00';
	$hora_fim = '09:00';
	$tipo_repeticao = TIPO_REPETICAO_SEMANAL;
	$repeticaofim = '';
	
	$label_data = '';
	$label_hora = '';
	
} else {
	
	$label_hora = '';
	
	$id_evento = $evento->get_id();
	$lbl_id = '/'.$id_evento;
	$inicio_dia = $this->datas->mysql_para_normal($evento->get_inicio());
	$fim_dia = $this->datas->mysql_para_normal($evento->get_fim());
	
	$dupla = '';
	if('s' == $evento->get_iddupla()){
		$dupla = ' checked="checked" ';
	}
	
	$id_aluno1 = $evento->get_id_aluno1();
	$id_aluno2 = $evento->get_id_aluno2();
	$id_estudio = $evento->get_id_estudio();
	
	$hora_inicio = substr($evento->get_hora_inicio(), 0, 5);
	$hora_fim = substr($evento->get_hora_fim(), 0, 5);
	$tipo_repeticao = $evento->get_id_tiporepeticao();
	$repeticaofim = $evento->get_repeticaofim();
	
	$dia_inteiro = '';
	if(SIM == $evento->get_iddiainteiro()){
		$dia_inteiro =  'checked="checked" ';
	} else {
		$label_hora = $hora_inicio . ' - ' . $hora_fim;
	}
	
	$label_data = '';
	if ($inicio_dia == $fim_dia) {
		$label_data = $inicio_dia;
	} else {
		$label_data = $inicio_dia . ' - ' . $fim_dia;
	}
	
}

//echo $evento->debug();



?>


<?php 
/*
<div id="divToolbarEvento" >
		
	
	<div style="">
		
		<span id="toolbarEvento" class="ui-widget-header ui-corner-all" style="padding: 10px 4px;">
			<button id="btnEditarEvento" onclick="editarEvento(<?php echo $id_evento; ?>);">Editar</button>
			<a href="<?php echo site_url('agenda/remover_evento/' . $id_evento); ?>" id="btnRemoverEvento">Remover</a>
		</span>
			
		
	</div>	
</div>
*/
?>

<div id="divFormEvento">
	<div class="col-50">
		<fieldset>
			<table>
				<tbody>
					<tr>
						<th width="30%">
							
						</th>
						<td>
							<h2><?php echo $label_data; ?></h2>
							<h4><?php echo $label_hora; ?></h4>
						</td>
					</tr>

					
				</tbody>
			</table>
		</fieldset>
	</div>
	
	<div class="col-50 f-right">
		<fieldset>
			
							<div class="col-50">
							<?php
							echo $aluno->get_avatar_full();
							?>
							</div>
							<?php 
							if(SIM == $evento->get_iddupla()){
								?>
								<div class="col-50 f-right">
								<?php 
								echo $aluno2->get_avatar_full();
								?>
								</div>
								<?php 
							}
							?>
							<div class="fix"></div>
							<?php
							echo $estudio->get_foto_full();
							?>
							<?php
							echo $professor->get_avatar_full();
							?>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</div>
	
	
	<?php 
	if (SIM == $evento->get_idrepeticao()) {
		$serie = $evento->get_serie();
		?>
		<div class="col-50">
			<fieldset>
				<?php 
				if (count($serie)) {
					?>
					<table class="list">
						<thead>
							<tr>
								<th>#</th>
								<th>data</th>
							</tr>
						</thead>
						<tbody>
					<?php 
					foreach ($serie as $item_serie) {
						$tr_style = '';
						if ($item_serie->get_id() == $evento->get_id()) {
							$tr_style = 'style="background-color: #FF9900;"';
						}
						?>
						<tr <?php echo $tr_style; ?>>
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
				?>
			</fieldset>
		</div>
	<?php 
	}
	?>
	
</div>


<script type="text/javascript">
	//$('#divToolbarEvento').ready(function(){
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