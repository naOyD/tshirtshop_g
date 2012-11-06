<?php 
// Задаем код состояния 500
header('HTTP/1.0 500 Internal Server Error');

require_once 'include/config.php';
require_once PRESENTATION_DIR . 'link.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>TshirtShop Application Error (500): Demo product 
    catalog from Beginning PHP and MySQL E-Commerce</title>
    <link href="<?php echo Link::Build('styles/tshirtshop.css');?>" type="text/css" rel="stylesheet"/>
</head>
<body>
    <div id="doc" class="yui-t7">
        <div id="bd">
            <div id="header" class="yui-g">
                 <a href="<?php echo Link::Build(''); ?>">
                 <img src="<?php echo Link::Build('images/images/title.png'); ?>"
                    alt="tshirtshop logo" />
                 </a>
            </div>
        <div id="contents" class="yui-g">
            <h1>
        Tshirtshop is experiencing technical difficulties.
            </h1>
                <p>
                      Please
                     <a href="<?php Link::Build(); ?>">Visit US </a> soon, or
                     <a href="<?php echo ADMIN_ERROR_MAIL?>">Contact us</a>
                     </p>
                     <p>Thank you!</p>
                     <p>The Tshirtshop team.</p>
        </div>
        </div>
    
    </div>


</body>
</html>
