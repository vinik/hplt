<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="robots" content="noindex,nofollow" />
    <meta name="keywords" content="[PASTE YOUR KEYWORDS]" />
    <meta name="description" content="[PASTE YOUR DESCRIPTION]" />
    
    <title>Health Pilates - Login</title>
    
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/reset.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/main.css" />
    <!--[if lte IE 7]><link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/main-ie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/skin/main.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/custom.css" />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/redmond/jquery-ui-1.7.2.custom.css" type="text/css">
	<link type="text/css" href="<?php echo base_url(); ?>css/fullcalendar.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/framework.css" type="text/css">

	<link type="text/css" href="<?php echo base_url(); ?>css/mbContainer.css" rel="stylesheet" />
    
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.7.2.custom.min.js"></script>
	
	<!-- plugins -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dropdown.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.metadata.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.hoverintent.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/mbMenu.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/mbContainer.js"></script>
	
	    
	<script type="text/javascript">

	$(document).ready(function(){

	
		
	});
	
	</script>
	</head>

<body>

<div id="main">

    <!-- HEADER -->
    <div id="header" class="box">

        <p id="logo"><a href="#" title="[Dashboard]"><img src="<?php echo base_url(); ?>img/healthpilates.png" alt="AdminSquare" /></a></p> <!-- REC. HEIGHT 50PX -->

        <hr class="noscreen" />

        <!-- NAVIGATION -->

        

    </div> <!-- /header -->

    <hr class="noscreen" />

    <!-- CONTENT -->
    <div id="content" class="box">

        <h1>Login</h1>

        

        <!-- SYSTEM MESSAGES -->
<?php
		//erros e informações
		$info = $this->session->flashdata('info');
		if('' != $info){
			?>
		        <p class="msg msg-ok"><strong>Ok!</strong> <?php echo $info; ?></p>
			<?php
		}
		$erro = $this->session->flashdata('erro');
		if('' != $erro){
			?>
	        <p class="msg msg-error"><strong>Erro!</strong> <?php echo $erro; ?></p>
			<?php
		}
		
		$warning = $this->session->flashdata('warning');
		if('' != $warning){
			?>
	        <p class="msg msg-warning"><strong>Aviso!</strong> <?php echo $warning; ?></p>	
			<?php
		}
		?>
        
        <!-- FORM -->
        <?php
		echo form_open('login/processar');
		?>
		<fieldset>
        <legend>Informe seus dados de acesso</legend>

            <table>
                <tr>
                    <th>Usuário:</th>
                    <td><?php echo form_input(array('name' => 'username', 'size' => '60', 'class' => "input-text")); ?></td>
                </tr>
                <tr>
                    <th>Senha:</th>
                    <td><?php echo form_password(array('name' => 'senha', 'size' => "60", 'class' => "input-text")); ?></td>

                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" value="Enviar" class="input-submit" /></td>

                </tr>
            </table>

        </fieldset>
        </form>


        <div class="fix"></div>

    </div> <!-- /content -->

    <hr class="noscreen" />
    
    <!-- FOOTER -->
    <div id="footer" class="box">

    
        <p class="f-right">Built on <a href="http://www.adminsquare.com/">AdminSquare</a> &ndash; Icons by <a href="http://wefunction.com/2008/07/function-free-icon-set/">Function</a></p>
        
        <p class="f-left">&copy; 2010 <a href="#">Your Company Ltd.</a>, All Rights Reserved &reg;</p>
    
    </div> <!-- /footer -->

</div> <!-- /main -->

</body>
</html>
