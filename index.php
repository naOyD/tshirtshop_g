<?php
//Активизируем сеанс
session_start();
//Создаем входной буфер
ob_start();

// Подключение служебных файлов
require_once 'include/config.php';
require_once BUSINESS_DIR . 'error_handler.php';

// задаем обработчик ошибок
ErrorHandler::SetHandler();

// Загружаем шаблон страницы приложения
require_once PRESENTATION_DIR . 'application.php';
require_once PRESENTATION_DIR . 'link.php';

// Загружаем уровень логики приложения
require_once BUSINESS_DIR . 'catalog.php';

// Загружаем дескриптор базы данных
require_once BUSINESS_DIR . 'database_handler.php';

// Запускаем корректор URL
Link::CheckRequest();

// Загружаем файл шаблонов Smarty
$application = new Application();

// Отображаем страницу 
$application->display('store_front.tpl');

// Закрываем соединение с базой данных

DatabaseHandler::Close();

// Выводим содержимое буфера
flush();
ob_flush();
ob_end_clean();
//окончание рабочего файла
?>
<script>
window.alert('Hello Daniel!');
</script>