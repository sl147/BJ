<?php include 'views/layouts/header.php';?>

<div class="text-center col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<?php if ($taskList) :?>
		<h2>Список задач</h2>

		<table class="table table-responsive table-bordered table-striped table-hover">
			<thead>
				<th class="text-center thwidth"">				
					<a href="/sortName/<?=$sortName?>/page-<?=$page?>">
						<?php if ($sortName == 1) :?>
							<i class="fa fa-arrow-circle-up fa-fw"></i>
						<?php else :?>
							<i class="fa fa-arrow-circle-down fa-fw"></i>
						<?php endif;?>
					</a>
					имя
				</th>
				<th class="text-center">
<!-- 					<form>
						<input type="hidden" name="sort" value="2" />
						<input type="submit" name="submit" value="2" />
					</form> -->
					<a href="/sortEmail/<?=$sortEmail?>/page-<?=$page?>">
						<?php if ($sortEmail == 1) :?>
							<i class="fa fa-arrow-circle-up fa-fw"></i>
						<?php else :?>
							<i class="fa fa-arrow-circle-down fa-fw"></i>
						<?php endif;?>
					</a>
					e-mail</th>
				<th class="text-center">задача</th>
				<th class="text-center">картинка</th>
				<th class="text-center">
					<a href="/sortStatus/<?=$sortStatus?>/page-<?=$page?>">
						<?php if ($sortStatus == 1) :?>
							<i class="fa fa-arrow-circle-up fa-fw"></i>
						<?php else :?>
							<i class="fa fa-arrow-circle-down fa-fw"></i>
						<?php endif;?>
					</a>
					статус
				</th>
			</thead>
			<tbody>
				<?php foreach($taskList as $task) :?>
					<tr class="tdHeight">
						<td><?= $task['name']?></td>
						<td><?= $task['email']?></td>
						<td class="tdwidth"><?= $task['task']?></td>
						<td>
							<?php if ($task['image']) :?>	
								<img class="fototov" alt="<?= $task['image']?>" src="<?= $pathdir.$task['image']?>" />					
							<?php endif; ?>						
						</td>
						<td><?= Task::getStatus($task['status'])?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>

		<?php if ($total > Task::SHOW_BY_DEFAULT) :?>
			<div class="text-center"><? echo $pagination->get(); ?></div>
		<?php endif; ?>

			<div class="text-center">
				<a href="/create" class='btn btn-primary'>создать задачу</a>
			</div>
	<?php else :?>
		<h2 class="text-center">Пока задач не создано</h2>
		<div class="text-center">
			<a href="/create" class='btn btn-primary'>создать первую задачу</a>
		</div>
	<?php endif; ?>
</div>
<?php include 'views/layouts/footer.php';?>