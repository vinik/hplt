<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="robots" content="noindex,nofollow" />
    <meta name="keywords" content="[PASTE YOUR KEYWORDS]" />
    <meta name="description" content="[PASTE YOUR DESCRIPTION]" />
    
    <title>Health Pilates - Admin</title>
    
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/reset.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/main.css" />
    <!--[if lte IE 7]><link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/main-ie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/skin/main.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/custom.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/redmond/jquery-ui.min.css" type="text/css">
    <link type="text/css" href="<?php echo base_url(); ?>css/fullcalendar2.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/framework.css" type="text/css">
    <link type="text/css" href="<?php echo base_url(); ?>css/mbContainer.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assert/bootstrap/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assert/datatables/dataTables.bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assert/AdminLTE.min.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assert/skins/_all-skins.min.css'?>">



    <script type="text/javascript" src="<?php echo base_url(); ?>assert/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
    <!-- plugins -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dropdown.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.metadata.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.hoverintent.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/mbMenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/mbContainer.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/fullcalendar.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.blockUI.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/vnix.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/map_functions.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&language=pt-br"></script>

    
    
    <script type="text/javascript" src="<?php echo base_url().'assert/bootstrap/js/bootstrap.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assert/datatables/jquery.dataTables.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assert/datatables/dataTables.bootstrap.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assert/slimScroll/jquery.slimscroll.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assert/app.min.js'?>"></script>
    <?php
    if(count($script_src) > 0){
        foreach($script_src as $arquivo){
            echo '<script type="text/javascript" src="' . base_url() . 'js/' . $arquivo . '.js"></script>
            ';
        }
    }
    ?>
    
    <script type="text/javascript">
    var baseUrl = '<?php echo base_url(); ?>';
    var siteUrl = baseUrl + 'index.php';

    $(document).ready(function(){

        $('.DATEFIELD').datepicker({
            dateFormat: 'dd/mm/yy'
        });

        //loader
        $(document).ajaxStart(function() {
            
            $.blockUI({
                message: '<h3><img src="' + baseUrl + '/img/loader.gif" /> Carregando</h3>',
                showOverlay: true,
                centerY: true,
                css: { 
                    border: '2px solid #000', 
                    padding: '5px',
                    backgroundColor: '#000', 
                    '-webkit-border-radius': '4px', 
                    '-moz-border-radius': '4px', 
                    opacity: .5, 
                    color: '#FFF' 
                }
            });
        });
        $(document).ajaxStop(function() {
            $.unblockUI();
        });

        //$(".containerPlus").buildContainers({elementsPath: "' . base_url() . '"});
        
        build_buttons();

        $("#dialog").dialog({
            autoOpen: false,
            modal: true,
            buttons: {
                Ok: function() {
                    $(this).dialog('close');
                }
            }
        });

        $('.SYSTEM_MESSAGE').click(function(){
            $(this).hide('slow');
        });

        

        <?php
                if(count($scripts) > 0){
                    foreach($scripts as $script){
                        echo $script;
                        
                    }
                }
        ?>

        
    });
    
    </script>
    </head>
