<?php
class StoreAdmin
{
    public $mSiteUrl;
    //Определяем файл шаблона для меню
    public $mMenuCell = 'blank.tpl';
    //Определяем фпйл шаблона для содержимого страницы
    public $mContentsCell = 'blank.tpl';
    
    //Конструктор класса
    public function __construct()
    {
        $this->mSiteUrl = Link::Build('','https');
        //Разрешаем доступ к этой странице только через HTTPS,
        //если  USE_SSL установлена в значение yes
        if (USE_SSL == 'yes' && getenv('HTTPS') != 'on')
        {
            header ('Location: https://' . getenv('SERVER_NAME') .
            getenv('REQUEST_URI'));
            
            exit();
        }
    }
    
    public function init()
    {
        //Если аутентификация не выполнялась, загружаем шаблон admin_login
        if (!(isset($_SESSION['admin_logged'])) || 
        $_SESSION['admin_logged'] != true)
        
           $this->mContentsCell = 'admin_login.tpl';
        
        else
        {
            //Если аутентификация проведена, загружаем меню страницы администрирования
            $this->mMenuCell = 'admin_menu.tpl';
            
            //При  выходе...
            if (isset ($_GET['Page']) && ($_GET['Page'] == 'Logout'))
            {
                unset($_SESSION['admin_logged']);
                header('Location: ' . Link::ToAdmin());
                exit();
            }
            
            //Если значения Page не задано явно, подразуемеваем страницу Departments
            $admin_page = isset ($_GET['Page']) ? $_GET['Page'] : 'Departments';
            
            //Выбираем, какую  страницу администрирования загружать
            if ($admin_page == 'Departments')
                $this->mContentsCell = 'admin_departments.tpl';
            elseif ($admin_page == 'Categories')
                $this->mContentsCell = 'admin_categories.tpl';
        }
    }
}
?>