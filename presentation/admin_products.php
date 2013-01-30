<?php
class AdminProducts
{
    //Public переменные
    public $mProductsCount;
    public $mProducts;
    public $mErrorMessage;
    public $mDepartmentId;
    public $mCategoryId;
    public $mCategoryName;
    public $mLinkToDepartmentCategoriesAdmin;
    public $mLinkToCategoryProductsAdmin;
    
    //Private переменные
    private $_mAction;
    private $_mActionedProductId;
    
    //Конструктор класса
    public function __construct()
    {
        if (isset ($_GET['DepartmentId']))
            $this->mDepartmentId = (int)$_GET['DepartmentId'];
        else
            trigger_error('Отдел товаров не задан');
        
        if (isset ($_GET['CategoryId']))
            $this->mCategoryId = (int)$_GET['CategoryId'];
        else
            trigger_error('Категория товара не задана');
            
        $category_details = Catalog::GetCategoryDetails($this->mCategoryId);
        $this->mCategoryName = $category_details['name'];
        foreach ($_POST as $key => $value)
            if (substr($key, 0, 6) == 'submit')
            {
                $last_underscore = strrpos($key, '_');
                $this->_mAction = substr($key, strlen('submit_'), $last_underscore - strlen('submit_'));
                $this->_mActionedProductId = (int)substr($key, $last_underscore + 1);
                break;
            }
        $this->mLinkToDepartmentCategoriesAdmin = 
            Link::ToDepartmentCategoriesAdmin($this->mDepartmentId);
        $this->mLinkToCategoryProductsAdmin = 
            Link::ToCategoryProductsAdmin($this->mDepartmentId,$this->mCategoryId);
    }
    
    public function init()
    {
        //при добавлении нового товара
        if ($this->_mAction == 'add_prod')
        {
            $product_name = $_POST['product_name'];
            $product_description = $_POST['product_description'];
            $product_price = $_POST['product_price'];
            
            if ($product_name == null)
                $this->mErrorMessage = 'Имя продукта не заполнено';
            if ($product_description == null)
                $this->mErrorMessage = 'Описание товара не заполнено';
            if ($product_price == null || !is_numeric($product_price))
                $this->mErrorMessage = 'Цена товара должна быть в виде числа!';
            if ($this->mErrorMessage == null)
            {
                Catalog::AddProductToCategory($this->mCategoryId, 
                                                $product_name, $product_description, $product_price);
                header('Location: ' . 
                        htmlspecialchars_decode(
                            $this->mLinkToCategoryProductsAdmin));
            }
        }
        
        //для просмотра сведений о товаре
        if ($this->_mAction == 'edit_prod')
        {
            header('Location: ' .
                    htmlspecialchars_decode(
                    Link::ToProductAdmin($this->mDepartmentId,
                                         $this->mCategoryId,
                                         $this->_mActionedProductId)));
                    exit();
        }
                
        $this->mProducts = Catalog::GetCategoryProducts($this->mCategoryId);
        $this->mProductsCount = count($this->mProducts);
    }
}

?>