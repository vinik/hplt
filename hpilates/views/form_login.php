<html>
<head>
    
    
    <title>Health Pilates - Login</title>
    
    <?php
    /*
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/reset.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/main.css" />
    <!--[if lte IE 7]><link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/main-ie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/skin/main.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="<?php echo base_url(); ?>css/custom.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/redmond/jquery-ui-1.7.2.custom.css" type="text/css">
    <link type="text/css" href="<?php echo base_url(); ?>css/fullcalendar.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/framework.css" type="text/css">


    <link type="text/css" href="<?php echo base_url(); ?>css/mbContainer.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.7.2.custom.min.js"></script>
    
	<!-- plugins -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dropdown.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.metadata.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.hoverintent.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/mbMenu.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/mbContainer.js"></script>
    */
    ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.3.2.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
	
	    
	<script type="text/javascript">

	$(document).ready(function(){

	
		
	});
	
	</script>
	</head>

<body>

<div class="container-fluid">

    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        HPILATES
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    
    <!-- HEADER -->
    <div id="header" class="page-header">
        <h1>Login</h1>
        Informe seus dados de acesso



        

    </div> <!-- /header -->

    <!-- CONTENT -->
    <div id="content" class="box">


        

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
        
        <div>
        <!-- FORM -->
        <?php
		echo form_open('login/processar', array('class' => 'form-horizontal'));
		?>
		  <div class="form-group">
              <label class="col-sm-2 control-label">
                    Usuário
              </label>
              <div class="col-sm-10">
                  <?php echo form_input(array('name' => 'username', 'size' => '60', 'class' => "input-text")); ?>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">
                    Senha
              </label>
              <div class="col-sm-10">
                  <?php echo form_password(array('name' => 'senha', 'size' => "60", 'class' => "input-text")); ?>
              </div>
          </div>

          <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" value="Enviar" class="btn btn-default" >Enviar</button>
    </div>
  </div>

            
        
        </form>


        

    </div> <!-- /content -->

    
    <!-- FOOTER -->
    <div id="footer" class="box">

    
        
    
    </div> <!-- /footer -->

</div> <!-- /main -->

</body>
</html>
