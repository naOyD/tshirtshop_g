<?php
	//Класс обеспечивающий администрирование категорий
 class AdminCategories
 {
    //Public variables
    public $mCategoriesCount;
    public $mCategories;
    public $mErrorMessage;
    public $mEditItem;
    public $mDepartmentId;
    public $mDepartmentName;
    public $mLinkToDepartmentsAdmin;
    public $mLinkToDepartmentCategoriesAdmin;
    
    //Private variables
    private $_mAction;
    private $_mActionedCategoryId;
    
    //Constuct class
    public function __construct() 
    {
     if (isset ($_GET['DepartmentId']))
        $this->mDepartmentId = (int)$_GET['DepartmentId'];
     else
        trigger_error('Department not set');
        
     $department_details = Catalog::GetDepartmentDetails(
     $this->mDepartmentId);
     
     $this->mDepartmentName = $department_details['name'];
     
     foreach ($_POST as $key => $value)
     // On button click...
     if (substr($key, 0, 6) == 'submit')
     {
        $last_underscore = strrpos($key,'_');
        $this->_mAction = substr($key, strlen('submit_'), 
                                $last_underscore - strlen('submit_'));
        $this->_mActionedCategoryId = (int)substr($key, $last_underscore + 1 );
        break;
     }
 
     $this->mLinkToDepartmentsAdmin = Link::ToDepartmentsAdmin();
     $this->mLinkToDepartmentCategoriesAdmin = Link::ToDepartmentCategoriesAdmin($this->mDepartmentId);
         
    }
    
    public function init()
    {
     //When add new category
     if ($this->_mAction == 'add_cat')
     {
        $category_name = $_POST['category_name'];
        $category_description = $_POST['category_description'];
        
        if($category_name == null )
            $this->mErrorMessage = 'Category name is empty';
        if ($this->mErrorMessage == null)
        {
            Catalog::AddCategory($this->mDepartmentId, $category_name, $category_description);
        
            header('Location: ' . 
                        htmlspecialchars_decode($this->mLinkToDepartmentCategoriesAdmin));
        }
     }
     
     //When editing an existing category
     if ($this->_mAction == 'edit_cat')
     {
      $this->mEditItem = $this->_mActionedCategoryId;
     }
     
     
     // If updating a category ...
     if ($this->_mAction == 'update_cat')
     {
        $category_name = $_POST['name'];
        $category_description = $_POST['description'];
        
        if ($category_name == null)
            $this->mErrorMessage = 'Category name is empty';
        if ($this->mErrorMessage == null)
        {
            Catalog::UpdateCategory($this->_mActionedCategoryId, $category_name, $category_description);
            
            header('Location: ' . 
                htmlspecialchars_decode($this->mLinkToDepartmentCategoriesAdmin));
        }      
     }

     //When delete category
     if ($this->_mAction == 'delete_cat')
     {
     $status = Catalog::DeleteCategory($this->_mActionedCategoryId);
     
     if($status < 0)
        $this->mErrorMessage = 'Category not empty';
     else
        header('Location: ' . 
            htmlspecialchars_decode($this->mLinkToDepartmentCategoriesAdmin));       
     }
     
     //When editing product on category
     if ($this->_mAction == 'edit_prod')
     {
        header('Location: ' .
                htmlspecialchars_decode(
                Link::ToCategoryProductsAdmin($this->mDepartmentId, 
                                              $this->_mActionedCategoryId)));
        exit();
     }
     
     //Загружаем список категорий
     $this->mCategories = Catalog::GetDepartmentCategories($this->mDepartmentId);
     $this->mCategoriesCount = count($this->mCategories);
    }
 }
?>