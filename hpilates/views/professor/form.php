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
    $username = $professor->get_username();
    $senha = $professor->get_senha();
} else {
    $id = '';
    $lbl_id = '';
    $nome = '';
    $telefone = '';
    $endereco = '';
    $data_nascimento = '';
    $email = '';
    $username = '';
    $senha = '';
    
    $estudios_professor = array();
}
?>

<?php echo form_open('professores/processar' . $lbl_id . $id, array('id' => 'frmProfessor')); ?>
    <fieldset>
        <legend>
            <?php echo $titulo_form; ?>
        </legend>
        
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
                        <label >Data de nascimento</label>
                    </th>
                    <td>
                        <input type="text" size="60" name="data_nascimento" class="input-text" value="<?php echo $data_nascimento; ?>" id="q9"  maxlength="100" maxsize="100" />
                    </td>
                </tr>
                <tr>
                    <th>
                        <label >Endereço</label>
                    </th>
                    <td>
                        <input type="text" size="60" name="endereco" class="input-text" value="<?php echo $endereco; ?>" id="q10"  maxlength="100" maxsize="100" />
                    </td>
                </tr>
                <tr>
                    <th>
                        <label >Telefone</label>
                    </th>
                    <td>
                        <input type="text" size="60" name="telefone" class="input-text" value="<?php echo $telefone; ?>" id="q11"  maxlength="100" maxsize="100" />
                    </td>
                </tr>
                <tr>
                    <th>
                        <label >Email</label>
                    </th>
                    <td>
                        <input type="text" size="60" name="email" class="input-text" value="<?php echo $email; ?>" id="q12"  maxlength="100" maxsize="100" />
                    </td>
                </tr>
                <tr>
                    <th>
                        <label>Usuário</label>
                    </th>
                    <td>
                        <input type="text" size="60" name="username" class="input-text" value="<?php echo $username; ?>" id="q13"  maxlength="20"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label >Senha</label>
                    </th>
                    <td>
                        <input type="text" size="60" name="senha" class="input-text" value="<?php echo $senha ?>" id="q13"  maxlength="20"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label >Estúdios</label>
                    </th>
                    <td>
                        <?php 
                        if (count($estudios)) {
                            ?>
                            <div id="divProfessorEstudios">
                                <?php 
                                foreach ($estudios as $item_estudio) {

                                    $estudioId = $item_estudio->get_id();

                                    if (in_array($estudioId, $estudios_professor)) {
                                        $checked = ' checked="checked" ';
                                    } else {
                                        $checked = '';
                                    }
                                    ?>
                                    <input type="checkbox" name="estudio[]" id="cbEstudio<?php echo $estudioId; ?>" value="<?php echo $estudioId; ?>"  <?php echo $checked; ?>/>
                                    <label for="cbEstudio<?php echo $estudioId; ?>"><?php echo $item_estudio->get_nome(); ?></label>
                                    <?php 
                                }
                                ?>
                            </div>
                            <?php 
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        
        

        <input type="submit" value="Enviar" class="input-submit"/>


    </fieldset>
</form>