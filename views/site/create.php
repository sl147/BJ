<?php include 'views/layouts/header.php';?>


<div class="text-center col-lg-6 col-md-6 col-sm-12 col-xs-12">

<form id = "auth" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend><h4 class="text-center">Создание задачи</h4></legend>
		<label><b>Имя пользователя</label><input autofocus name="name" type="text" placeholder="Имя пользователя"><br><br>
		<label>E-mail</label><input name="email" type="email" placeholder="E-mail"><br><br>
		<label>Задача</label><textarea name="task" type="text" rows ='8' cols = '60'></textarea><br><br>
		<input type="hidden" name="MAX_FILE_SIZE" value="3000000">
		<label>Фотография</label>
    	<input type="file" name="image" accept="image/JPEG,image/GIF,image/PNG"><br><br>
		<div class = "text-center">
			<button class="btn btn-info addButtonWidh" name="submit" type="submit">Добавить</button><br>
			<input  class="btn btn-success" type='button' id='preview' value='Предварительный просмотр'>
		</div>
	</fieldset>
</form>
</div>
<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'>
<div id="view"></div>
</div>

<?php include 'views/layouts/footer.php';?>
<script type="text/javascript">
$(document).ready(function() {
    $("#preview").on("click", function() {
    	let str = ''
        str += '<p class="author">Пользователь:' + document.forms[0].name.value + '</p>';
        str += '<p>e-mail: ' + document.forms[0].email.value + '</p>';
        str += '<p>задача</p><p>' + document.forms[0].task.value + '</p>';
        //str += '<p><img src="' + document.forms[0].image.value + '"></p>';       
        document.getElementById('view').innerHTML = str;
    }) 
})
</script>