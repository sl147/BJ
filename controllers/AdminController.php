<?php
/*
 * Контроллер для работы со страницей администратора
 */
class AdminController
{	

	public function actionIndex ( $page = 1) {
		if (isset($_POST['submit'])) {
			$task   = Auxiliary::filterTXT('task');
			$id     = Auxiliary::filterINT('id');
			$status = isset($_POST['status']) ? 1 : 0;
			$res    = Task::editTask($id,$task,$status);
		}
		//$pathdir  = dirname(__DIR__)."/image/";
		//$pathdir = 'http://127.0.0.1:801/'.dirname(__DIR__)."/image/";
		//$pathdir = 'http://testbeegee:801'."/image/";
		$pathdir   = "/image/";
		$taskList = Task::getAllTask();
		require_once ('views/admin/view.php');
		return true;		
	}
}	
?>