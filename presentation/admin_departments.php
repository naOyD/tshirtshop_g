<?php 
// Класс обеспечивающий функциональность раздела администратора
class AdminDepartments
{
    //Public-переменные ...
    public $mDepartmentsCount;
    public $mDepartments;
    public $mErrorMessage;
    public $mEditItem;
    public $mLinkToDepartmentsAdmin;
    
    //Private-переменные ...
    private $_mAction;
    private $_mActionedDepartmentId;
    
    //Constuct of the class
    public function __construct()
    {
        //Просматриваем список переданных переменных
        foreach ($_POST as $key => $value)
        if (substr($key, 0, 6) == 'submit')
        {
            $last_underscope = strrpos($key, '_');
            $this->_mAction = substr($key, strlen('submit_'), $last_underscope - strlen('submit_'));
            $this->_mActionedDepartmentId = substr($key, $last_underscope + 1);
            
            break;
        }
        $this->mLinkToDepartmentsAdmin = Link::ToDepartmentsAdmin();
    }
    
    public function init()
    {
        //При добавлении нового отдела
        if ($this->_mAction == 'add_dept')
        {
            $department_name = $_POST['department_name'];
            $department_description = $_POST['department_description'];
            
            if($department_name == null)
                $this->mErrorMessage = 'Department name required';
            
            if ($this->mErrorMessage == null)
            {
               Catalog::AddDepartment($department_name, $department_description);
               
               header('Location: ' . $this->mLinkToDepartmentsAdmin);
            }
        }
        
        //При редактировании существующего отдела
        if ($this->_mAction == 'edit_dept')
            $this->mEditItem = $this->_mActionedDepartmentId;
            
        //При обновлении отдела
        if ($this->_mAction == 'update_dept')
        {
            $department_name = $_POST['name'];
            $department_description = $_POST['description'];
            
            if($department_name == null)
                $this->mErrorMessage = 'Department name required';
            
            if ($this->mErrorMessage == null)
            {
               Catalog::UpdateDepartment($this->_mActionedDepartmentId, $department_name, $department_description);
               
               header('Location: ' . $this->mLinkToDepartmentsAdmin);
            }    
        }
        
      
        //При удалении отдела
        if ($this->_mAction == 'delete_dept')
        {
            $status = Catalog::DeleteDepartment($this->_mActionedDepartmentId);
            
            if ($status < 0)
                $this->mErrorMessage = 'Department not empty';
            else
               header('Location: ' . $this->mLinkToDepartmentsAdmin);
        }
        
        //При редактировании категории отдела
        if ($this->_mAction == 'edit_cat')
        {
            header('Location: ' . 
                    htmlspecialchars_decode(
                     Link::ToDepartmentCategoriesAdmin(
                      $this->_mActionedDepartmentId)));
            exit();
        }
        //Загружаем список отделов
        $this->mDepartments = Catalog::GetDepartmentsWithDescriptions();
        $this->mDepartmentsCount = count ($this->mDepartments);
    }
}
?>