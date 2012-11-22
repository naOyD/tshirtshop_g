<?php
//Класс обеспечивающий администрирование значений атрибутов
class AdminAttributeValues
{
    //Public variables
    public $mAttributeValuesCount;
    public $mAttributeValues;
    public $mErrorMessage;
    public $mEditItem;
    public $mAttributeId;
    public $mAttributeName;
    public $mLinkToAttributeAdmin;
    public $mLinkToAttributeValuesAdmin;
    
    //Private variables
    private $_mAction;
    private $_mActionedAttributeValueId;
  
    //Construct class
    public function __construct()
    {
        if (isset ($_GET['AttributeId']))
         $this->mAttributeId = (int)$_GET['AttributeId'];
        else 
         trigger_error('AttributeId not set');
        
        $attribute_details = Catalog::GetAttributeDetails($this->mAttributeId);
        $this->mAttributeName = $attribute_details['name'];
        foreach ($_POST as $key => $value)
        if (substr($key, 0, 6) == 'submit')
        {
            $last_underscore = strrpos($key, '_');
            $this->_mAction = substr($key, strlen('submit_'), $last_underscore - strlen('submit_'));
            $this->_mActionedAttributeValueId = (int)substr($key, $last_underscore + 1);
            
            break;
        } 
        
        $this->mLinkToAttributesAdmin = Link::ToAttributesAdmin();
        
        $this->mLinkToAttributeValuesAdmin =
            Link::ToAttributeValuesAdmin($this->mAttributeId);
    }

    public function init()
    {
      //при добавлении нового значения атрибута
        if ($this->_mAction == 'add_val')
        {
            $attribute_value = $_POST['attribute_value'];
            if ($attribute_value == null)
             $this->mErrorMessage = 'Attribute value is empty';
             
            if ($this->mErrorMessage == null)
            {
                Catalog::AddAttributeValue($this->mAttributeId,$attribute_value);
                
                header('Location: ' . 
                        htmlspecialchars_decode(
                        $this->mLinkToAttributeValuesAdmin));
            }
        }
        
       //При редактировании сушесивующего значения атрибута
       if ($this->_mAction == 'edit_val')
       {
        $this->mEditItem = $this->_mActionedAttributeValueId;
       } 
       
       //При обновлении значения атрибута......
       if ($this->_mAction == 'update_val')
       {
        $attribute_value = $_POST['value'];
        
        if($attribute_value == null)
            $this->mErrorMessage = 'Attribute value is empty';
        if ($this->mErrorMessage == null)
        {
            Catalog::UpdateAttributeValue($this->_mActionedAttributeValueId, $attribute_value);
            
            header('Location: ' . 
                        htmlspecialchars_decode(
                        $this->mLinkToAttributeValuesAdmin));   
        }
       }
       
       //При удалении значения аторибута
       if ($this->_mAction == 'delete_val')
       {
        $status = 
            Catalog::DeleteAttributeValue($this->_mActionedAttributeValueId);
            
            if($status < 0)
                $this->mErrorMessage = 'Cannot delete this attribute value. One or more products are using it!';
            else
                header('Location: ' . 
                        htmlspecialchars_decode(
                        $this->mLinkToAttributeValuesAdmin)); 
       }
       
       //Загружаем список значений атрибута
       $this->mAttributeValues = 
            Catalog::GetAttributeValues($this->mAttributeId);
       $this->mAttributeValuesCount = count($this->mAttributeValues);
    }
}
?>