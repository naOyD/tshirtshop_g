<?php
class ProductsList
{
    // Public переменные доступные из шаблона Smarty
    public $mPage = 1;
    public $mrTotalPages;
    public $mLinkToNextPage;
    public $mLinkToPreviousPage;
    public $mProducts;

    // Private переменные
    private $_mDepartmentId;
    private $_mCategoryId;
    
    // онструктор класса
    public function __construct()
    {
        //ѕолучаем DepartmentId из строки запроса и преобразуем его в int
        if (isset ($_GET['DepartmentId']))
        $this->_mDepartmentId = (int)$_GET['DepartmentId'];
        
        //ѕолучаем CategoryId из строки запроса и преобразуем его в int
        if (isset ($_GET['CategoryId']))
        $this->_mCategoryId = (int)$_GET['CategoryId'];
        
        //ѕолучаем номер страницы из строки запроса и преобразуем его в int
        if (isset ($_GET['Page']))
        $this->mPage=(int)$_GET['Page'];
        
        if ($this->mPage < 1)
        trigges_error('Incorrect Page Value');
        
        // —охран€ем адрес страницы, посещенной последней
        $_SESSION['link_to_continue_shopping'] = $_SERVER['QUERY_STRING'];
    }
    
    public function init()
    {
        /*≈сли пользователь просматривает категорию, получаем список ее товаров
         вызыва€ метод уровн€ логики приложени€ GetProductsInCategory()*/
         if (isset ($this->_mCategoryId))
         $this->mProducts = Catalog::GetProductsInCategory($this->_mCategoryId,
         $this->mPage, $this->mrTotalPages);
         
        /*≈сли посетитель просматривает отдел, получаем список его товаров,
        вызыва€ метод уровн€ логики приложени€ GetProductsOnDepartment()*/
        
        elseif (isset ($this->_mDepartmentId))
            $this->mProducts = Catalog::GetProductsOnDepartment(
            $this->_mDepartmentId, $this->mPage, $this->mrTotalPages);
        
        /*≈сли посетитель просматривает первую страницу, получаем список товаров,
        вызыва€ метод уровн€ логики приложени€ GetProductsOnCatalog()*/
        
        else 
        $this->mProducts = Catalog::GetProductsOnCatalog(
        $this->mPage, $this->mrTotalPages);
        
        /*≈сли список товаров разбит на несколько страниц, отображаем навигационные
        элементы управлени€*/
        if ($this->mrTotalPages >1)
        {
            //—оздаем ссылку Next
            if($this->mPage < $this->mrTotalPages)
            {
                if (isset($this->_mCategoryId))
                    $this->mLinkToNextPage =
                    Link::ToCategory($this->_mDepartmentId, $this->_mCategoryId, $this->mPage + 1);
                elseif (isset($this->_mDepartmentId))
                    $this->mLinkToNextPage=
                    Link::ToDepartment($this->_mDepartmentId, $this->mPage+1);
                
                else
                    $this->mLinkToNextPage = Link::ToIndex($this->mPage + 1);
             }
            //—оздаем ссылку Previous
            if($this->mPage > 1)
            {
                if (isset($this->_mCategoryId))
                    $this->mLinkToPreviousPage=
                    Link::ToCategory($this->_mDepartmentId, $this->_mCategoryId, $this->mPage - 1);
                elseif (isset($this->_mDepartmentId))
                    $this->mLinkToPreviousPage = 
                    Link::ToDepartment($this->_mDepartmentId, $this->mPage - 1);   
                
                else 
                    $this->mLinkToPreviousPage = Link::ToIndex($this->mPage - 1);
                 
            }
            //—оздаем ссылки на страницы списка
            for($i = 1; $i<= $this->mrTotalPages; $i++)
            if (isset($this->_mCategoryId))
                $this->mProductListPages[] = 
                    Link::ToCategory($this->_mDepartmentId,$this->_mCategoryId,$i);
            elseif (isset($this->_mDepartmentId))
                $this->mProductListPages[] =
                    Link::ToDepartment($this->_mDepartmentId,$i);
            else   
                $this->mProductListPages[] = Link::ToIndex($i);
        }
        
        /*ѕеренаправление с кодом 404, если номер запрошеной страницы больше общего числа страниц списка*/
        if ($this->mPage > $this->mrTotalPages)
        {
            //ќчищаем буфер вывода
            ob_clean;
            //«агружаем страницу 404
            include '404.php';
            
                // ќчистка буфера, прекращение выполнени€
                flush(); 
                ob_flush(); 
                ob_end_clean(); 
                exit();
        }
        
        
        //√енерируем ссылки на страницы товаров
        for ($i=0; $i< count($this->mProducts); $i++)
        {
            $this->mProducts[$i]['link_to_product'] = 
                Link::ToProduct($this->mProducts[$i]['product_id']);
                
                if ($this->mProducts[$i]['thumbnail'])
                $this->mProducts[$i]['thumbnail'] = 
                Link::Build('images/product_images/' . 
                $this->mProducts[$i]['thumbnail']);
                
                $this->mProducts[$i]['attributes'] = 
                Catalog::GetProductAttributes($this->mProducts[$i]['product_id']);
        }
    }
        
}
?>