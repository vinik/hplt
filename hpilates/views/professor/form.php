<?php
    if(NULL != $professor){
        $id = $professor->get_id();
        $lbl_id = '/';
        $nome = $professor->get_nome();
        $telefone = $professor->get_telefone();
        $endereco = $professor->get_endereco();
        $data_nascimento= $professor->get_data_nascimento();
        $email = $professor->get_email();

        $estudios_professor = $professor->get_estudios();
    } else {
        $id = '';
        $lbl_id = '';
        $nome = '';
        $telefone = '';
        $endereco = '';
        $data_nascimento = '';
        $email = '';
        $estudios_professor = array();
    }
    ?>

<div>
    <?php
        echo form_open('professores/processar' . $lbl_id . $id, array('id' => 'frmProfessor', 'class' => "form-horizontal"));
    ?>
    <fieldset>
        <legend><?php echo $titulo_form; ?></legend>

        <div class="form-group"><label class="col-md-2 control-label" for="nome">Nome</label>
            <div class="col-md-10">
                <input id="txtNome" name="nome" type="text" value="<?php echo $nome; ?>" placeholder="Nome" class="form-control input-md" required="">
            </div>
        </div>

        <div class="form-group"><label class="col-md-2 control-label" for="data_nascimento">Data Nascimento</label>
            <div class="col-md-10">
                <input  class="form-control input-md DATEFIELD input-text" id="data_nascimento" name="data_nascimento" value="<?php echo $data_nascimento; ?>" type="text" placeholder="Data de Nascimento">
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

        <div class="form-group"><label class="col-md-2 control-label" for="email">Email</label>
            <div class="col-md-10">
                <input id="email" name="email" type="text" value="<?php echo $email; ?>" placeholder="Email" class="form-control input-md">
            </div>
        </div>

        <div class="form-group">
            <label for="senha" class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
            </div>
        </div>

        <div class="form-group">
            <label for="estudio" class="col-sm-2 control-label">Estúdios</label>
            <div class="col-sm-10">
                <?php if (count($estudios)) { ?>
                    <div id="divProfessorEstudios">
                    <?php
                    foreach ($estudios as $item_estudio) {
                        if (in_array($item_estudio->get_id(), $estudios_professor)) {
                            $checked = ' checked="checked" ';
                        } else {
                            $checked = '';
                        }
                    ?>
                    <input
                        type="checkbox"
                        name="estudio[]"
                        id="cbEstudio<?php echo $item_estudio->get_id(); ?>"
                        value="<?php echo $item_estudio->get_id(); ?>" <?php echo $checked; ?>/>
                        <label for="cbEstudio<?php echo $item_estudio->get_id(); ?>"><?php echo $item_estudio->get_nome(); ?></label>
                    <?php } ?>
                    </div>
                    <?php }?>
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" value="Enviar" class="btn btn-primary pull-left">Cadastrar</button>
        </div>
    </fieldset>
    <?php echo form_close();?>
</div>
