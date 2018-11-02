<?php include 'views/layouts/header.php';?>
<a href="/index" class="btn btn-info posButton">На страницу пользователя</a>
<div class="text-center col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<?php if ($taskList) :?>		
		<h3>Список задач администратора</h3>
		<table class="table table-responsive table-bordered table-striped table-hover">
			<thead>
				<th class="text-center">имя</th>
				<th class="text-center">e-mail</th>
				<th class="text-center">задача</th>
				<th class="text-center">картинка</th>
				<th class="text-center">статус</th>
				<th></th>
			</thead>
			<tbody>				
				<?php foreach($taskList as $task) :?>
					<form method="post">
					<tr>
						<td><p class="tdContainer"><?= $task['name']?></p></td>
						<td><p class="tdContainer"><?= $task['email']?></p></td>
						<td>
							<textarea title="редактировать можно здесь. Кнопка в самой правой колонке фиксирует изменения" name="task" type="text" rows ='7' cols = '60'><?= $task['task']?></textarea>
						</td>
						<td>
							<?php if ($task['image']) :?>	
								<img class="fototov" alt="<?= $task['image']?>" src="<?= $pathdir.$task['image']?>" />					
							<?php endif; ?>						
						</td>
						<td><p class="tdContainer">
							<?if ($task['status'] == '1') :?>
								<input title='отметка о выполнении' name="status" type="checkbox" class='cBox' value="<?= $task['status']?>" checked>
							<?else :?>
								<input title="отметка о выполнении"" name="status" type="checkbox" class="cBox" value="<?= $task['status']?>">
							<?endif;?>
							</p>
						</td>
						<td>
							<input type="hidden" name="id" value="<?= $task['id']?>">
							<button  class="tdContainer changeVisibility" data-id="<?= $task['id']?>" title="редактировать строку" name="submit" type="submit">
								<i class="fa fa-pencil-square-o fa-fw"></i>
							</button>

						</td>
					</tr>
					</form>
				<?php endforeach;?>				
			</tbody>
		</table>
	<?php else :?>
		<h2 class="text-center">Пока задач не создано</h2>
	<?php endif; ?>
</div>
							<div class="alert alert-success success" role="alert">
  V
</div>

<?php include 'views/layouts/footer.php';?>

<script type="text/javascript">
  $(document).ready(function() {

  $(".changeVisibility").on("click", function() {
  	//var pl=$(this).find('button.tdContainer');
  	var id = $(this).data("id")
//alert('here id='+id)
$(".success").css("visibility","visible")
				setTimeout(()=>{					
				}, 2000);
	})
})
</script>