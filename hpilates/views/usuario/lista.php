<div class="container-fluid">
    <div>
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <?php
                        echo anchor('usuarios/novo', $this->lang->line('usuario.novo'), 'class="btn btn-primary" type="button"');
                    ?>
                </div>
            <div class="box-body">
                <table id="listUsuarios" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th><?php echo $this->lang->line('usuario.coluna.nivel')?></th>
                            <th><?php echo $this->lang->line('usuario.coluna.acoes')?></th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php 
                        if(count($colecao_usuario) > 0){
                            foreach($colecao_usuario as $usuario){
                                ?>
                        <tr>
                            <td><?php echo $usuario->get_id(); ?></td>
                            <td><?php echo anchor('usuarios/editar/' . $usuario->get_id(), $usuario->get_nome()); ?></td>
                            <td><?php echo $usuario->get_username(); ?></td>
                            <td><?php echo $usuario->get_email(); ?></td>
                            <td><?php echo $usuario->get_nivel_acesso(); ?></td>
                            <td>
                                <?php echo anchor('usuarios/remover/'.$usuario->get_id(), ' ', 'class="glyphicon glyphicon-remove" title="Remover"'); ?>
                                <?php echo anchor('usuarios/editar/' . $usuario->get_id(), ' ', 'class="glyphicon glyphicon-search" title="Visualizar"'); ?>
                            </td>
                        </tr>
                        <?php 
                            }
                        }
                        ?>
                    </tbody>
              </table>
            </div>
          </div>
    </div>
</div>


<script>
  $(function () {
    $("#listUsuarios").DataTable();
  });
</script>