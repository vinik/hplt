<?php 

if(NULL != $professor){
	$id = $professor->get_id();
	$lbl_id = '/';
	$nome = $professor->get_nome();
	$telefone = $professor->get_telefone();
	$endereco = $professor->get_endereco();
	$data_nascimento= $professor->get_data_nascimento();
	$email = $professor->get_email();
	$username = $professor->get_username();
	$avatar = $professor->get_avatar_full();
	$senha = $professor->get_senha();
}

?>

<div id="divViewerProfessor" >
	<div id="divToolbarProfessor" >
		<?php
            echo anchor('professores/novo', $this->lang->line('novo'), 'class="btn btn-primary" type="button"');
        ?>
        <?php
            echo anchor('professores/editar/'.$professor->get_id(), $this->lang->line('editar'), 'class="btn btn-primary" type="button"');
        ?>
        <?php
            echo anchor('professores/agenda/'.$professor->get_id(), $this->lang->line('agenda'), 'class="btn btn-primary" type="button"');
        ?>
	</div>
	<div id="divViewerProfessorLeft" class="col-50">
		
		<fieldset>
			<legend><?php echo $titulo_form; ?></legend>
			<div id="divFotoProfessor" class="ui-widget ui-widget-content ui-corner-all" style="float: left; margin-right: 20px;  padding: 10px;">
				<?php
				echo $avatar;
				?>
				<div style="text-align: center;">
					
					
					
					<?php 
					if(NIVEL_ROOT == $this->session->userdata('nivel')){
						?>
					<button id="btnAddFoto">
						foto
					</button>
						<?php 
					}
					?>
				</div>
			</div>
			<table>
				<tbody>
					<tr>
						<th>
							<label for="txtNome">Nome</label>
						</th>
						<td>
							<?php echo $nome; ?>
						</td>
					</tr>
					<tr>
						<th>
							<label for="dtDataNascimento">Data de nascimento</label>
						</th>
						<td>
							<?php echo $data_nascimento; ?>
						</td>
					</tr>
					<tr>
						<th>
							<label for="txtEmail">Email</label>
						</th>
						<td>
							<?php echo $email; ?>
						</td>
					</tr>
					<tr>
						<th>
							<label for="txtEndereco">Endereço</label>
						</th>
						<td>
							<span id="enderecoProfessor"><?php echo $endereco; ?></span>
						</td>
					</tr>
					<tr>
						<th>
							<label for="txtTelefone">Telefone</label>
						</th>
						<td>
							<?php echo $telefone; ?>
						</td>
					</tr>
					<tr>
						<th>
							<label for="txtUsuario">Usuário</label>
						</th>
						<td>
							<?php echo $username; ?>
						</td>
					</tr>
					<tr>
						<th>
							<label for="txtUsuario">Senha</label>
						</th>
						<td>
							<?php echo $senha; ?>
						</td>
					</tr>
					
				</tbody>
			</table>
			
				
		</fieldset>
		
		<div>
		<fieldset>
			<legend>Mapa</legend>
			
			<div id="divMapaProfessor" style="width: 480px; height: 320px;">
			</div>
			
		</fieldset>
	</div>
		
	</div>
	
	
	<div id="divViewerProfessorRight" class="col-50 f-right">
		<div id="divTabsProfessor">
			<ul>
				<li><a href="#divProximasAulas">Próximas aulas</a></li>
				<li><a href="#divAulasDadas">Aulas dadas</a></li>
			</ul>
			
			<div id="divProximasAulas">
				<fieldset>
				
					<table class="list">
						<tbody>
						<?php 
						if(count($aulas) > 0){
							?>
							<tr>
								<th width="20%">Data</th>
								<th width="40%">Aluno</th>
								<th width="40%">Estúdio</th>
							</tr>
							<?php
							foreach($aulas as $aula){
								?>
								<tr>
									<td><?php echo $this->datas->mysql_para_normal($aula->get_inicio()); ?></td>
									<td><?php echo $aula->get_nome_evento(); ?></td>
									<td><?php echo $aula->get_id_estudio(); ?></td>
								</tr>
								<?php
							}
							?>
							<?php 
						} else {
							
						}
						?>
						</tbody>
					</table>
				
				</fieldset>
			</div>
			
			<div id="divAulasDadas">
				<div id="divTabsEstudiosAulasDadas">
				<?php 
				if (count($estudios)) {
					?>
					<ul>
						<?php 
						foreach ($estudios as $item_estudio) {
							?>
							<li><a href="#tabAulasEstudio<?php echo $item_estudio->get_id(); ?>"><?php echo $item_estudio->get_nome(); ?></a></li>
							<?php 
						}
						?>
					</ul>
					
					<?php 
					foreach ($estudios as $item_estudio) {
						?>
						<div id="tabAulasEstudio<?php echo $item_estudio->get_id(); ?>">
						
							<div>
								
								<span id="toolbar" class="ui-widget-header ui-corner-all" style="padding: 10px 4px;">
									<input class="DATEFIELD" id="txtRangeStart<?php echo $item_estudio->get_id(); ?>" value="<?php echo $this->datas->mysql_para_normal($range_start); ?>" style="color:black"/>
									<input class="DATEFIELD" id="txtRangeEnd<?php echo $item_estudio->get_id(); ?>" value="<?php echo $this->datas->mysql_para_normal($range_end); ?>" style="color:black"/>
									<button class="BUTTON"  style="color:black" onclick="buscarAulasDadas(<?php echo $item_estudio->get_id(); ?>, <?php echo $professor->get_id(); ?>);">Buscar</button>
								</span>
								
							</div>
							<BR/>
							<div id="divAulasDadas<?php echo $item_estudio->get_id(); ?>">
							</div>
							
						</div>
						<?php 
					}
					?>
					
					<?php 
				}
				?>
				</div>
			</div>
			
		</div>
		
	</div>
</div>


<div id="containerFotoBox" class="containerPlus draggable {buttons:'c', icon:'', skin:'default', width:'500', closed:'true', rememberMe:false, title:'Foto'}" style="position:absolute;top:250px;left:400px; height:220px;">
	<?php echo form_open_multipart('professores/processar_foto/' . $professor->get_id(), array('id' => 'frmFoto', 'class' => '')); ?>
	
		<fieldset>
			<legend>Escolher arquivo</legend>
			<input type="file" name="userfile" />
		</fieldset>
		
		<input type="submit" name="enviar" id="btnEnviarFoto" value="Enviar" />
		
	<?php echo form_close(); ?>
</div>