<?php
if(NULL != $estudio){
	$id = $estudio->get_id();
	$lbl_id = '/';
	$nome = $estudio->get_nome();
	$telefone = $estudio->get_telefone();
	$endereco = $estudio->get_endereco();
} else {
	$id = '';
	$lbl_id = '';
	$nome = '';
	$telefone = '';
	$endereco = '';
}
?>

<div>
    <?php
        echo form_open('estudios/processar' . $lbl_id . $id, array('class' => "form-horizontal"));
    ?>
    <fieldset>
        <legend><?php echo $titulo_form; ?></legend>

        <div class="form-group"><label class="col-md-2 control-label" for="nome">Nome</label>
            <div class="col-md-10">
                <input id="txtNome" name="nome" type="text" value="<?php echo $nome; ?>" placeholder="Nome" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group"><label class="col-md-2 control-label" for="endereco">Endereço</label>
            <div class="col-md-10">
                <input id="endereco" name="endereco" type="text" value="<?php echo $endereco; ?>" placeholder="Endereço" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group"><label class="col-md-2 control-label" for="telefone">Telefone</label>
            <div class="col-md-10">
                <input id="telefone" name="telefone" type="text" value="<?php echo $telefone; ?>" placeholder="Telefone" class="form-control input-md" required="">
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" value="Enviar" class="btn btn-primary pull-left">Cadastrar</button>
        </div>
    </fieldset>
    <?php echo form_close();?>
</div>
