<?php
/*
 * Контроллер для работы со страницей пользователя
 */

class SiteController
{	
 
const PATHDIR = "/image/";
    /**
     * Проверка регистрации пользователя
     * переход в админчасть или пользовательскую
     */	
	public function actionLog()
	{
		if(isset($_POST['submit'])) {
			$login    = Auxiliary::filterTXT('login');
			$password = Auxiliary::filterTXT('password');
			$userId   = User::chekUserData($login,$password);
			$Location = User::isAdmin($userId) ? 'admin' : 'index';
			header ('Location: /'.$Location);
		}

		require_once ('views/site/log.php');
		return true;
	}

    /**
     * Вывод списка задач
     */	
	public function actionIndex ($page = 1) {
		$sortName    = $sortEmail = $sortStatus = 0;
		$taskList    = Task::getAllTaskByPage($page);
		$total       = Task::getTotalTask();
		$pathdir     = self::PATHDIR;
		$pagination  = new Pagination($total, $page, Task::SHOW_BY_DEFAULT, 'page-');
		
		require_once ('views/site/view.php');
		return true;
	}

    /**
     * Вывод отсортированого списка
     */	
	private function viewSort ($page, $sortStatus, $sortName, $sortEmail, $atr) {
		
		$taskList   = Task::getAllTaskByPage($page);
		$total      = Task::getTotalTask();
		$pathdir    = self::PATHDIR;
	
		switch($atr)
		{
			case 'name':
				$taskList   = Task::sort($sortName,$taskList, $atr);
				$sortName   = ($sortName == 1) ? 0 : 1;
			break;

			case 'email':
				$taskList   = Task::sort($sortEmail,$taskList, $atr);
				$sortEmail  = ($sortEmail == 1) ? 0 : 1;
			break;

			case 'status':
				$taskList   = Task::sort($sortStatus,$taskList, $atr);
				$sortStatus = ($sortStatus == 1) ? 0 : 1;
			break;

			default:
			break;
		}	

		$pagination = new Pagination($total, $page, Task::SHOW_BY_DEFAULT, 'page-');
		
		require_once ('views/site/view.php');
		return true;
	}

    /**
     * Сортировка по состоянию выполнения задач
     */	
	public function actionSortStatus ($sortStatus, $page = 1) {
		global $atr;
		$atr        = "status";
		$sortStatus = (empty($sortStatus)) ? 0 : $sortStatus;
		$sortName   = $sortEmail = 0;
		$res = self::viewSort ( $page, $sortStatus, $sortName, $sortEmail, $atr);
	
		return true;
	}

    /**
     * Сортировка по email
     */	
	public function actionSortEmail ($sortEmail, $page = 1) {
		global $atr;
		$sortEmail  = (empty($sortEmail)) ? 0 : $sortEmail;
		$atr        = "email";
		$sortName   = $sortStatus = 0;
		
		$res = self::viewSort ( $page, $sortStatus, $sortName, $sortEmail, $atr);
		return true;
	}

    /**
     * Сортировка по имени пользователя
     */
	public function actionSortName ($sortName, $page = 1) {
		global $atr;
		$sortName  = (empty($sortName)) ? 0 : $sortName;
		$atr       = "name";
		$sortEmail = $sortStatus = 0;

		$res = self::viewSort ( $page, $sortStatus, $sortName, $sortEmail, $atr);
		return true;
	}


    /**
     * Запись в БД новой задачи
     */
	public function actionCreate () {
		if (isset($_POST['submit'])) {
			$name  = Auxiliary::filterTXT('name');
			$task  = Auxiliary::filterTXT('task');
			$email = Auxiliary::filterEmail('email');;
			$image = '';
			if (!empty($_FILES['image'] ['tmp_name'])) {
				$pathdir = dirname(__DIR__)."/image/";
				$image   = Auxiliary::rusTranslate($_FILES['image']['name']);
				$res     = Auxiliary::saveImage($image,$pathdir);
			}
			$result = Task::saveTask($name,$task,$image,$email);
			header( "Location: index");
		}
		
		require_once ('views/site/create.php');
		return true;
	}

}	
?>