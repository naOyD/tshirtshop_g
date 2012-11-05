<?php
class ErrorHandler
{
    // Закрытый конструктор, не позволяющий непосредственно 
    // создавать объекты класса
    private function __construct()
    {
     
    }
    /*выбираем метод ErrorHandler::Handler в качестве метода обработки ошибок*/
    public static function SetHandler($errTypes = ERROR_TYPES)
    {
        return set_error_handler(array ('ErrorHandler','Handler'), $errTypes);
    }
    // метод обработки ошибок
    public static function Handler($errNo, $errStr, $errFile, $errLine)
    {
        // первые лва элемента массива нам неинтересны
        $backtrace = ErrorHandler::GetBacktrace(2);
        
        // Сообщения об ошибках, которые будут выводится, отправляться по эл. почте
        // или записываться в журнал
        $error_message = "\nERRNO: $errNo\nTEXT: $errStr" .
                         "\nLOCATION: $errFile, line " .
                         "$errLine, at " . date('F j, Y, g:i a') .
                         "\nShowing backtrace:\n$backtrace\n\n";
                         
        // Отправляем сообщение об ошибках, если SEND_ERROR_MAIL равно true
        if (SEND_ERROR_MAIL == true) 
        error_log($error_message, 1,ADMIN_ERROR_MAIL, "From: " .
                  SENDMAIL_FROM . "\r\nTo: " . ADMIN_ERROR_MAIL);
        // Записываем сообщения в журнал, если LOG_ERRORS равно true
        if (LOG_ERRORS == true)
        error_log($error_message, 3, LOG_ERRORS_FILE);
        /*выполнение не прекращается при предупреждениях, если IS_WARNING_FATAL равен false, 
        ошибки E_NOTICE  и E_USER_NOTICE тоже не приводят к прекращению выполнения*/
        if (($errNo== E_WARNING && IS_WARNING_FATAL == false) ||
         ($errNo == E_NOTICE || $errNo == E_USER_NOTICE))
         // если ошибка не фатальная 
         {
            // выводим сообщение, только если DEBUGGING равен true 
            if (DEBUGGING == true) 
            echo '<div class="error_box"><pre>' . $error_message . '</pre></div>';
            }
            else 
                {
                    // если ошибка фатальная 
                if (DEBUGGING == true)
                    echo '<div class="error_box"><pre>' . $error_message . '</pre></div>';
                else
                     echo SITE_GENERIC_ERROR_MESSAGE;
                    // оставнавливаем обработку запроса
                     exit();
                }
          }
          // Составляем список вызовов
          public static function GetBacktrace($irrelevantFirstEntries)
          {
            $s = '';
            $MAXSTRLEN = 64;
            $trace_array = debug_backtrace();
            
            for ($i = 0; $i < $irrelevantFirstEntries; $i++)
            array_shift($trace_array);
            $tabs = sizeof($trace_array) - 1;
            
            foreach ($trace_array as $arr)
            {
                $tabs -= 1;
                if (isset ($arr['class']))
                $s .= $arr['class'] . '.';
                $args = array ();
                
                if(!empty ($arr['args']))
                    foreach ($arr['args'] as $v)
                    {
                        if (is_null($v))
                         $args[] = 'null';
                         elseif (is_array($v))
                            $args[] = 'Array[' . sizeof($v) . ']';
                         elseif (is_object($v))
                            $args[] = 'Object: ' . get_class($v);
                         elseif (is_bool($v))
                            $args[] = $v ? 'true' : 'false';
                            
                            else 
                            {
                                $v = (string)@$v;
                                $str = htmlspecialchars(substr($v,0,$MAXSTRLEN));
                                if (strlen($v) > $MAXSTRLEN)
                                $str .= '...';
                                $args[] = '"' . $str . '"';
                            }
                    }
                    $s .= $arr['function'] . '(' . implode(', ', $args) . ')';
                    $line = (isset($arr['line']) ? $arr['line']: 'unknown');
                    $file = (isset($arr['file']) ? $arr['file']: 'unknown');
                    $s .= sprintf(' # line %4d, file: %s', $line, $file);
                    $s .= "\n";
            }
            return $s;
          }
}

?>