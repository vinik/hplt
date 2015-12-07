<div class="container-fluid">
    <div>
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <?php
                        echo anchor('estudios/novo', $this->lang->line('estudios.novoestudio'), 'class="btn btn-primary" type="button"');
                    ?>
                </div>
            <div class="box-body">
                <table id="listEstudios" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th><?php echo $this->lang->line('estudios.coluna.endereco') ?></th>
                            <th>Telefone</th>
                            <th><?php echo $this->lang->line('estudios.coluna.acoes') ?></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(count($colecao_estudio) > 0){
                            foreach($colecao_estudio as $estudio){
                                ?>
                        <tr>
                            <td><?php echo $estudio->get_id(); ?></td>
                            <td><?php echo anchor('estudios/ver/' . $estudio->get_id(), $estudio->get_nome()); ?></td>
                            <td><?php echo $estudio->get_endereco(); ?></td>
                            <td><?php echo $estudio->get_telefone(); ?></td>
                            <td>
                                <?php echo anchor('estudios/ver/' . $estudio->get_id(), ' ', 'class="glyphicon glyphicon-search" title="Visualizar"'); ?>
                                <?php echo anchor('estudios/remover/'.$estudio->get_id(), ' ', 'class="glyphicon glyphicon-remove" title="Remover"');  ?>
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
    $("#listEstudios").DataTable();
  });
</script>