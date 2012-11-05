<?php
// ���������� ����������� �������� �� ������
class Department
{
  // ������ ���������� ��������� ��� �������� Smarty
  public $mName;
  public $mDescription;

  // Private ��������
  private $_mDepartmentId;
  private $_mCategoryId;

  // ����������� ������
  public function __construct()
  {
    // � ������ ������� ������ �������������� �������� DepartmentId
    if (isset ($_GET['DepartmentId']))
      $this->_mDepartmentId = (int)$_GET['DepartmentId'];
    else
      trigger_error('DepartmentId not set');

    /* ���� CategoryId ���� � �������, �� �� ��� ��������� 
       (���������� � int ��� ������ �� ������������ ��������) */
    if (isset ($_GET['CategoryId']))
      $this->_mCategoryId = (int)$_GET['CategoryId'];
  }

  public function init()
  {
    // ���� �������� �����
    $department_details =
      Catalog::GetDepartmentDetails($this->_mDepartmentId);

    $this->mName = $department_details['name'];
    $this->mDescription = $department_details['description'];

    // ���� �������� ���������
    if (isset ($this->_mCategoryId))
    {
      $category_details =
        Catalog::GetCategoryDetails($this->_mCategoryId);

      $this->mName = $this->mName . ' &raquo; ' .
                     $category_details['name'];
      $this->mDescription = $category_details['description'];
    }
    

  }
}
?>
