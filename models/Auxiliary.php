<?php
/**
 * Вспомагателный класс
 */
class Auxiliary
{
    /**
     * Запись файла изображения
     * @param  string $nameFile имя файла изображения
     * @param  string $pathdir путь для сохранения файла
     * @return 
     */
    public static function saveImage($nameFile,$pathdir) {
        include_once 'components/classSimpleImage.php';
        $res = self::makeDir($pathdir);
        $fns = $pathdir.$nameFile;
        move_uploaded_file ($_FILES['image'] ['tmp_name'],$fns);
        $image = new SimpleImage();
        $image ->load($fns);
        $image ->resizeToWidth(320);
        $image ->resizeToHeight(240);
        $image ->save($fns);      
    }

    /**
     * Проверка существование папки для записи изображений.
     * Если не существует - создаем
     * @param  string $path путь для сохранения файла
     * @return 
     */
	private function makeDir($path) {
		if (!file_exists($path)) {
			if (!mkdir($path,0755, true)) {
				return false;
			}
		}
		return true;		
	}
    /**
     * Фильтр текстовой переменной полученной из формы
     * @param  string $field имя переменной формы типа text
     * @return 
     */
	public static function filterTXT($field) {
		return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	}
    /**
     * Фильтр еmail полученного из формы
     * @param  string $field имя переменной формы типа еmail
     * @return 
     */
	public static function filterEmail($field) {
		return filter_input(INPUT_POST, $field, FILTER_SANITIZE_EMAIL);
	}
    /**
     * Фильтр числовой переменной полученной из формы
     * @param  integer $field имя переменной формы типа number
     * @return 
     */
	public static function filterINT($field) {
		return filter_input(INPUT_POST, $field, FILTER_VALIDATE_INT);
	}

    /**
     * Транслитерация с кирилицы в английский
     * @param  string $string текст для транслитерации
     * @return string $string
     */	
	public static function rusTranslate($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => "",  'ы' => 'y',   'ъ' => "",
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
 
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => "",  'Ы' => 'Y',   'Ъ' => "",
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        ' ' => '_',   'і' => 'i',  'І' => 'I',
    );
    return strtr($string, $converter);		
	}
}
?>