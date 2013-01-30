<?php
class ShoppingCart
{
    // хранит идентификаторы корзины
    private static $_mCartId;
    
    // Private - конструкторы
    private function __construct() 
    {       
    }
    /*этот метод будет вызываться GetCartId(), чтобы убедиться, что в сеансе
    пользователя есть ид корзины, если в $_mCartId не задано значение*/
    public static function SetCartId()
    {
        //Если Id корзины не задан 
        if (self::$_mCartId == '')
        {
            // Если в сеансе есть Id корзины, получаем его оттуда
            if (isset($_SESSION['cart_id']))
            {
                self::$_mCartId = $_SESSION['cart_id'];
            }
            // Если  нет в сеансе, чекаем файл cookie , не сохр ли ид там
            elseif (isset ($_COOKIE['cart_id'])) 
            {
                self::$_mCartId = $_COOKIE['cart_id'];
                $_SESSION['cart_id'] = self::$_mCartId;
                
                //регенерируем cookie-файл, чтобы он 
                //действовал 7 дней (604800 секунд)
                setcookie('cart_id', self::$_mCartId, time() + 604800);
            }
            else
            {
                /* Генерируем id корзины и сохраняем его в элементе класса
                 $_mCartId, сеансе и cookie-файле (при последующих вызовах 
                 $_mCartId будет получать значение из сеанса) */
                self::$_mCartId = md5(uniqid(rand(), TRUE));
                
                // Сохраняем id корзины в сеансе
                $_SESSION['cart_id'] = self::$_mCartId;
                // cookie-файл будет действовать 7 дней (604800 секунд)
                setcookie('cart_id', self::$_mCartId, time() + 604800);
            }
        }
    }
    
    // Возвращает идентификатор текущей корзины покупателя
    public static function GetCartId()
    {
        // Проверяем есть ли id у корзины
        if (!isset (self::$_mCartId))
            self::SetCartId();
        
        return self::$_mCartId;
    }
    
    // Добавляет товар в корзину покупателя
    public static function AddProduct($productId, $attributes)
    {
        // Составляем SQL - запрос
        $sql = 'CALL shopping_cart_add_product(
            :cart_id, :product_id, :attributes)';
        
        // создаем массив параметров
        $params = array (':cart_id' => self::GetCartId(),
                         ':product_id' => $productId,
                         ':attributes' => $attributes);
        //Выполняем запрос
        DatabaseHandler::Execute($sql, $params);
    }
    
    // Обновляет количество товаров  в корзине покупателя
    public static function Update($itemId, $quantity)
    {
        // Составляем SQL - запрос
        $sql = 'CALL shopping_cart_update(:item_id, :quantity)';
        
        // Составляем массив параметров
        $params = array(':item_id' => $itemId,
                        ':quantity' => $quantity);
        
        // Выполняем запрос
        DatabaseHandler::Execute($sql, $params);
    }
    
    // Удаляет товар из корзины
    public static function RemoveProduct($itemId)
    {
        // Составляем SQL-запрос
        $sql = 'CALL shopping_cart_remove_product(:item_id)';
        
        // Составляем массив параметров
        $params = array(':item_id' => $itemId);
        
        // Выполняем запрос
        DatabaseHandler::Execute($sql, $params);
    }
    
    // Получает список товаров в корзине 
}
?>













