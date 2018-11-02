<?php
/*
 * Модель для работы с пользователями
 */
class User {
    /**
     * Проверка регистрации пользователя
     * @param  string $login логин
     * @param  string $password пароль
     * @return id пользователя или false если пользователь не зарегистрирован
     */	
	public static function chekUserData($login,$password) {
		$db = Db::getConnection();
		$sql = "SELECT * FROM testBJ_user  WHERE login = :login AND password = :password";		
		$result = $db -> prepare($sql);
		$result -> bindParam(':login', $login, PDO::PARAM_STR);
		$result -> bindParam(':password', $password, PDO::PARAM_STR);
		$result -> execute();

		$user = $result-> fetch();
		return ($user) ? $user['id'] : false;	
	}
    /**
     * Получение пользователя по id
     * @param  integer $id логин
     * @return объект с данными пользоваателя
     */	
	private function getUserById ($id) {
		if (intval($id)) {
			$db = Db::getConnection();
			$sql = "SELECT * FROM testBJ_user WHERE id= :id LIMIT 1";
			$result = $db -> prepare($sql);
			$result -> bindParam(':id', $id, PDO::PARAM_INT);
			$result -> execute();
			return $result->fetch();
		}
		return false;
	}
    /**
     * Проверка пользователя по id
     * @param  integer $id логин
     * @return boolean true - пользователь админ  false - нет
     */	
	public static function isAdmin($id) {
		$user = self::getUserById ($id);
		return ($user['admin'] == 1) ? true : false;
	}
}	
?>