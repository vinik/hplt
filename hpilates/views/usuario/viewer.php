
<div id="divViewerUsuario" style="padding-top: 20px; padding-bottom: 20px; height: 400px;">
	<div id="divToolbarUsuario" class="ui-widget ui-widget-content ui-corner-all" style="margin-bottom: 20px;">
		<ul id="toolbar" class="ui-widget ui-helper-clearfix">
			<li class="ui-state-default ui-corner-all" title="Editar">
				<?php
				echo anchor('usuarios/editar/'.$usuario->get_id(), '<span class="ui-icon ui-icon-pencil"></span>');
				?>
				
			</li>
			<li class="ui-state-default ui-corner-all" title="Agenda">
				<?php
				echo anchor('usuarios/editar/'.$usuario->get_id(), '<span class="ui-icon ui-icon-calculator"></span>');
				?>
			</li>
			<li class="ui-state-default ui-corner-all" title="Remover">
				<?php
				echo anchor('usuarios/editar/'.$usuario->get_id(), '<span class="ui-icon ui-icon-trash"></span>');
				?>
			</li>
		</ul>		
	</div>
	<div id="divViewerUsuarioLeft" class="ui-widget ui-widget-content ui-corner-all" style="width: 450px; float: left; padding: 20px;">
		<div id="abasViewerUsuario">
			<ul>
				<li><a href="#abaUsuario">Usuario</a></li>
				<li><a href="#abaContato">Contato</a></li>
				<li><a href="#abaObj">Objetivos</a></li>
			</ul>
			<div id="abaUsuario">
				<div id="divFotoUsuario" class="ui-widget ui-widget-content ui-corner-all" style="float: left; width: 120px; height: 160px; margin-right: 20px;">FOTO</div>
				<h3><?php echo $aluno->get_nome();?></h3>
				<p><?php echo $aluno->get_profissao();?></p>
				<p><?php echo $aluno->get_data_nascimento();?></p>
			</div>
			<div id="abaContato">
				<p>Email: <?php echo mailto($aluno->get_email(), $aluno->get_email());?></p>
				<p>Endereço: <?php echo $aluno->get_endereco();?></p>
				<p>Telefone: <?php echo $aluno->get_telefone();?></p>
			</div>
			<div id="abaObj">
				<p><?php echo $aluno->get_objetivo();?></p>
			</div>
		</div>
		
	</div>
	<div id="divViewerUsuarioRight" class="ui-widget ui-widget-content ui-corner-all" style="width: 250px; float: right; padding: 20px;">
		<h3>
			Próximas aulas
		</h3>
		
		<?php 
		if(count($aulas) > 0){
			?>
			<ul>
			<?php
			foreach($aulas as $aula){
				?>
				<li><?php echo $aula->get_inicio(); ?><hr></hr></li>
				<?php
			}
			?>
			</ul>
			<?php 
		} else {
			
		}
		?>
	</div>
</div>