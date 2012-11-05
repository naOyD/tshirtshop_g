<?php
class Link
{
    public static function Build($link)
    
    {
        
        $base = 'http://' . getenv('SERVER_NAME');
        // Если константа HTTP_SERVER_PORT определена и значение отличается от исп-го по умолчанию
        if (defined('HTTP_SERVER_PORT') && HTTP_SERVER_PORT != '80')
        {
            // добавляем номер порта
            $base .= ':' . HTTP_SERVER_PORT;
        }
        $link = $base . VIRTUAL_LOCATION . $link;
        // Escape-символы для html
        return htmlspecialchars($link, ENT_QUOTES);
    }
    
      public static function ToDepartment($departmentId, $page = 1)
  {
    $link = self::CleanUrlText(Catalog::GetDepartmentName($departmentId)) . 
            '-d' . $departmentId . '/';
    
    if ($page > 1)
        $link .= 'page-' . $page . '/';

    return self::Build($link);
  }
  
  public static function ToCategory($departmentId, $categoryId, $page = 1)
  {
    $link = self::CleanUrlText(Catalog::GetDepartmentName($departmentId)) .
            '-d' . $departmentId . '/' . 
            self::CleanUrlText(Catalog::GetCategoryName($categoryId)) . 
            '-c' . $categoryId . '/';
    
    if ($page > 1)
        $link .= 'page-' . $page . '/';
        
    return self::Build($link);
  }  
  
  public static function ToProduct($productId)
  {
    $link = self::CleanUrlText(Catalog::GetProductName($productId)) .
    '-p' . $productId . '/';
    return self::Build($link);
  }
  
  public static function ToIndex($page = 1)
  {
    $link = '';
    
    if ($page > 1)
        $link .= 'page-' . $page . '/';
        
    return self::Build($link);
  }
  
   public static function QueryStringToArray($queryString)
  {
    $result = array();

    if ($queryString != '')
    {
      $elements = explode('&', $queryString);

      foreach($elements as $key => $value)
      {
        $element = explode('=', $value);
        $result[urldecode($element[0])] =
          isset($element[1]) ? urldecode($element[1]) : '';
      }
    }

    return $result;
  }

  // Подготавливает строку к использованию в URL
  public static function CleanUrlText($string)
  {
    //Удаляем все символы, кроме a-z, 0-9, дефиса, знака подчеркивания и проебла
    $not_accetable_characters_regex = '#[^-a-zA-Z0-9_ ]#';
    $string = preg_replace($not_accetable_characters_regex,'', $string);
    //Удаляем все пробелы в начале и в конце строки
    $string = trim($string);
    //Заменяем все дефисы, знаки подчеркивания и пробелы дефисами
    $string = preg_replace('#[-_ ]+#', '-', $string);
    return strtolower($string);
  }
  //Выполняем перенаправлениепо корректному URL в случае необходимости
  public static function CheckRequest()
  {
    $proper_url = '';
    
    //Получаем правильный URL для страниц категорий
    if (isset ($_GET['DepartmentId']) && isset ($_GET['CategoryId']))
    {
        if (isset ($_GET['Page']))
            $proper_url = self::ToCategory($_GET['DepartmentId'],
                            $_GET['CategoryId'], $_GET['Page']);
        else
            $proper_url = self::ToCategory($_GET['DepartmentId'],
                            $_GET['CategoryId']);
    }
    
    //Получаем правильный URL для страниц отделов
    elseif (isset ($_GET['DepartmentId']))
    {
        if (isset ($_GET['Page']))
            $proper_url = self::ToDepartment($_GET['DepartmentId'],
                            $_GET['Page']);
        else
            $proper_url = self::ToDepartment($_GET['DepartmentId']);
    }
    //Получаем правильный URL для страниц товаров
    elseif (isset ($_GET['ProductId']))
    {
        $proper_url = self::ToProduct($_GET['ProductId']);
    }
    //Получаем правильный URL для главной страницы
    else
    {
        if (isset ($_GET['Page']))
            $proper_url = self::ToIndex($_GET['Page']);
        else
            $proper_url = self::ToIndex();    
    }
    
    /*Удаляем виртуальные локации из запрошенного URL,
    чтобы можно было сравнить пути*/
    $requested_url = self::Build(str_replace(VIRTUAL_LOCATION, '',
                                             $_SERVER['REQUEST_URI']));
    
    //Перенаправление с кодом 301 по корректному URL при необходимости
    if ($requested_url != $proper_url)
    {
        //Очищаем буфер выводы
        ob_clean();
        
        //Выполняем перенаправление по коду 301
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $proper_url);
        
        //Очищаем буфер вывода и завершаем работу
        flush();
        ob_flush();
        ob_end_clean();
        exit();
    }
  }
}
















?>