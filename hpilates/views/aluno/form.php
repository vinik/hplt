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

<div class="container" id="divFormAluno">

    <div class="row">
        <?php echo form_open_multipart('alunos/processar' . $lbl_id . $id, array('id'=> 'frmAluno'));?>
        <div id="divToolbarAluno" align='right' >
            <a class="btn btn-primary" href="novo"> + Novo Aluno</a>
        </div>

        <form class="form-horizontal">
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

            <div class="form-group"><label class="col-md-2 control-label" for="email">Email</label>
              <div class="col-md-10">
                <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md">
              </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
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

            <input type="submit" class="input-submit" value="Enviar" id="btnSubmit"/>
            </fieldset>
        </form>
    </div>
</div>






<!--
    <fieldset>
        <legend><?php echo $titulo_form; ?></legend>
        <div id="divFotoAluno" class="ui-widget ui-widget-content ui-corner-all" style="float: left; width: 120px; height: 160px; margin-right: 20px;">FOTO</div>
        <table>
            <tbody>
                <tr>
                    <th><label for="txtNome">Nome</label></th>
                    <td><input type="text" size="60" name="nome" class="input-text" value="<?php echo $nome; ?>" id="txtNome"  maxlength="100" maxsize="100" /></td>
                </tr>
                <tr>
                    <th><label for="dtDataNascimento">Data de nascimento</label></th>
                    <td><input type="text" size="60" name="data_nascimento" class="DATEFIELD input-text" value="<?php echo $data_nascimento; ?>" id="dtDataNascimento"  maxlength="100" maxsize="100" /></td>
                </tr>
                <tr>
                    <th><label for="txtProfissao">Profissão</label></th>
                    <td><input type="text" size="60" name="profissao" class="input-text" value="<?php echo $profissao; ?>" id="txtProfissao"  maxlength="100" maxsize="100" /></td>
                </tr>
                <tr>
                    <th>
                        <label for="selEstudio">Estúdio</label>
                    </th>
                    <td>
                        <select class="other" name="id_estudio" id="sel_estudio" >
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
                    </td>
                </tr>
                <tr>
                    <th><label for="txtEmail">Email</label></th>
                    <td><input type="text" size="60" name="email" class="input-text" value="<?php echo $email; ?>" id="txtEmail"  maxlength="100" maxsize="100" /></td>
                </tr>
                <tr>
                    <th><label for="txtEndereco">Endereço</label></th>
                    <td><input type="text" size="60" name="endereco" class="input-text" value="<?php echo $endereco; ?>" id="txtEndereco"  maxlength="100" maxsize="100" /></td>
                </tr>
                <tr>
                    <th><label for="txtTelefone">Telefone</label></th>
                    <td><input type="text" size="60" name="telefone" class="input-text" value="<?php echo $telefone; ?>" id="txtTelefone"  maxlength="100" maxsize="100" /></td>
                </tr>
                <tr>
                    <th><label for="txaObjetivos">Objetivos</label></th>
                    <td><textarea cols="50" rows="10" name="objetivos" class="input-text" id="txaObjetivos" ><?php echo $objetivos; ?></textarea></td>
                </tr>
                <tr>
                    <th><label for="txaObjetivos">Hora/aula R$</label></th>
                    <td><input type="text" size="10" name="valor_aula" class="input-text" value="<?php echo $valor_aula; ?>" id="txtValorAula"  maxlength="10" maxsize="10" /></td>
                </tr>
            </tbody>
        </table>

        <input type="submit" class="input-submit" value="Enviar" id="btnSubmit"/>
    </fieldset>
    </form> -->
<!-- </div>
 -->
