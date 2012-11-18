<?php
//Запускаем сеанс
session_start();

//Создаем буфер вывода
ob_start();

//Включаем вспомогательные файлы
require_once 'include/config.php';
require_once BUSINESS_DIR . 'error_handler.php';

//Задаем обработчик ошибок
ErrorHandler::SetHandler();

//Загружаем шаблон приложения
require_once PRESENTATION_DIR . 'application.php';
require_once PRESENTATION_DIR . 'link.php';

//Загружаем дескриптор базы данных
require_once BUSINESS_DIR . 'database_handler.php';

//Загружаем код уровня логики приложения
require_once BUSINESS_DIR . 'catalog.php';

//Загружаем файл шаблона Smarty
$application = new Application();

//Отображаем страницу
$application->display('store_admin.tpl');

//Закрываем соединение с базой данных
DatabaseHandler::Close();

//Выводим содержимое буфера
flush();
ob_flush();
ob_end_clean();
?>