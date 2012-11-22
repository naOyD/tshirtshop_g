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
    
  // Search the catalog
  public static function Search($searchString, $allWords,
                                $pageNo, &$rHowManyPages)
  {
    //The search result will be an array of this form
    $search_result = array ('accepted_words' => array (),
                            'ignored_words' => array (),
                            'products' => array ());

    // Return void if the search string is void
    if (empty ($searchString))
      return $search_result;

    // Search string delimiters
    $delimiters = ',.; ';

    /* On the first call to strtok you supply the whole
       search string and the list of delimiters.
       It returns the first word of the string */
    $word = strtok($searchString, $delimiters);

    // Parse the string word by word until there are no more words
    while ($word)
    {
      // Short words are added to the ignored_words list from $search_result
      if (strlen($word) < FT_MIN_WORD_LEN)
        $search_result['ignored_words'][] = $word;
      else
        $search_result['accepted_words'][] = $word;

      // Get the next word of the search string
      $word = strtok($delimiters);
    }

    // If there aren't any accepted words return the $search_result
    if (count($search_result['accepted_words']) == 0)
      return $search_result;

    // Build $search_string from accepted words list
    $search_string = '';

    // If $allWords is 'on' then we append a ' +' to each word
    if (strcmp($allWords, "on") == 0)
      $search_string = implode(" +", $search_result['accepted_words']);
    else
      $search_string = implode(" ", $search_result['accepted_words']);

    // Count the number of search results
    $sql = 'CALL catalog_count_search_result(:search_string, :all_words)';
    $params = array(':search_string' => $search_string,
                    ':all_words' => $allWords);

    // Calculate the number of pages required to display the products
    $rHowManyPages = Catalog::HowManyPages($sql, $params);
    // Calculate the start item
    $start_item = ($pageNo - 1) * PRODUCTS_PER_PAGE;

    // Retrieve the list of matching products
    $sql = 'CALL catalog_search(:search_string, :all_words,
                                :short_product_description_length,
                                :products_per_page, :start_item)';

    // Build the parameters array
    $params = array (':search_string' => $search_string,
                     ':all_words' => $allWords,
                     ':short_product_description_length' =>
                       SHORT_PRODUCT_DESCRIPTION_LENGTH,
                     ':products_per_page' => PRODUCTS_PER_PAGE,
                     ':start_item' => $start_item);

    // Execute the query
    $search_result['products'] = DatabaseHandler::GetAll($sql, $params);

    // Return the results
    return $search_result;
  }
  
  //Извлекает из БД, названия и описания отделов
  public static function GetDepartmentsWithDescriptions()
  {
    //Составляем SQL - query
    $sql = 'CALL catalog_get_departments()';
    
    //Execute the query
    return DatabaseHandler::GetAll($sql);
  }
  
  //Добавляем отдел
  public static function AddDepartment($departmentName, $departmentDescription)
  {
    $sql = 'CALL catalog_add_department(:department_name, 
                                        :department_description)';
                                        
    $params = array (':department_name' => $departmentName,
                     ':department_description' => $departmentDescription);
                     
    DatabaseHandler::Execute($sql, $params);
  }
  
  //Обновляем сведения об отделе
  public static function UpdateDepartment($departmentId, $departmentName, $departmentDescription)
  {
    $sql = 'CALL catalog_update_department(:department_id, 
                                           :department_name, 
                                           :department_description)';
    $params = array (':department_id' => $departmentId,
                     ':department_name' => $departmentName,
                     ':department_description' => $departmentDescription); 
                       
    DatabaseHandler::Execute($sql, $params); 
  }
  
  public static function DeleteDepartment($departmentId)
  {
    $sql = 'CALL catalog_delete_department(:department_id)';
    $params = array (':department_id' => $departmentId);
    return DatabaseHandler::Execute($sql, $params); 
  }
  
    // Gets categories in a department
  public static function GetDepartmentCategories($departmentId)
  {
    // Build the SQL query
    $sql = 'CALL catalog_get_department_categories(:department_id)';

    // Build the parameters array
    $params = array (':department_id' => $departmentId);

    // Execute the query and return the results
    return DatabaseHandler::GetAll($sql, $params);
  }

  // Adds a category
  public static function AddCategory($departmentId, $categoryName,
                                     $categoryDescription)
  {
    // Build the SQL query
    $sql = 'CALL catalog_add_category(:department_id, :category_name,
                                      :category_description)';

    // Build the parameters array
    $params = array (':department_id' => $departmentId,
                     ':category_name' => $categoryName,
                     ':category_description' => $categoryDescription);

    // Execute the query
    DatabaseHandler::Execute($sql, $params);
  }

  // Updates a category
  public static function UpdateCategory($categoryId, $categoryName,
                                        $categoryDescription)
  {
    // Build the SQL query
    $sql = 'CALL catalog_update_category(:category_id, :category_name,
                                         :category_description)';

    // Build the parameters array
    $params = array (':category_id' => $categoryId,
                     ':category_name' => $categoryName,
                     ':category_description' => $categoryDescription);

    // Execute the query
    DatabaseHandler::Execute($sql, $params);
  }

  // Deletes a category
  public static function DeleteCategory($categoryId)
  {
    // Build the SQL query
    $sql = 'CALL catalog_delete_category(:category_id)';

    // Build the parameters array
    $params = array (':category_id' => $categoryId);

    // Execute the query and return the results
    return DatabaseHandler::GetOne($sql, $params);
  }
  
    // Retrieves all attributes
  public static function GetAttributes()
  {
    // Build the SQL query
    $sql = 'CALL catalog_get_attributes()';

    // Execute the query and return the results
    return DatabaseHandler::GetAll($sql);
  }

  // Add an attribute
  public static function AddAttribute($attributeName)
  {
    // Build the SQL query
    $sql = 'CALL catalog_add_attribute(:attribute_name)';

    // Build the parameters array
    $params = array (':attribute_name' => $attributeName);

    // Execute the query
    DatabaseHandler::Execute($sql, $params);
  }

  // Updates attribute name
  public static function UpdateAttribute($attributeId, $attributeName)
  {
    // Build the SQL query
    $sql = 'CALL catalog_update_attribute(:attribute_id, :attribute_name)';

    // Build the parameters array
    $params = array (':attribute_id' => $attributeId,
                     ':attribute_name' => $attributeName);

    // Execute the query
    DatabaseHandler::Execute($sql, $params);
  }

  // Deletes an attribute
  public static function DeleteAttribute($attributeId)
  {
    // Build the SQL query
    $sql = 'CALL catalog_delete_attribute(:attribute_id)';

    // Build the parameters array
    $params = array (':attribute_id' => $attributeId);

    // Execute the query and return the results
    return DatabaseHandler::GetOne($sql, $params);
  }

  // Retrieves details for the specified attribute
  public static function GetAttributeDetails($attributeId)
  {
    // Build SQL query
    $sql = 'CALL catalog_get_attribute_details(:attribute_id)';

    // Build the parameters array
    $params = array (':attribute_id' => $attributeId);

    // Execute the query and return the results
    return DatabaseHandler::GetRow($sql, $params);
  }

  // Gets atribute values
  public static function GetAttributeValues($attributeId)
  {
    // Build the SQL query
    $sql = 'CALL catalog_get_attribute_values(:attribute_id)';

    // Build the parameters array
    $params = array (':attribute_id' => $attributeId);

    // Execute the query and return the results
    return DatabaseHandler::GetAll($sql, $params);
  }

  // Adds an attribute value
  public static function AddAttributeValue($attributeId, $attributeValue)
  {
    // Build the SQL query
    $sql = 'CALL catalog_add_attribute_value(:attribute_id, :value)';

    // Build the parameters array
    $params = array (':attribute_id' => $attributeId,
                     ':value' => $attributeValue);

    // Execute the query
    DatabaseHandler::Execute($sql, $params);
  }

  // Updates an atribute value
  public static function UpdateAttributeValue(
                           $attributeValueId, $attributeValue)
  {
    // Build the SQL query
    $sql = 'CALL catalog_update_attribute_value(
                   :attribute_value_id, :value)';

    // Build the parameters array
    $params = array (':attribute_value_id' => $attributeValueId,
                     ':value' => $attributeValue);

    // Execute the query
    DatabaseHandler::Execute($sql, $params);
  }

  // Deletes an attribute value
  public static function DeleteAttributeValue($attributeValueId)
  {
    // Build the SQL query
    $sql = 'CALL catalog_delete_attribute_value(:attribute_value_id)';

    // Build the parameters array
    $params = array (':attribute_value_id' => $attributeValueId);

    // Execute the query and return the results
    return DatabaseHandler::GetOne($sql, $params);
  }

}  

?>