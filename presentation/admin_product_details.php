<?php
//Класс, отвечающий за администрирование сведений о товарах
class AdminProductDetails
{
    //Public элементы
    public $mProduct;
    public $mErrorMessage;
    public $mProductCategoriesString;
    public $mProductDisplayOptions;
    public $mProductAttributes;
    public $mCatalogAttributes;
    public $mAssignOrMoveTo;
    public $mRemoveFromCategories;
    public $mRemoveFromCategoryButtonDisabled = false;
    public $mLinkToCategoryProductsAdmin;
    public $mLinkToProductDetailsAdmin;
    
    //private элементы
    private $_mProductId;
    private $_mCategoryId;
    private $_mDepartmentId;
    
    //Конструктор
    public function __construct() 
    {
    //В строке запроса должен присутствовать DepartmentId
    if (!isset ($_GET['DepartmentId']))
        trigger_error ('Отдел не выбран');
    else
        $this->_mDepartmentId = (int)$_GET['DepartmentId'];
    
    //В строке запроса должен присутствовать CategoryId
    if (!isset ($_GET['CategoryId']))
        trigger_error ('Категория товара не выбран');
    else
        $this->_mCategoryId = (int)$_GET['CategoryId'];
    
    //В строке должен присутствовать ProductId
    if (!isset ($_GET['ProductId']))
        trigger_error ('Товар не выбран');
    else
        $this->_mProductId = (int)$_GET['ProductId'];
    
    $this->mProductDisplayOptions = Catalog::$mProductDisplayOptions;
    $this->mLinkToCategoryProductsAdmin = 
    Link::ToCategoryProductsAdmin($this->_mDepartmentId,
                                  $this->_mCategoryId);
    
    $this->mLinkToProductDetailsAdmin = 
    Link::ToProductAdmin($this->_mDepartmentId, 
                         $this->_mCategoryId,
                         $this->_mProductId);
    }
    
    public function init()
    {
        //При загрузке изображения товара...
        if (isset($_POST['Upload']))
        {
         //Проверяем есть ли доступ на запись в папку images/product_images
         if (!is_writable(SITE_ROOT . '/images/product_images/'))
         {
             echo 'Невозможно записать в папку с изображениями';
             exit();
         }
        //загружаем 1 изображение 
        //Если код ошибки - 0, файл успешно загружен
         if ($_FILES['ImageUpload']['error'] == 0)
         {
         //Используем функцию PHP move_upload_file для перемещения загруженного 
         //файла из временной папки в папку images/product_images
         move_uploaded_file($_FILES['ImageUpload']['tmp_name'], 
                 SITE_ROOT . '/images/product_images/' . 
                 $_FILES['ImageUpload']['name']);
         //обновляем информацию о товаре в базе данных
         Catalog::SetImage($this->_mProductId, 
                           $_FILES['ImageUpload']['name']);
         }
         
        //загружаем 2 изображение 
        //Если код ошибки - 0, файл успешно загружен
         if ($_FILES['Image2Upload']['error'] == 0)
         {
          move_uploaded_file($_FILES['Image2Upload']['tmp_name'], 
                 SITE_ROOT . '/images/product_images/' . 
                 $_FILES['Image2Upload']['name']);
         //обновляем информацию о товаре в базе данных
         Catalog::SetImage2($this->_mProductId, 
                           $_FILES['Image2Upload']['name']);   
         }
         
         //загружаем миниатюру
         //Если код ошибки - 0, файл успешно загружен
         if ($_FILES['ThumbnailUpload']['error'] == 0)
         {
          move_uploaded_file($_FILES['ThumbnailUpload']['tmp_name'], 
                 SITE_ROOT . '/images/product_images/' . 
                 $_FILES['ThumbnailUpload']['name']);
         //обновляем информацию о товаре в базе данных
         Catalog::SetThumbnail($this->_mProductId, 
                           $_FILES['ThumbnailUpload']['name']);   
         }
        }
        
        // При обновлении информации о товаре...
        if (isset ($_POST['UpdateProductInfo']))
        {
          $product_name = $_POST['name'];
          $product_description = $_POST['description'];
          $product_price = $_POST['price'];
          $product_discounted_price = $_POST['discounted_price'];
          
          if ($product_name == NULL)
              $this->mErrorMessage = 'Имя товара не установлено!';
          
          if ($product_description == NULL)
              $this->mErrorMessage = 'Описание не заполнено!';
          
          if ($product_price == NULL || !is_numeric($product_price))
              $this->mErrorMessage = 'Цена товара должна быть в виде числа!';
          
          if ($product_discounted_price == NULL || 
                  !is_numeric($product_discounted_price))
              $this->mErrorMessage = 'Цена товара со скидкой 
                  должна быть в виде числа!';
          
          if ($this->mErrorMessage == NULL)
              Catalog::UpdateProduct($this->_mProductId, $product_name, 
              $product_description, $product_price, $product_discounted_price);
        }
        
        //При удалении товара из категории...
        if (isset($_POST['RemoveFromCategory']))
        {
        $target_category_id = $_POST['TargetCategoryIdRemove'];
        $still_exists = Catalog::RemoveProductFromCategory(
                        $this->_mProductId, $target_category_id);

        if ($still_exists == 0)
       {
        header('Location: ' .
               htmlspecialchars_decode(
                 $this->mLinkToCategoryProductsAdmin));

        exit();
       }
        }
        
        // При установке параметров отображения товара
        if (isset ($_POST['SetProductDisplayOption']))
        {
        $product_display = $_POST['ProductDisplay'];
        Catalog::SetProductDisplayOption($this->_mProductId, $product_display);
        }
    
        // При удалениии товара из каталога
        if (isset ($_POST['RemoveFromCatalog']))
        {
        Catalog::DeleteProduct($this->_mProductId);

        header('Location: ' .
             htmlspecialchars_decode(
               $this->mLinkToCategoryProductsAdmin));

        exit();
        }

        //При зачислении товара в другую категори ...
        if (isset ($_POST['Assign']))
        {
            $target_category_id = $_POST['TargetCategoryIdAssign'];
            Catalog::AssignProductToCategory($this->_mProductId,
                                             $target_category_id);
        }
        
        //При переносе товара в другую категорию
        if (isset($_POST['Move']))
        {
            $target_category_id = $_POST['TargetCategoryIdMove'];
            Catalog::MoveProductToCategory($this->_mProductId,
            $this->_mCategoryId, $target_category_id);
            
            header('Location: ' . 
            htmlspecialchars_decode( 
            Link::ToProductAdmin($this->_mDepartmentId, 
                         $target_category_id,
                         $this->_mProductId)));
         exit();            
        }
        
        // При присвоении товару значения атрибута...
        if (isset($_POST['AssignAttributeValue']))
        {
            $targer_attribute_value_id = $_POST['TargetAttributeValueIdAssign'];
            Catalog::AssignAttributeValueToProduct($this->_mProductId, 
                                                   $targer_attribute_value_id);
        }
        
        // При удалении значения атрибута из товара
        
        if (isset($_POST['RemoveAttributeValue']))
        {
            $targer_attribute_value_id = $_POST['TargetAttributeValueIdRemove'];
            Catalog::RemoveProductAttributeValue($this->_mProductId, 
                                                 $targer_attribute_value_id);
        }
        
        //Получаем информацию о товаре
        $this->mProduct = Catalog::GetProductInfo($this->_mProductId);
        $product_categories = Catalog::GetCategoriesForProduct(
                $this->_mProductId);
        
        $product_attributes = 
            Catalog::GetProductAttributes($this->_mProductId);
        
        for ($i = 0; $i < count($product_attributes); $i++)
            $this->mProductAttributes[
                $product_attributes[$i]['attribute_value_id']] =
                $product_attributes[$i]['attribute_name'] . ': ' . 
                $product_attributes[$i]['attribute_value'];
        
        $catalog_attributes = 
        Catalog::GetAttributesNotAssignedToProduct($this->_mProductId);
        
        
        for ($i = 0; $i < count($catalog_attributes); $i++)
            $this->mProductAttributes[
                $catalog_attributes[$i]['attribute_value_id']] =
                $catalog_attributes[$i]['attribute_name'] . ': ' . 
                $catalog_attributes[$i]['attribute_value'];
        
        if (count($product_categories) == 1)
            $this->mRemoveFromCategoryButtonDisabled  = true;
        
        //Отображаем категории к которым принадлежит товар
        for ($i = 0; $i < count($product_categories); $i++)
            $temp1[$product_categories[$i]['category_id']] = 
             $product_categories[$i]['name'];
        $this->mRemoveFromCategories = $temp1;
        $this->mProductCategoriesString = implode(', ', $temp1);
        $all_categories = Catalog::GetCategories();
        
        for ($i = 0; $i < count($all_categories); $i++)
            $temp2[$all_categories[$i]['category_id']] =
             $all_categories[$i]['name'];
        
        $this->mAssignOrMoveTo = array_diff($temp2, $temp1);
    }
}
?>
