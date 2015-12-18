<?php 

if(NULL != $aluno){
	$id = $aluno->get_id();
	$lbl_id = '/';
	$nome = $aluno->get_nome();
	$telefone = $aluno->get_telefone();
	$endereco = $aluno->get_endereco();
	$data_nascimento= $aluno->get_data_nascimento();
	$email = $aluno->get_email();
	$profissao = $aluno->get_profissao();
	$objetivos = $aluno->get_objetivos();
	$id_estudio = $aluno->get_id_estudio();
	$username = $aluno->get_username();
	$senha = $aluno->get_senha();
	$valor_aula = $aluno->get_valor_aula();
	$username = $aluno->get_username();
	$avatar = $aluno->get_avatar_full();
}

?>

<div id="divViewerAluno">
	<div id="divToolbarAluno">
		<?php
            echo anchor('alunos/novo', $this->lang->line('novo'), 'class="btn btn-primary" type="button"');
        ?>
        <?php
            echo anchor('alunos/editar/'.$aluno->get_id(), $this->lang->line('editar'), 'class="btn btn-primary" type="button"');
        ?>
	</div>
	<div id="divViewerAlunoLeft"  class="col-50">
		
		<fieldset>
			<legend><?php echo $titulo_form; ?></legend>
			<div id="divFotoAluno" class="ui-widget ui-widget-content ui-corner-all" style="float: left; margin-right: 20px; padding: 10px;">
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
							<label for="txtProfissao">Profissão</label>
						</th>
						<td>
							<?php echo $profissao; ?>
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
							<span id="enderecoAluno"><?php echo $endereco; ?></span>
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
							<label for="txaObjetivos">Objetivos</label>
						</th>
						<td>
							<?php echo $objetivos; ?>
						</td>
					</tr>
					
					<tr>
						<th>
							<label for="txtValorAula">Valor da hora/aula</label>
						</th>
						<td>
							<?php echo $valor_aula; ?>
						<username>
						</get_username>
					</tr>

					<tr>
						<th>
							<label for="txtUsername">Usuário</label>
						</th>
						<td>
							<?php echo $username; ?>
						</td>
					</tr>

					<tr>
						<th>
							<label for="txtUsername">Senha</label>
						</th>
						<td>
							<?php echo $senha; ?>
						</td>
					</tr>
					
				</tbody>
			</table>
			
				
		</fieldset>
		
	</div>
	<div id="divViewerAlunoRight" class="col-50 f-right">
		<fieldset>
			<legend>
				Próximas aulas
			</legend>
		
		<table class="list">
			<tbody>
			<?php 
			if(count($aulas) > 0){
				?>
				<tr>
					<th width="20%">Data</th>
					<th width="40%">Professor</th>
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
		
	
		<div>
			<fieldset>
				<legend>Mapa</legend>
				
				<div id="divMapaAluno" style="width: 480px; height: 320px;">
				</div>
				
			</fieldset>
		</div>
	</div>
	
</div>


<div id="containerFotoBox" class="containerPlus draggable {buttons:'c', icon:'', skin:'default', width:'500', closed:'true', rememberMe:false, title:'Foto'}" style="position:absolute;top:250px;left:400px; height:220px;">
	<?php echo form_open_multipart('alunos/processar_foto/' . $aluno->get_id(), array('id' => 'frmFoto', 'class' => '')); ?>
	
		<fieldset>
			<legend>Escolher arquivo</legend>
			<input type="file" name="userfile" />
		</fieldset>
		
		<input type="submit" name="enviar" id="btnEnviarFoto" value="Enviar" />
		
	<?php echo form_close(); ?>
</div>