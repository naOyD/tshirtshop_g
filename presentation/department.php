<?php
// Занимается извлечением сведений об отделе
class Department
{
  // Паблик переменные доступные для шаблонов Smarty
  public $mName;
  public $mDescription;
  public $mEditActionTarget;
  public $mEditAction;
  public $mEditButtonCaption;
  public $mShowEditButton;
  
  // Private элементы
  private $_mDepartmentId;
  private $_mCategoryId;

  // Конструктор класса
  public function __construct()
  {
    // в строке запроса должен присутствовать параметр DepartmentId
    if (isset ($_GET['DepartmentId']))
      $this->_mDepartmentId = (int)$_GET['DepartmentId'];
    else
      trigger_error('DepartmentId not set');

    /* Если CategoryId есть в запросЕ, то мы его сохраняем 
       (преобразую в int для защиты от неккоректных значений) */
    if (isset ($_GET['CategoryId']))
      $this->_mCategoryId = (int)$_GET['CategoryId'];
    
    //Отображаем кнопку редактирования,если посетитель - админ
    if (!(isset($_SESSION['admin_logged'])) || 
            $_SESSION['admin_logged'] != TRUE)
        $this->mShowEditButton = FALSE;
    else 
        $this->mShowEditButton = TRUE;
   
  }

  public function init()
  {
    // Если посещаем отдел
    $department_details =
      Catalog::GetDepartmentDetails($this->_mDepartmentId);

    $this->mName = $department_details['name'];
    $this->mDescription = $department_details['description'];

    // Если посещаем категорию
    if (isset ($this->_mCategoryId))
    {
      $category_details =
        Catalog::GetCategoryDetails($this->_mCategoryId);

      $this->mName = $this->mName . ' &raquo; ' .
                     $category_details['name'];
      $this->mDescription = $category_details['description'];
      
      $this->mEditActionTarget = 
      Link::ToDepartmentCategoriesAdmin($this->_mDepartmentId);
      $this->mEditAction = 'edit_cat_' . $this->_mCategoryId;
      $this->mEditButtonCaption = 'Радактировать категорию';
    }
    else 
    {
        $this->mEditActionTarget = Link::ToDepartmentsAdmin();
        $this->mEditAction = 'edit_dept' . $this->_mDepartmentId;
        $this->mEditButtonCaption = 'Редактировать отдел';
    }
  }
}
?>
