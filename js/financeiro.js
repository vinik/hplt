var valorDevido = 0;
var totalAulas = 0;

$(document).ready(function(){
    painelFinanceiro();
    form_transacao();
    form_despesa();
});

function painelFinanceiro(){
    if($('#divTabsFinanceiroEstudios').length > 0){

        $("#divDialogConfirmRemovePayment").dialog({
            autoOpen: false,
            resizable: false,
            position: 'center',
            width:400,
            height:'auto',
            modal: true,
            buttons: {
                'Remover pagamento': function() {
                    var paymentId = $('#hdnPaymentIdDelete').val();
                    var estudioId = $('#hdnPaymentIdEstudio').val();
                    deletePayment(paymentId, estudioId);
                    $(this).dialog('close');
                },
                'Cancelar': function() {
                    $(this).dialog('close');
                }
            }
        });
        
        $("#divDialogConfirmRemoveDespesa").dialog({
            autoOpen: false,
            resizable: false,
            position: 'center',
            width:400,
            height:'auto',
            modal: true,
            buttons: {
                'Remover despesa': function() {
            
                    var id_despesa = $('#hdnIdDespesaDelete').val();
                    deleteDespesa(id_despesa);
                    $(this).dialog('close');
                },
                'Cancelar': function() {
                    $(this).dialog('close');
                }
            }
        });
        
        $('#divTabsFinanceiroEstudios').tabs();
    }

}


function form_transacao(){
    if($('#frmTransacao').length > 0){
        $("#txtNomeAluno").autocomplete({
            source: lista_alunos,
            minLength: 1,
            select: function(event, ui) {
                $('#hdnIdAluno').val(ui.item.id);
                
                valorDevido = 0;
                totalAulas = 0;
                atualizaValores();
                
                buscaAulas();
            }
        });
        
        $('#txtValorPago').val('');
        
        if ($('#selEspecie').val() != '2') {
            $('.CAMPO_CHEQUE').hide();
        }
        
        $('#selEspecie').change(function(){
            if($(this).val() == '2'){
                $('.CAMPO_CHEQUE').show();
            } else {
                $('.CAMPO_CHEQUE').hide();
            }
        });
        
        $('#btnEnviar').button();
        
    }
}

function form_despesa(){
    if ($('#frmDespesa').length > 0) {
        $('#btnEnviar').button();
        
        $('#frmDespesa').submit(validate_required_fields);
    }
}

function atualizaValores(){
    $('#txtTotalAulas').html(totalAulas);
    $('#txtValorDevido').html(valorDevido);
    $('#txtValorPago').val(valorDevido);
}

function buscaAulas(idPagamento){
    
    var idp = '';
    if (!idPagamento) {
        idp = '';
    } else {
        idp = 'id_pagamento=' + idPagamento;
    }
    
    if($('#hdnIdAluno').val().length > 0){
        var id_aluno = $('#hdnIdAluno').val();
        $.ajax({
            url: siteUrl + '/financeiro/aulas_em_aberto/' + id_aluno,
            data: idp,
            type: 'POST',
            success: function(resposta){

                $('#divAulas').html(resposta);
                
                $('.cbEvento').each(function(){

                    var $this = $(this);
                    if ($this.is(':checked')) {
                        var idCbPago = $(this).attr('id');
                        var idEventoPago = idCbPago.substr(8);
                        var idTdValorPago = 'tdValor' + idEventoPago;
                        valor = parseInt($('#' + idTdValorPago).html());
                        valorDevido = valorDevido + valor;
                        totalAulas++;
                    }
                });
                atualizaValores();

                $('.cbEvento').click(function() {
                    var $this = $(this);

                    var idCb = $(this).attr('id');
                    var idEvento = idCb.substr(8);
                    
                    var idTr = 'trEvento' + idEvento;
                    var idTdValor = 'tdValor' + idEvento;
                    valor = parseInt($('#' + idTdValor).html());
                    if ($this.is(':checked')) {
                        valorDevido = valorDevido + valor;
                        totalAulas++;
                    } else {
                        valorDevido = valorDevido - valor;
                        totalAulas--;
                    }
                    atualizaValores();
                });
            }
        });
    }
}


function confirmDeletePayment(paymentId, estudioId){
    $('#hdnPaymentIdDelete').val(paymentId);
    $('#hdnPaymentIdEstudio').val(estudioId);
    $("#divDialogConfirmRemovePayment").dialog('option', 'position', 'center');
    $("#divDialogConfirmRemovePayment").dialog('open');
}

function confirmDeleteDespesa(id_despesa){
    $('#hdnIdDespesaDelete').val(id_despesa);
    $("#divDialogConfirmRemoveDespesa").dialog('option', 'position', 'center');
    $("#divDialogConfirmRemoveDespesa").dialog('open');
}

function deletePayment(paymentId, estudioId){
    $.ajax({
        url: siteUrl + '/financeiro/remover_pagamento/' + paymentId,
        success: function(response){
            dialog(response);
            //reloadPaymentList(estudioId);
        }
    });
}

function deleteDespesa(id_despesa){
    $.ajax({
        url: siteUrl + '/financeiro/remover_despesa/' + id_despesa,
        success: function(response){
            dialog(response);
        }
    });
}