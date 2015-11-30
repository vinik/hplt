<div class="container-fluid">
    <div>
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de professores</h3>
                    <?php
                        echo anchor('professores/novo', $this->lang->line('professores.novoprofessor'), 'class="btn btn-primary" type="button" style="float:right;"');
                    ?>
                </div>
            <div class="box-body">
                <table id="listProfessores" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php 
                        if(count($colecao_professor) > 0){
                            foreach($colecao_professor as $professor){
                                ?>
                        <tr>
                            <td><?php echo $professor->get_id(); ?></td>
                            <td><?php echo anchor('professores/ver/' . $professor->get_id(), $professor->get_nome()); ?></td>
                            <td><?php echo $professor->get_email(); ?></td>
                            <td><?php echo $professor->get_telefone(); ?></td>
                            <td><?php 
                                echo anchor('professores/remover/'.$professor->get_id(), ' ', 'class="glyphicon glyphicon-remove" title="Remover"'); 
                                ?>&nbsp;<?php
                                echo anchor('professores/ver/' . $professor->get_id(), ' ', 'class="glyphicon glyphicon-search" title="Visualizar"');
                            ?></td>
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
    $("#listProfessores").DataTable();
  });
</script>