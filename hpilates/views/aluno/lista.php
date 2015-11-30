<div class="container-fluid">
    <div>
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de Alunos</h3>
                    <?php
                        echo anchor('alunos/novo', $this->lang->line('alunos.novoaluno'), 'class="btn btn-primary" type="button" style="float:right;"');
                    ?>
                </div>
            <div class="box-body">
                <table id="listAlunos" class="table table-bordered table-striped">
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
                        if(count($colecao_aluno) > 0){
                            foreach($colecao_aluno as $aluno){
                                ?>
                        <tr>
                            <td><?php echo $aluno->get_id(); ?></td>
                            <td><?php echo anchor('alunos/ver/' . $aluno->get_id(), $aluno->get_nome()); ?></td>
                            <td><?php echo $aluno->get_email(); ?></td>
                            <td><?php echo $aluno->get_telefone(); ?></td>
                            <td><?php 
                                echo anchor('alunos/remover/'.$aluno->get_id(), ' ', 'class="glyphicon glyphicon-remove" title="Remover"'); 
                                ?>&nbsp;<?php
                                echo anchor('alunos/ver/' . $aluno->get_id(), ' ', 'class="glyphicon glyphicon-search" title="Visualizar"');
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
    $("#listAlunos").DataTable();
  });
</script>