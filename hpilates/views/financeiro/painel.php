<?php
    $valor_total = 0;
    $valor_total_despesas = 0;
    $current_month = null;
    $current_year = null;
?>

<div class="row">
    <div class="col-xs-2">
        <select id="current_month" class="form-control">
            <?php  foreach ($months as $month => $description) {
                if ($mes == $month) { ?>
                    <option selected value="<?php echo $month ?>"><?php echo $description?></option>
                <?php }else { ?>
                    <option value="<?php echo $month ?>"><?php echo $description?></option>
                <?php }
            }?>
        </select>
    </div>

    <div class="col-xs-1">
        <select id="current_year" class="form-control">
            <?php  foreach ($years as $year) {
                if ($ano == $year) { ?>
                    <option selected value="<?php echo $year ?>"><?php echo $year?></option>
                <?php }else { ?>
                    <option value="<?php echo $year ?>"><?php echo $year?></option>
                <?php }
            }?>
        </select>
    </div>

    <div class="btn-toolbar">
        <button onclick="getFinanceiro()" class="btn btn-primary">
            <?php echo $this->lang->line('financeiro.form.buscar');?>
        </button>

        <button onclick="getFinanceiroAtual()" class="btn btn-primary">
            <?php echo $this->lang->line('financeiro.form.buscar_mes_atual');?>
        </button>
    </div>

</div>


</div>
<?php if (count($estudios)) { ?>
    
    <div id="divTabsFinanceiroEstudios">
        <ul>
            <?php  foreach ($estudios as $item_estudio) { ?>
            <li>
                <a href="#abaEstudio<?php echo $item_estudio->get_id(); ?>"><?php echo $item_estudio->get_nome(); ?></a>
            </li>
            <?php  } ?>
        </ul>

        <?php 
            foreach ($estudios as $item_estudio) {
                $valor_total_estudio = 0;
                $valor_total_despesas_estudio = 0;
                $pagamentos = $pagamento->busca_mes($mes, $ano, $item_estudio->get_id());
                $despesas = $despesa->busca_mes($mes, $ano, $item_estudio->get_id());
        ?>

            <div id="abaEstudio<?php echo $item_estudio->get_id();?>" style="margin: 20px;">

                <!-- CONTAINER PAGAMENTOS -->
                <div class="container-fluid">
                    <h2>Pagamentos</h2>

                    <div>
                        <?php
                        echo anchor('financeiro/novo', $this->lang->line('financeiro.nova_transacao'), 'class="btn btn-primary" style="float:left; color: white"');
                        ?>
                    </div>
                    <BR></BR>

                    <div id="divListaPagamentos<?php echo $item_estudio->get_id(); ?>" class="{id_estudio: <?php echo $item_estudio->get_id(); ?>}">
                        <?php if (count($pagamentos) > 0) { ?>
                        <div>
                            <div class="row">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Lista de Pagamentos</h3>
                                    </div>
                                <div class="box-body">
                                    <table id="resultsTablePayment<?php echo $item_estudio->get_id(); ?>" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Aluno</th>
                                                <th>Número de aulas</th>
                                                <th>Hora/aula R$</th>
                                                <th>Desconto %</th>
                                                <th>Valor</th>
                                                <th>Ações</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $contador_aulas = 0;
                                        foreach ($pagamentos as $pagamento) {
                                            
                                            $contador_aulas += $pagamento->get_numero_aulas();
                                            $valor_total_estudio += $pagamento->get_valor();
                                            
                                            $aluno = $this->aluno;
                                            $aluno->set_id($pagamento->get_id_aluno());
                                            $aluno->retrieve();
                                            ?>
                                                <tr>
                                                    <td><?php echo $this->datas->mysql_para_normal($pagamento->get_data_pagamento()); ?></td>
                                                    <td><?php echo $aluno->get_nome(); ?></td>
                                                    <td><?php echo $pagamento->get_numero_aulas(); ?></td>
                                                    <td><?php echo $pagamento->get_hora_aula(); ?></td>
                                                    <td><?php echo $pagamento->get_desconto(); ?></td>
                                                    <td><?php echo $pagamento->get_valor(); ?></td>
                                                    <td>
                                                        <?php echo anchor('financeiro/editar/' . $pagamento->get_id(), ' ', array('class' => "glyphicon glyphicon-pencil", 'title' => 'Editar')); ?>
                                                        <?php echo anchor('financeiro/remover_pagamento/' . $pagamento->get_id(),' ', array( 'onclick' => "return confirm('Deseja realmente deletar este pagamento?')", 'class' =>"glyphicon glyphicon-remove", 'title' => 'Remover')); ?>
                                                    </td>
                                                </tr>
                                            <?php 
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" align="right">TOTAL</td>
                                            <td><?php echo $contador_aulas; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="2">R$ <?php echo $valor_total_estudio; ?></td>
                                        </tr>
                                    </tfoot>
                                  </table>
                                </div>
                              </div>
                          </div>
                        </div>

                        <?php  } else { ?>
                            <h3><?php echo $this->lang->line('financeiro.nenhum_pagamento');?></h3>
                        <?php  } ?>
                    </div>
                </div>

                <?php echo br(2); ?>

                <!-- CONTAINER DESPESAS -->
                <div class="container-fluid">
                    <h2>Despesas</h2>
                    
                    <div id="divToolbarDespesas" >
                        <?php echo anchor('financeiro/nova_despesa', $this->lang->line('financeiro.nova_despesa'), 'class="btn btn-primary" style="float:left; color: white"'); ?>
                    </div>

                    <BR></BR>
                    

                    <div id="divListaDespesas">
                        <?php  if (count($despesas) > 0) { ?>
                            <div>
                                <div class="row">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3 class="box-title">Lista de Despesas</h3>
                                        </div>
                                    <div class="box-body">
                                        <table id="resultsTableExpense<?php echo $item_estudio->get_id(); ?>" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                    <th>Ações</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $contador_aulas = 0;
                                            
                                            foreach ($despesas as $despesa) {
                                                $valor_total_despesas_estudio += $despesa->get_valor();
                                                ?>
                                                    <tr>
                                                        <td><?php echo $this->datas->mysql_para_normal($despesa->get_data()); ?></td>
                                                        <td><?php echo $despesa->get_descr(); ?></td>
                                                        <td><?php echo $despesa->get_valor(); ?></td>
                                                        <td>
                                                            <?php echo anchor('financeiro/editar_despesa/' . $despesa->get_id(), ' ', 'class="glyphicon glyphicon-pencil"'); ?>
                                                            <a class="glyphicon glyphicon-remove" onclick="confirmDeleteDespesa(<?php echo $despesa->get_id(); ?>);"></a>
                                                        </td>
                                                    </tr>
                                                <?php 
                                            }
                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2" align="right">TOTAL</td>
                                                <td colspan="2">R$ <?php echo $valor_total_despesas_estudio; ?></td>
                                            </tr>
                                        </tfoot>
                                      </table>
                                    </div>
                                  </div>
                              </div>
                            </div>

                            <?php  } else { ?>
                                <h3><?php echo $this->lang->line('financeiro.nenhuma_despesa');?></h3>
                            <?php  } ?>
                        </div>
                    </div>


                <?php echo br(2); ?>

                <!-- CONTAINER TOTAL -->
                <div class="container-fluid">
                    <h2>Saldo</h2>

                    <?php
                        $total_do_periodo = $valor_total_estudio - $valor_total_despesas_estudio;
                        // $valor_saldo_mes_anterior = $this->financeiro_hpilates->calcula_saldo($mes_anterior, $ano_anterior, $item_estudio->get_id());
                        // $valor_saldo_mes = $this->financeiro_hpilates->calcula_saldo($mes, $ano, $item_estudio->get_id());
                    ?>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <div id="divTotais">
                            <table class="table table-bordered table-striped table-01">
                                <tr>
                                    <th>Total Arrecadado</th>
                                    <td>R$ <?php echo $valor_total_estudio; ?></td>
                                </tr>
                                <tr>
                                    <th>Gastos do mês</th>
                                    <td>R$ <?php echo $valor_total_despesas_estudio; ?></td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>R$ <?php echo $total_do_periodo; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?> <!-- END FOREACH ITEM ESTUDIOS -->
    </div>
<?php }?>  <!-- END COUNT ESTUDIOS -->

<div id="divDialogConfirmRemoveDespesa" title="Remover despesa?">
    <p class="msg msg-warning" style="color: black;">Esta despesa será permanentemente removida e não poderá ser recuperada. Você tem certeza?</p>
    <input type="hidden" id="hdnIdDespesaDelete"/>
</div>

<div id="divDialogConfirmRemovePayment" title="Remover pagamento?">
    <p class="msg msg-warning" style="color: black;">Este pagamento será permanentemente removido e não poderá ser recuperado. Você tem certeza?</p>
    <input type="hidden" id="hdnPaymentIdDelete"/>
    <input type="hidden" id="hdnPaymentIdEstudio"/>
    <input type="hidden" id="hdnPaymentMes" value="<?php echo $mes; ?>"/>
    <input type="hidden" id="hdnPaymentAno" value="<?php echo $ano; ?>"/>
</div>


<style>
.ui-datepicker-calendar {
    display: none;
    }
.ui-datepicker-month {
    color:gray;
}
.ui-datepicker-year {
    color:gray;
}
/*button.ui-datepicker-close {
    display: none;
}*/
button.ui-datepicker-current {
    display: none;
}​

</style>
<script>
  $(function () {

    // Para aparecer em todos os estudios
    <?php foreach($estudios as $estudio){ ?>
        $("#resultsTablePayment<?php echo $estudio->get_id(); ?>").DataTable();
        $("#resultsTableExpense<?php echo $estudio->get_id(); ?>").DataTable();
    <?php } ?>

    getFinanceiro = function() {
        var selectedMonth = document.getElementById("current_month").value;
        var selectedYear = document.getElementById("current_year").value;

        var currentMonth = "<?php echo $mes;?>"
        var currentYear = "<?php echo $ano;?>"

        if (parseInt(currentMonth) != parseInt(selectedMonth) || parseInt(currentYear) != parseInt(selectedYear)) {
            // Envia request se o mês e o ano selecionado são diferentes do atual
            var url = "<?php echo site_url('financeiro/painel/');?>" + '/' + selectedMonth + '/' + selectedYear;
            // Cria um form fictício para enviar request
            var form = $('<form action="' + url + '" method="post">' +
              '<input type="text" name="api_url" value="123" />' +
              '</form>');
            $('body').append(form);
            form.submit();
        }
    }

    getFinanceiroAtual = function() {
        var selectedMonth = document.getElementById("current_month").value;
        var selectedYear = document.getElementById("current_year").value;

        var currentMonth = "<?php echo $atual_mes;?>"
        var currentYear = "<?php echo $atual_ano;?>"

        if (parseInt(currentMonth) != parseInt(selectedMonth) || parseInt(currentYear) != parseInt(selectedYear)) {
            // Envia request se o mês e o ano selecionado são diferentes do atual
            var url = "<?php echo site_url('financeiro/painel/');?>" + '/' + currentMonth + '/' + currentYear;
            // Cria um form fictício para enviar request
            var form = $('<form action="' + url + '" method="post">' +
              '<input type="text" name="api_url" value="123" />' +
              '</form>');
            $('body').append(form);
            form.submit();
        }
    }

  });
</script>

