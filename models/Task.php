<?php
/*
 * Модель для работы с записями
 */
class Task 
{

	const SHOW_BY_DEFAULT = 3;

    /**
     * Проверка статуса выполнения заданий
     * @param  integer $status статус выполнения: 0- не выполнено, 1 - выполнено    
     * @return string статус выполнения
     */
	public static function getStatus($status) {
		return ($status == 0) ? 'не выполнено' : 'выполнено';
	}


    /**
     * Получение списка всех задач
     * 
     * @return объект
     */
	public static function getAllTask() {
		$list   = [];
		$db     = Db::getConnection();
		$sql    = "SELECT * FROM testBJ_task";
		$result = $db -> query($sql);
		while ($row = $result->fetch()) {
			$list[] = $row;
		}
		return $list;
	}

    /**
     * Получение списка задач на странице пагинации
     * @param  integer $page номер страницы пагинации
     * @return объект
     */
	public static function getAllTaskByPage($page=1) {
		$list   = [];
		$page   = intval($page);
		$offset = ($page - 1) * self::SHOW_BY_DEFAULT;		
		$db     = Db::getConnection();
		$sql    = "SELECT * FROM testBJ_task LIMIT ".self::SHOW_BY_DEFAULT." OFFSET $offset";
		$result = $db -> query($sql);
		while ($row = $result->fetch()) {
			$list[] = $row;
		}
		return $list;
	}

    /**
     * Получение общего количества задач
     * @return integer количество задач
     */
	public static function getTotalTask() {
		$db     = Db::getConnection();
		$sql    = "SELECT count(id) as count FROM testBJ_task";
		$result = $db -> query($sql);
		$row    = $result->fetch();
		return $row['count'];
	}

    /**
     * Запись задач в БД
     * @param  string $name наименование пользователя
     * @param  string $task текст задачи
     * @param  string $image имя файла изображения (без пути)
     * @param  string $email email пользователя
     * @return boolean
     */
	public static function saveTask($name,$task,$image,$email) 
	{
		$db = Db::getConnection();
		$sql = "INSERT INTO testBJ_task (name,task,image,email)
		 VALUES(:name,:task,:image,:email)";
		$result = $db -> prepare($sql);
		$result -> bindParam(':name',  $name,  PDO::PARAM_STR);
		$result -> bindParam(':task',  $task,  PDO::PARAM_STR);
		$result -> bindParam(':image', $image, PDO::PARAM_STR);
		$result -> bindParam(':email', $email, PDO::PARAM_STR);
		
		return $result -> execute();			
	}

    /**
     * Редактирование задачи в БД
     * @param  integer $id id задачи
     * @param  string  $task текст задачи
     * @param  integer $status статус выполнения задачи
     * @return boolean
     */
	public static function editTask($id,$task,$status) {
		$id     = intval($id);
		if ($id) {
			$db     = Db::getConnection();
			$sql    = "UPDATE testBJ_task SET task=:task,status=:status WHERE id=$id";
			$result = $db -> prepare($sql);
			$result -> bindParam(':task',   $task,   PDO::PARAM_STR);
			$result -> bindParam(':status', $status, PDO::PARAM_STR);		
			return $result -> execute();			
		}
	}

    /**
     * Сортировка списка задач по атрибуту
     * @param  integer $sort направление сортировки
     * @param  object  список задач
     * @param  atr $atr по какому атрибуту производить сортировку глобальный атрибут
     * @return list $list отсортированный список задач
     */	
	public static function sort($sort,$list, $atr) {
		if ($sort == 1) {
			usort($list, function($a, $b)
			{
				$atrName = $GLOBALS["atr"];
				return strcmp($a[$atrName], $b[$atrName]);
			});
		}
		else {
			usort($list, function($a, $b)
			{				
				$atrName = $GLOBALS["atr"];		
			    return strcmp($b[$atrName], $a[$atrName]);
			});	
		}
		return $list;			
	}
}
?>