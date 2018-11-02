<?php include 'views/layouts/header.php';?>

<div class="text-center col-lg-6 col-md-6 col-sm-12 col-xs-12">	
	<form id = "authlog" method="POST">
			<div class="">
				<div class="input-group ">
					<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
					<input class="btnwidth form-control" name="login" autofocus type="text" placeholder="Логін" >
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
					<input class="btnwidth form-control" name="password" type="password" placeholder="Пароль">
				</div>			
				<button name="submit" type="submit" class="btnwidth btn btn-success btn-sm">войти </button>			
				<a href='author' class="btnwidth btn btn-success btn-sm">регистрация</a>
		</div>
	</form>
</div>
<?php include 'views/layouts/footer.php';?>