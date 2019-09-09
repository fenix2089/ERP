<nav class="purple">
	<div class="nav-wrapper">
		<a href="#" class="brand-logo"><img src="../public/img/erp/logo_nv.png" width="50" height="40" alt="Logo"></a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i>
		</a>
		<ul class="right hide-on-med-and-down">
			<li>
				<span style="display:block;text-align:center;" >
					<a href="#modal1"><i class="material-icons">person_add</i></a>
				</span>
				</li>
			<li>
				<span style="display:block;text-align:center;" >
					<a href="./modulos/lista_usuarios.php"><i class="material-icons">library_books</i></a>
				</span>
			</li>
			<li>
				<span style="display:block;text-align:center;" >
					<a href="./modulos/mainpage.php"><i class="material-icons">devices_other</i></a>
				</span>
			</li>
			<li>
				<span style="display:block;text-align:center;">
					<a href="../controllers/controller_login.php?salir=salir" onClick="return confirm('¿Estas seguro que quieres salir?')"><i class="material-icons">exit_to_app</i></a>
				</span>
			</li>
		</ul>
		<ul class="side-nav" id="mobile-demo">
			<li>
				<a href="registrarse.php"><i class="material-icons">person_add</i>Nuevo Usuario</a>
			</li>
			<li>
				<a href="./modulos/lista_usuarios.php"><i class="material-icons">library_books</i>Lista Usuarios</a>
			</li>
			<li>
				<a href="./modulos/mainpage.php"><i class="material-icons">devices_other</i>Módulos</a>
			</li>
			<li>
				<a href="../controllers/controller_login.php?salir=salir" onClick="return confirm('¿Estas seguro que quieres salir?')"><i class="material-icons">power_settings_new</i>Salir</a>
			</li>
		</ul>
	</div>
</nav>
