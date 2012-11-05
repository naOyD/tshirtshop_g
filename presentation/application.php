<?php
 // Ссылка на библиотеку Smarty
        require_once SMARTY_DIR . 'Smarty.class.php';
        // Класс, расширяющий Smarty, используется для обработки
        // и отображения файлов Smarty
        class Application extends Smarty {
                // Конструктор класса
                public function __construct(){
                        // Вызов конструктора Smarty
                        parent::__construct();
            // Подавляем ошибки вызванные Smarty
            $this->error_reporting = E_ALL & ~E_NOTICE;
            $this->muteExpectedErrors();
                        // Меняем папки шаблонов по умолчанию
                        $this->setTemplateDir(TEMPLATE_DIR);
                        $this->setCompileDir(COMPILE_DIR);
                        $this->setConfigDir(CONFIG_DIR);
            $this->setPluginsDir('./libs/smarty/plugins/');
            $this->addPluginsDir('./presentation/smarty_plugins/');
                }
        }
        ?>