<?php
// Класс, кратко отображающий содержимое корзины
Class CartSummary
{
    // Public - переменные, доступные в шаблоне
    public $mTotalAmount;
    public $mItems;
    public $mLinkToCartDetails;
    public $mEmptyCart;
    
    // Конструктор класса
    public function __construct() 
    {
    //Вычисляем общую стоимость товаров в корзине, без налога, цены поставки
    $this->mTotalAmount = ShoppingCart::GetTotalAmount();
    // Получаем список товаров в корзине
    $this->mItems = ShoppingCart::GetCartProducts(GET_CART_PRODUCTS);
    if (empty($this->mItems))
        $this->mEmptyCart = true;
    else 
        $this->mEmptyCart = false;
    $this->mLinkToCartDetails = Link::ToCart();
    }
}
?>
