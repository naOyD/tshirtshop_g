<?php
// Класс предоставляющий бузовую функциональность доступа  к данным
class DatabaseHandler 
{
    //Переменная для хранения экземпляра класса PDO
    private static $_mHandler;
    
    //private - конструктор, не позволяющий напрямую создавать объекты класса
    private function __construct()
    {
    }
    // Возвращает проинициализированный дескриптор базы данных
    private static function GetHandler()
    {
        // Создаем соединение с базой данных, если оно ещё не создано
        
    if (!isset(self::$_mHandler))
    {
        //Выполняем код, перехватывая потенциальные исключения
        try
        {
            //Создаем новый экземпляр класса PDO
            self::$_mHandler = 
                new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD,
                        array(PDO::ATTR_PERSISTENT => DB_PERSISTENCY));
                        
            // Наставиваем PDO на генерацию исключений
            self::$_mHandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);    
        }
        catch (PDOException $e)
        {
            // Закрываем дескриптор и генерируем ошибку
            self::Close();
            trigger_error($e->GetMessage(), E_USER_ERROR);
        }
    }
    //Возвращаем дескриптор базы данных
    return self::$_mHandler;
    }
    
    
    
    // Очищаем экземпляр класса PDO
    public static function Close()
    {
        self::$_mHandler = null;
    }
    
    
    
    // Метод обёртка для PDOStatement::execute()
    
    public static function Execute($sqlQuery, $params = null)
    {
        // Пытаемся выполнить SQL-запрос на хранимую процедуру
        
        try
        {
          // Получаем дескриптор базы данных  
          $database_handler = self::GetHandler();
          
          // Подготавливаем запрос к выполнения
          $statement_handler = $database_handler->prepare($sqlQuery);
          
          // Выполняем запрос
          $statement_handler->execute($params);
          
        }
           // Генерируем ошибку, если при выполнении SQL-запроса возникло исключение  
        catch(PDOException $e)
        {
         // ЗАкрываем дескриптор базы данных и генерируем ошибку
         self::Close();
         trigger_error($e->GetMessage(), E_USER_ERROR);
        }
    }
    
    
    
    
    // Метод обёртка для PDOStatement::fetchAll()
    
    public static function GetAll($sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC)
    {
        // Инициализируем возвращаемое значение в null
        $result = null;
        // Пытаемся выполнить SQL запрос или хранимую процедуру
    try
    {
        //Получаем дескриптор базы данных 
        $database_handler = self::GetHandler();
        
        // Подготавливаем запрос к выполнению 
        $statement_handler = $database_handler->prepare($sqlQuery);
        
        // Выполняем запрос
        $statement_handler->execute($params);
        
        // Получаем результат
        $result = $statement_handler->fetchAll($fetchStyle);       
    }
    // Генерируем ошибку, если при выполнении SQL-запроса возникло исключение
    catch(PDOException $e)
    {
        // ЗАкрываем дескриптор базы данных и генерируем ошибку
         self::Close();
         trigger_error($e->GetMessage(), E_USER_ERROR);
    }
    // Возвращаем результат запроса 
    return $result;
    }
    
    // Метод обёртка для  PDOStatement::fetch()
    
    public static function GetRow($sqlQuery, $params = null, $fetchStyle = PDO::FETCH_ASSOC)
    {
        // Ининциализируем возвращаемое значение
        $result = null;
        // Пытаемся выполнить SQL запрос или хранимую процедуру  
        try
        {
            //Получаем дескриптор базы данных
            $database_handler = self::GetHandler();
            
            // Готовим запрос к выполнению 
            $statement_handler = $database_handler->prepare($sqlQuery);  
                  
            // Выполняем запрос
            $statement_handler->execute($params);  
            
            // Получаем результат
            $result = $statement_handler->fetch($fetchStyle);  
        }  
        // Генерируем ошибку , если при выполнении SQL-запроса возникло исключение
        catch(PDOException $e)
        {
        // ЗАкрываем дескриптор базы данных и генерируем ошибку
         self::Close();
         trigger_error($e->GetMessage(), E_USER_ERROR);
         
        }
    // Возвращаем результат запроса 
    return $result;
    }
    
    public static function GetOne($sqlQuery, $params = null)
           {
            // Ининциализируем возвращаемое значение
        $result = null;
        // Пытаемся выполнить SQL запрос или хранимую процедуру  
        try
        {
            //Получаем дескриптор базы данных
            $database_handler = self::GetHandler();
            
            // Готовим запрос к выполнению 
            $statement_handler = $database_handler->prepare($sqlQuery);  
                  
            // Выполняем запрос
            $statement_handler->execute($params);  
            
            // Получаем результат
            $result = $statement_handler->fetch(PDO::FETCH_NUM);  
            /*Сохраняем первое значение из множества (Первый столбец первой строки в переменной $result)*/
            $result=$result[0];
        } 
        // Генерируем ошибку , если при выполнении SQL-запроса возникло исключение
        catch(PDOException $e)
        {
        // ЗАкрываем дескриптор базы данных и генерируем ошибку
         self::Close();
         trigger_error($e->GetMessage(), E_USER_ERROR);
        }
        // Возвращаем результат запроса 
        return $result;
        } 
}
?>