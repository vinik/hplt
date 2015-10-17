<?php
if(NULL != $usuario){
	$id = $usuario->get_id();
	$lbl_id = '/';
	$nome = $usuario->get_nome();
	$data_nascimento= $this->datas->mysql_para_normal($usuario->get_data_nascimento());
	$email = $usuario->get_email();
	$username = $usuario->get_username();
	$senha = $usuario->get_senha();
	$nivel = $usuario->get_nivel();
} else {
	$id = '';
	$lbl_id = '';
	$nome = '';
	$data_nascimento = '';
	$email = '';
	$username = '';
	$senha = '';
	$nivel = NIVEL_ALUNO;
}


$campo_nome = array(
	'id'	=>	'txtNome',
	'name'	=>	'nome',
	'value'	=>	$nome,
);

$campo_email = array(
	'id'	=>	'txtEmail',
	'name'	=>	'email',
	'value'	=>	$email,
);

$campo_data_nascimento = array(
	'id'	=>	'txtDataNascimento',
	'name'	=>	'data_nascimento',
	'value'	=>	$data_nascimento,
);

$campo_username = array(
	'id'	=>	'txtUsername',
	'name'	=>	'username',
	'value'	=>	$username,
);

$campo_senha = array(
	'id'	=>	'txtSenha',
	'name'	=>	'senha',
	'value'	=>	$senha,
);

$niveis = array(
	NIVEL_ALUNO => 'Aluno',
	NIVEL_PROFESSOR => 'Professor',
	NIVEL_ROOT => 'Administrador',
);

?>

	<?php
	echo form_open_multipart('usuarios/processar' . $lbl_id . $id);
	?>
<div id="abasFormUsuario">
	<ul>




	</ul>
	<fieldset id="divFormInfo">
		<legend>Informações pessoais</legend>
		<table>
			<tbody>
				<tr>
					<th>
						<label>Nome</label>
					</th>
					<td>
						<input type="text" size="60" name="nome" class="input-text" value="<?php echo $nome; ?>" id="txtNome"  maxlength="100" maxsize="100" />
					</td>
				</tr>
				<tr>
					<th>
						<label>Email</label>
					</th>
					<td>
						<input type="text" size="60" name="email" class="input-text" value="<?php echo $email; ?>" id="txtNome"  maxlength="100" maxsize="100" />
					</td>
				</tr>
				<tr>
					<th>
						<label>Data de nascimento</label>
					</th>
					<td>
						<input type="text" size="60" name="data_nascimento" class="input-text" value="<?php echo $data_nascimento; ?>" id="txtDataNascimento"  maxlength="100" maxsize="100" />
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
	<fieldset id="divFormSenha">
		<legend>Dados de acesso</legend>
		<table>
			<tbody>
				<tr>
					<th>
						<label>Username</label>
					</th>
					<td>
						<input type="text" size="60" name="username" class="input-text" value="<?php echo $username; ?>" id="txtUsername"  maxlength="100" maxsize="100" />
					</td>
				</tr>
				<tr>
					<th>
						<label>Senha</label>
					</th>
					<td>
						<input type="text" size="60" name="senha" class="input-text" value="<?php echo $senha; ?>" id="txtSenha"  maxlength="100" maxsize="100" />
					</td>
				</tr>
				<tr>
					<th>
						<label>Nível de acesso</label>
					</th>
					<td>
						<?php echo form_dropdown('nivel', $niveis, $nivel, 'class="input-text"'); ?>
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
	<fieldset id="divFormAvatar">
		<legend>Avatar</legend>
		<ul>
		  <li><label>Avatar</label> N/A</li>
		</ul>
	</fieldset>
</div>

<input type="submit" value="Enviar" class="input-submit">
<?php
echo form_close();
?>
