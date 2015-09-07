<div>
    <?php
        echo form_open('configs/processar', array('id' => 'frmCfgGerais', 'class' => "form-horizontal"));
    ?>
    <fieldset>
        <legend><?php echo $this->lang->line('configs.gerais.title'); ?></legend>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('configs.inicio_expediente');?></label>
                <div class="form-group col-xs-4">
                    <?php
                        echo select_horas('inicio_expediente', INTERVALO_SELECT_PADRAO,  $config_array[CONFIG_INICIO_EXPEDIENTE]['valor'], 'class="form-control"');
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('configs.intervalo_campo_horas'); ?></label>
                <div class="form-group col-xs-4">
                <?php
                    $opt_intervalo = array(
                        '1' =>  '1',
                        '2' =>  '2',
                        '3' =>  '3',
                        '4' =>  '4',
                        '5' =>  '5',
                        '6' =>  '6',
                        '10'    =>  '10',
                        '12'    =>  '12',
                        '15'    =>  '15',
                        '20'    =>  '20',
                        '30'    =>  '30',
                        '60'    =>  '60',
                    );
                    echo form_dropdown(
                        $config_array[CONFIG_INTERVALO_CAMPO_HORAS]['nome'], $opt_intervalo, $config_array[CONFIG_INTERVALO_CAMPO_HORAS]['valor'], 'class="form-control"');
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->lang->line('configs.valor_aula_padrao'); ?></label>
                <div class="form-group col-xs-4">
                    <div class="input-group">
                        <span class="input-group-addon">R$</span>
                        <input type="text" name="<?php echo $config_array[CONFIG_VALOR_PADRAO_AULA]['nome']?>"class="form-control" value="<?php echo $config_array[CONFIG_VALOR_PADRAO_AULA]['valor']?>">
                        <span class="input-group-addon">.00</span>
                    </div>
                </div>
            </div>

          <div class="box-footer">
            <button type="submit" value="Enviar" class="btn btn-primary pull-left">Salvar</button>
          </div>
    </fieldset>
    <!-- <input type="submit"  class="input-submit"> -->
    <?php echo form_close();?>
</div>
