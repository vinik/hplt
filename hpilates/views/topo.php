<?php 
	//nivel de acesso
	$nivel = intval($this->session->userdata('nivel'));
?>
	<body>
	
	
    	
	
<div id="main">

    <!-- HEADER -->
    <div id="header" class="box">
    

        <p id="logo"><a href="#" title="[Dashboard]"><img src="<?php echo base_url(); ?>img/logo.png" alt="AdminSquare" height="60px"/></a></p> <!-- REC. HEIGHT 50PX -->

        <hr class="noscreen" />

        <!-- NAVIGATION -->
        <ul id="nav">
            <li>
				<?php echo anchor('dashboard', $this->lang->line('menu.dashboard')); ?>            	
            </li>
            <?php
			if($nivel == NIVEL_ROOT || $nivel == NIVEL_PROFESSOR){
			?>
				<li>
					<a href="#"  class="dropdown"><?php echo $this->lang->line('menu.clients'); ?></a>
					<ul id="submenuAlunos">
						<li>
							<a href="<?php echo site_url('alunos'); ?>" target="_self" ><?php echo $this->lang->line('menu.painel'); ?></a>
						</li>
						<li>
							<a href="<?php echo site_url('alunos/lista'); ?>" target="_self" ><?php echo $this->lang->line('menu.listar'); ?></a>
						</li>
						<li>
							<a href="<?php echo site_url('alunos/novo'); ?>" target="_self" ><?php echo $this->lang->line('menu.novo'); ?></a>
						</li>
					</ul>
				</li>
			<?php 
			}
			?>
			
			<?php
			if($nivel == NIVEL_ROOT){
			?>
				<li>
					<a href="#" class="dropdown"><?php echo $this->lang->line('menu.professionals'); ?></a>
					<ul id="submenuProfessores">
						<li>
							<a href="<?php echo site_url('professores'); ?>" target="_self"  img="chart.png" ><?php echo $this->lang->line('menu.painel'); ?></a>
						</li>
						<li>
							<a href="<?php echo site_url('professores/lista'); ?>" target="_self" ><?php echo $this->lang->line('menu.listar'); ?></a>
						</li>
						<li>
							<a href="<?php echo site_url('professores/novo'); ?>" target="_self" img="mais.png" ><?php echo $this->lang->line('menu.novo'); ?></a>
						</li>
					</ul>
				</li>
			<?php 
			}
			?>
			
			<?php
			if($nivel == NIVEL_ROOT){
				?>
	            <li>
	            	<a href="#" class="dropdown"><?php echo $this->lang->line('menu.estudios'); ?></a>
	            	<ul id="submenuEstudios">
						<li>
							<a href="<?php echo site_url('estudios'); ?>" target="_self"  img="chart.png" ><?php echo $this->lang->line('menu.painel'); ?></a>
						</li>
						<li>
							<a href="<?php echo site_url('estudios/lista'); ?>" target="_self" ><?php echo $this->lang->line('menu.listar'); ?></a>
						</li>
						<li>
							<a href="<?php echo site_url('estudios/novo'); ?>" target="_self" img="mais.png" ><?php echo $this->lang->line('menu.novo'); ?></a>
						</li>
					</ul>
	            </li>
	            <?php 
            }
            ?>
            <li><?php echo anchor('agenda/agenda_estudio', $this->lang->line('menu.agenda')); ?></li>
            <?php
			if($nivel == NIVEL_ROOT){
				?>
	            <li><?php echo anchor('usuarios/lista', $this->lang->line('menu.usuarios')); ?></li>
	            <?php 
			}
            ?>
            
            <?php
            if($nivel == NIVEL_ROOT || $nivel == NIVEL_PROFESSOR){
				?>
				<li><?php echo anchor('financeiro', $this->lang->line('menu.financeiro')); ?></li>
				<?php 
			}
			?>
        </ul>

        <!-- USER -->
        <ul id="user">
        	<?php
			if($nivel == NIVEL_ROOT){
			?>
			<li>
				<?php echo anchor('configs','Configurações'); ?>
			</li>
			<?php 
			}
			?>
			<?php 
			/*
            <li><?php echo anchor('configs/preferencias', 'Prefer�ncias'); ?></li>
            */
			?>
            <li><?php echo anchor('logout', 'Sair'); ?></li>
        </ul>

    </div> <!-- /header -->

    <hr class="noscreen" />
    
    <div id="loading"><?php echo img('img/loader.gif'); ?></div>

    <!-- CONTENT -->
    <div id="content" class="box">
		
		<h1><?php echo $titulo; ?></h1>
		<?php 
		/*
		<!-- SEARCH -->
        <form action="#" method="get" id="search">
            <p>
                <input type="text" size="30" name="" class="input-text" />
                <select name="#" class="input-text">
                    <option value="#">Alunos</option>
                    <option value="#">Professores</option>
                    <option value="#">Users</option>
                </select>
                <input type="submit" value="Busca" class="input-submit" />
            </p>
        </form>
		*/
		?>

<!-- SYSTEM MESSAGES -->
<?php
		//erros e informa��es
		$info = $this->session->flashdata(MESSAGE_TYPE_SUCCESS);
		if('' != $info){
			?>
		        <p class="msg msg-ok SYSTEM_MESSAGE"><strong>Ok!</strong> <?php echo $info; ?></p>
			<?php
		}
		$erro = $this->session->flashdata(MESSAGE_TYPE_ERROR);
		if('' != $erro){
			?>
	        <p class="msg msg-error SYSTEM_MESSAGE"><strong>Erro!</strong> <?php echo $erro; ?></p>
			<?php
		}
		$warning = $this->session->flashdata(MESSAGE_TYPE_WARNING);
		if('' != $warning){
			?>
	        <p class="msg msg-warning SYSTEM_MESSAGE"><strong>Aviso!</strong> <?php echo $warning; ?></p>	
			<?php
		}
		?>