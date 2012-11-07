<?php
class ProductsList
{
    // Public ���������� ��������� �� ������� Smarty
    public $mPage = 1;
    public $mrTotalPages;
    public $mLinkToNextPage;
    public $mLinkToPreviousPage;
    public $mProducts;

    // Private ����������
    private $_mDepartmentId;
    private $_mCategoryId;
    
    //����������� ������
    public function __construct()
    {
        //�������� DepartmentId �� ������ ������� � ����������� ��� � int
        if (isset ($_GET['DepartmentId']))
        $this->_mDepartmentId = (int)$_GET['DepartmentId'];
        
        //�������� CategoryId �� ������ ������� � ����������� ��� � int
        if (isset ($_GET['CategoryId']))
        $this->_mCategoryId = (int)$_GET['CategoryId'];
        
        //�������� ����� �������� �� ������ ������� � ����������� ��� � int
        if (isset ($_GET['Page']))
        $this->mPage=(int)$_GET['Page'];
        
        if ($this->mPage < 1)
        trigges_error('Incorrect Page Value');
        
        // ��������� ����� ��������, ���������� ���������
        $_SESSION['link_to_continue_shopping'] = $_SERVER['QUERY_STRING'];
    }
    
    public function init()
    {
        /*���� ������������ ������������� ���������, �������� ������ �� �������
         ������� ����� ������ ������ ���������� GetProductsInCategory()*/
         if (isset ($this->_mCategoryId))
         $this->mProducts = Catalog::GetProductsInCategory($this->_mCategoryId,
         $this->mPage, $this->mrTotalPages);
         
        /*���� ���������� ������������� �����, �������� ������ ��� �������,
        ������� ����� ������ ������ ���������� GetProductsOnDepartment()*/
        
        elseif (isset ($this->_mDepartmentId))
            $this->mProducts = Catalog::GetProductsOnDepartment(
            $this->_mDepartmentId, $this->mPage, $this->mrTotalPages);
        
        /*���� ���������� ������������� ������ ��������, �������� ������ �������,
        ������� ����� ������ ������ ���������� GetProductsOnCatalog()*/
        
        else 
        $this->mProducts = Catalog::GetProductsOnCatalog(
        $this->mPage, $this->mrTotalPages);
        
        /*���� ������ ������� ������ �� ��������� �������, ���������� �������������
        �������� ����������*/
        if ($this->mrTotalPages >1)
        {
            //������� ������ Next
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
            //������� ������ Previous
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
            //������� ������ �� �������� ������
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
        
        /*��������������� � ����� 404, ���� ����� ���������� �������� ������ ������ ����� ������� ������*/
        if ($this->mPage > $this->mrTotalPages)
        {
            //������� ����� ������
            ob_clean;
            //��������� �������� 404
            include '404.php';
            
                // ������� ������, ����������� ����������
                flush(); 
                ob_flush(); 
                ob_end_clean(); 
                exit();
        }
        
        
        //���������� ������ �� �������� �������
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