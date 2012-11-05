<?php
// Класс уровня логики приложения для считывания информации о каталоге товаров

class Catalog
{
    // получаем список отдело
public static function GetDepartments()
    {
        //Составляем SQL запрос
        $sql = 'CALL catalog_get_departments_list()';
        
        // Выполняем запрос и получаем результат
        return DatabaseHandler::GetAll($sql);
    }
    //Возвращает подробные сведения о выбранном разделе
public static function GetDepartmentDetails($departmentId)
    {
        // составляем SQL - запрос
        $sql = 'CALL catalog_get_department_details(:department_id)';
                     
        // создаем массив параметров
        $params = array (':department_id' => $departmentId);
        
        //выполняем запрос и возвращаем результат
        return DatabaseHandler::GetRow($sql,$params);
    }
    
    //Возвращает список категорий, относящихся к выбранному отделу
public static function GetCategoriesInDepartment($departmentId)
    {
        // составляем SQL - запрос
        $sql = 'CALL catalog_get_categories_list(:department_id)';
        
        // создаем массив параметров
        $params = array (':department_id' => $departmentId);
        
        //выполняем запрос и возвращаем результат
        return DatabaseHandler::GetAll($sql,$params);
    }
	
public static function GetCategoryDetails($categoryId) 
	{
		// Составляем SQL запрос
		$sql = 'CALL catalog_get_category_details(:category_id)';
		
		// создаем массив параметров
        $params = array (':category_id' => $categoryId);
		//выполняем запрос и возвращаем результат
        return DatabaseHandler::GetRow($sql,$params);
		
	}
	
	/* вычисляет сколько понадобится страниц для отображения всех товаров, кол-во товаров возвращаемых в запрос $countSql*/
private static function HowManyPages($countSql, $countSqlParams)
	{
	// Создаем хэш для SQL запроса
    $queryHashCode = md5($countSql . var_export($countSqlParams, true));
    // проверяем есть ли результат выполнения запроса в кэше
    if (isset ($_SESSION['last_count_hash']) &&
    isset ($_SESSION['how_many_pages']) &&
    $_SESSION['last_count_hash'] === $queryHashCode)
    {
      //Извлекаем кешированное значение
      $how_many_pages = $_SESSION['how_many_pages'];
    }
    else 
    {
        //выполняем запрос
        $items_count = DatabaseHandler::GetOne($countSql, $countSqlParams);
        
        //Вычисляем количество страниц
        $how_many_pages = ceil($items_count / PRODUCTS_PER_PAGE);
        
        //Сохраняем данные в сеансовых переменных
        $_SESSION['last_count_hasg'] = $queryHashCode;
        $_SESSION['how_many_pages'] = $how_many_pages;
    }
    //возвращаем количество страниц 
    return $how_many_pages;
    }
    
    //Возвращает список товаров относящихся к данной категории
public static function GetProductsInCategory($categoryId, $pageNo, &$rHowManyPages)
    {
    // Запрос возращающий количество товаров в категории
    $sql = "CALL catalog_count_products_in_category(:category_id)";
    //создаем массив параметром
    $params = array (':category_id' => $categoryId);
    
    // Определяем сколько страниц понадобится для отображения товаров
    $rHowManyPages = Catalog::HowManyPages($sql,$params);
	
    //Определяем какой товар будет первым
    $start_item = ($pageNo - 1) * PRODUCTS_PER_PAGE;
	
    //Получаем список товаров
    $sql = "CALL catalog_get_products_in_category(
            :category_id, :short_product_description_length,
            :products_per_page, :start_item)";
    
    
    // Создаем массив параметров
    $params = array (
	':category_id' => $categoryId,
	':short_product_description_length' => SHORT_PRODUCT_DESCRIPTION_LENGTH,
	':products_per_page' => PRODUCTS_PER_PAGE,
	':start_item' => $start_item);
	
	//Выполняем запрос и возвращаем результат 
    return DatabaseHandler::GetAll($sql, $params);
    }
    
    //Возвращает список товаров для страницы отдела
public static function GetProductsOnDepartment($departmentId, $pageNo, &$rHowManyPages) 
    {
    // Запрос, возвращающий количество товаров для страниц отдела
    $sql = 'CALL catalog_count_products_on_department(:department_id)';
    // Создаем массив параметров
    $params = array (':department_id' => $departmentId);
    
    // Определяем, сколько страниц понадобиться для отображения товаров
    $rHowManyPages = Catalog::HowManyPages($sql, $params);
    // Определяем, какой  товар будет первым
    $start_item = ($pageNo - 1) * PRODUCTS_PER_PAGE;
    
    // Получаем список товаров
    $sql = 'CALL catalog_get_products_on_department(
            :department_id, :short_product_description_length,
            :products_per_page, :start_item)';
    
    //Создаем массив параметров
     $params = array (
	':department_id' => $departmentId,
	':short_product_description_length' => SHORT_PRODUCT_DESCRIPTION_LENGTH,
	':products_per_page' => PRODUCTS_PER_PAGE,
	':start_item' => $start_item);
    
    //Выполняем запрос и возвращаем результат 
    return DatabaseHandler::GetAll($sql, $params);
    }
    
    // Возвращает список товаров для главной страницы каталога
public static function GetProductsOnCatalog($pageNo, &$rHowManyPages)
    {
     // Запрос, возвращающий количество товаров для главной страницы каталога
     $sql = "CALL catalog_count_products_on_catalog()";
     
     // Определяем сколько страниц понадобится для отображения товаров
     $rHowManyPages = Catalog::HowManyPages($sql, null);
     
     // Определяем какой товар будет первым
     $start_item = ($pageNo - 1) * PRODUCTS_PER_PAGE;
     
     // Получаем список товаров
     $sql = "CALL catalog_get_products_on_catalog(
            :short_product_description_length,
            :products_per_page, :start_item)";
        
        //Создаем массив параметров
     $params = array (
	':short_product_description_length' => SHORT_PRODUCT_DESCRIPTION_LENGTH,
	':products_per_page' => PRODUCTS_PER_PAGE,
	':start_item' => $start_item);
        
     //Выполняем запрос и возвращаем результат 
    return DatabaseHandler::GetAll($sql, $params);
    }
    
public static function GetProductDetails($productId)
    {
    //Составляем SQL- запрос
    $sql="CALL catalog_get_product_details(:product_id)";
    
    //Создаем массив параметров
    $params = array (
    ':product_id' => $productId);
    
    // Выполняем запрос и возвращаем результат
    return DatabaseHandler::GetRow($sql, $params);
    }
    
public static function GetProductLocations($productId)
    {
    //Составляем SQL- запрос
    $sql = 'CALL catalog_get_product_locations(:product_id)';
    //Создаем массив параметров
    $params = array (
    ':product_id' => $productId);
    // Выполняем запрос и возвращаем результат
    return DatabaseHandler::GetAll($sql, $params);  
    }
    
// извлекаем аттрибуты товаров
public static function GetProductAttributes($productId)
{
    //Составляем SQL-запрос
    $sql = "CALL catalog_get_product_attributes(:product_id)";
    //создаем массива параметров
    $params = array (
    ':product_id' => $productId);
    // Выполняем запрос и возвращаем результат
    return DatabaseHandler::GetAll($sql, $params);  
    }
// получаем название отдела
public static function GetDepartmentName($departmentId)
    {
    $sql = 'CALL catalog_get_department_name(:department_id)';
    //Создаем массив параметров
    $params = array (
    ':department_id' => $departmentId);
    // Выполняем запрос и возвращаем результат
    return DatabaseHandler::GetOne($sql, $params);  
    }
// получаем название категории   
public static function GetCategoryName($categoryId)
    {
    $sql = 'CALL catalog_get_category_name(:category_id)';
    //Создаем массив параметров
    $params = array (
    ':category_id' => $categoryId);
    // Выполняем запрос и возвращаем результат
    return DatabaseHandler::GetOne($sql, $params);  
    }
// получаем название товара   
public static function GetProductName($productId)
    {
    $sql = 'CALL catalog_get_product_name(:product_id)';
    //Создаем массив параметров
    $params = array (
    ':product_id' => $productId);
    // Выполняем запрос и возвращаем результат
    return DatabaseHandler::GetOne($sql, $params);  
    }
    
}  

?>