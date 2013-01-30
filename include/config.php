<?php
// SITE_ROOT -полный путь к папке tshirtshop
define('SITE_ROOT', dirname(dirname(__FILE__)));
// Папки приложения
define('PRESENTATION_DIR', SITE_ROOT . '/presentation/');
define('BUSINESS_DIR', SITE_ROOT . '/business/');

// Настройки необходимые для конфигурирования шаблонизатора Smarty

define('SMARTY_DIR', SITE_ROOT . '/libs/smarty/');
define('TEMPLATE_DIR', PRESENTATION_DIR . 'templates');
define('COMPILE_DIR', PRESENTATION_DIR . 'templates_c');
define('CONFIG_DIR', SITE_ROOT . '/include/configs');
 
// Эти значениея должны быть равны true на этапе разработки
define('IS_WARNING_FATAL', true);
define('DEBUGGING', true);

// Типы ошибок о которых должны составляться сообщения об ошибке
define('ERROR_TYPES', E_ALL);

// Настройки отправки  сообщений администраторам по электронной почте
define('SEND_ERROR_MAIL', false);
define('ADMIN_ERROR_MAIL', 'Administrator@example.com');
define('SENDMAIL_FROM', "Errors@example.com");
ini_set('sendmail_from', SENDMAIL_FROM);

// По умолчанию мы не записываем сообщения в журнал
define('LOG_ERRORS', false);
define('LOG_ERRORS_FILE', 'c:\\tshirtshop\errors_log.txt');

/*Общее сообщение об ошибке, которое должно отображаться вместо подробной 
информации (если DEBUGGING равно false)*/
define('SITE_GENERIC_ERROR_MESSAGE', '<h1>TShirtShop Error!</h1>');

// Параметры соединения с базой данных
define('DB_PERSISTENCY', 'true');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'tshirtshopadmin');
define('DB_PASSWORD', 'tshirtshopadmin');
define('DB_DATABASE', 'tshirtshop');
define('PDO_DSN', 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE);


// Server HTTP port (can omit if the default 80 is used)
define('HTTP_SERVER_PORT', '80');
/* Name of the virtual directory the site runs in, for example:
   '/tshirtshop/' if the site runs at http://www.example.com/tshirtshop/
   '/' if the site runs at http://www.example.com/ */
define('VIRTUAL_LOCATION', '/myWork/tshirtshop_g/');
define('SHORT_PRODUCT_DESCRIPTION_LENGTH', 150);
define('PRODUCTS_PER_PAGE',4);


//Если эта константа не установлена в no, доступ к страницам 
//Администрирования возможен только с помощью SSL
define('USE_SSL', 'no');

//Идентификатор и пароль администратора
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'admin');

?>