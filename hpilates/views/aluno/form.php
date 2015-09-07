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
} else {
    $id = '';
    $lbl_id = '';
    $nome = '';
    $telefone = '';
    $endereco = '';
    $data_nascimento = '';
    $email = '';
    $profissao = '';
    $objetivos = '';
    $id_estudio = FALSE;
    $username = '';
    $senha = '';
    $valor_aula = '';
}
?>

<div>
    <?php
        echo form_open('alunos/processar', array('id' => 'frmCfgGerais', 'class' => "form-horizontal"));
        // echo form_open_multipart('alunos/processar' . $lbl_id . $id, array('id'=> 'frmAluno'));
    ?>
    <fieldset>
        <legend>Novo Aluno</legend>

        <div class="form-group"><label class="col-md-2 control-label" for="nome">Nome</label>
              <div class="col-md-10">
                <input id="txtNome" name="nome" type="text" value="<?php echo $nome; ?>" placeholder="Nome" class="form-control input-md" required="">
              </div>
            </div>

            <div class="form-group"><label class="col-md-2 control-label" for="data_nascimento">Data Nascimento</label>
              <div class="col-md-10">
                <input  class="form-control input-md DATEFIELD input-text" id="dtDataNascimento" name="data_nascimento" value="<?php echo $data_nascimento; ?>" type="text" placeholder="Data de nascimento">
              </div>
            </div>

            <div class="form-group"><label class="col-md-2 control-label" for="profissao">Profissão</label>
              <div class="col-md-10">
                <input id="profissao" name="profissao" type="text" placeholder="Profissão" class="form-control input-md">
              </div>
            </div>

            <div class="form-group"><label class="col-md-2 control-label" for="id_estudio">Estúdio</label>
              <div class="col-md-10">

                <select  class="form-control" name="id_estudio" id="sel_estudio" >
                    <option></option>
                  <?php
                  if(count($colecao_estudio) > 0){
                    foreach($colecao_estudio as $estudio){
                        $selected = ' ';
                        if($estudio->get_id() == $id_estudio){
                            $selected = 'selected="selected" ';
                        }
                        ?>
                        <option value="<?php echo $estudio->get_id(); ?>" <?php echo $selected; ?> ><?php echo $estudio->get_nome(); ?></option>
                        <?php
                    }
                  }
                  ?>
                </select>

              </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="email">Email</label>
                <div class="col-md-10">
                    <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md">
                </div>
            </div>

            <div class="form-group"><label class="col-md-2 control-label" for="endereco">Endereço</label>
              <div class="col-md-10">
                <input id="endereco" name="endereco" type="text" placeholder="Endereço" class="form-control input-md">
              </div>
            </div>

            <div class="form-group"><label class="col-md-2 control-label" for="telefone">Telefone</label>
              <div class="col-md-10">
                <input id="telefone" name="telefone" type="text" placeholder="Telefone" class="form-control input-md">
              </div>
            </div>

            <div class="form-group"><label class="col-md-2 control-label" for="objetivos">Objetivos</label>
              <div class="col-md-10">
               <textarea class="form-control" id="objetivos" name="objetivos"></textarea>
              </div>
            </div>

            <div class="form-group"><label class="col-md-2 control-label" for="valor_aula">Hora/Aula</label>
              <div class="col-md-10">
                <input id="valor_aula" name="valor_aula" type="text" placeholder="R$ 0,00" class="form-control input-md">

              </div>
            </div>

          <div class="box-footer">
            <button type="submit" id="btnSubmit" value="Enviar" class="btn btn-primary">Cadastrar</button>
          </div>
    </fieldset>
    <!-- <input type="submit"  class="input-submit"> -->
    <?php echo form_close();?>
</div>
