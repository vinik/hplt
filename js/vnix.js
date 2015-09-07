
function alertar(mensagem, erro){
	if(!erro){
		erro = false;
	}

	var corFundo = '#F00';
	if(!erro){
		corFundo = '#CCC';
	}

	$.blockUI({
        message: mensagem,
        fadeIn: 400,
        fadeOut: 2000,
        timeout: 3000,
        showOverlay: true,
        centerY: true,
        css: {
            width: '350px',
            top: '40px',
            left: '',
            right: '40px',
            border: '2px solid #000',
            padding: '5px',
            backgroundColor: corFundo,
            '-webkit-border-radius': '4px',
            '-moz-border-radius': '4px',
            opacity: .9,
            color: '#000'
        }
    });
}

function validate_required_fields(){
	var valid = true;
	var requiredFields = new Array();

	$('.REQUIRED').each(function(){
		if($(this).val() == ''){
			valid = false;
			requiredFields[requiredFields.length] = $(this).attr('title');
		}
	});

	if(!valid){
		var msg = 'Os seguintes campos s�o obrigat�rios:<ul>';
		for(var i = 0; i < requiredFields.length; i++){
			msg += '<li>' + requiredFields[i];
		}
		msg += '</ul>';
		alertar(msg, true);
	}


	return valid;
}

function build_buttons()
{
	$('.BUTTON').button();

	$('.BUTTON_REMOVE').button({
		icons: {
			primary: "ui-icon-trash"
		},
		text: false
	});

	$('.BUTTON_REMOVE_FULL').button({
		icons: {
			primary: "ui-icon-trash"
		}
	});

	$('.BUTTON_NEW').button({
		icons: {
			primary: "ui-icon-plus"
		},
		text: false
	});

	$('.BUTTON_NEW_FULL').button({
		icons: {
			primary: "ui-icon-plus"
		}
	});

	$('.BUTTON_EDIT').button({
		icons: {
			primary: "ui-icon-pencil"
		},
		text: false
	});

	$('.BUTTON_EDIT_FULL').button({
		icons: {
			primary: "ui-icon-pencil"
		}
	});

	$('.BUTTON_VIEW').button({
		icons: {
			primary: "ui-icon-search"
		},
		text: false
	});

	$('.BUTTON_VIEW_FULL').button({
		icons: {
			primary: "ui-icon-search"
		}
	});

	$('.BUTTON_OK').button({
		icons: {
			primary: "ui-icon-check"
		}
	});
	$('.BUTTON_CANCEL').button({
		icons: {
			primary: "ui-icon-cancel"
		}
	});
}

function dialog(msg) {
	$('#dialogContent').html(msg);
	$('#dialog').dialog('option', 'position', 'center');
	$('#dialog').dialog('open');
}
