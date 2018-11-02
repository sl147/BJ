<?

class Db
{
	
	public static function getConnection()
	{
		$paramsPath = 'config/db_params.php';
		$params = include ($paramsPath);

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		//$db = new PDO($dsn,$params['user'],$params['password']);
		$db = new PDO($dsn,$params['user'],$params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

		return $db;
	}

}
?>