<?php /* Smarty version Smarty-3.1.8, created on 2012-11-05 22:49:12
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_github/presentation/templates\store_front.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25175509834587c8a08-86380810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3984a4b2039856df89ea2950d56758da30d1c38f' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_github/presentation/templates\\store_front.tpl',
      1 => 1351718162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25175509834587c8a08-86380810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_509834589b9880_84252880',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_509834589b9880_84252880')) {function content_509834589b9880_84252880($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php  $_config = new Smarty_Internal_Config("site.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"store_front",'assign'=>"obj"),$_smarty_tpl);?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
 "http://www.w3.org/TR/html4/strict.dtd"> 
<html> 
<head> 
<title><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPageTitle;?>
</title> 
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
styles/tshirtshop.css" type="text/css"> 
<script src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
js/script1.js"></script>
</head> 
<body class="yui-skin-sam"> 
    <div id="doc" class="yui-t2"> 
    
    
    
    <div id="bd"> 
        <div id="yui-main"> 
            <div class="yui-b">
                    <div id='header'class="yui-g"> 
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
images/images/title.png" 
                            alt="tshirtshop logo"/>
                            </a>
                                <!-- YOUR DATA GOES HERE --> 
                    </div> 
                    <div id="contents" class="yui-g"> 
                    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['obj']->value->mContentsCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
           <!-- YOUR CONTENT`s GOES HERE -->
                      
                    </div> 
            </div> 
        </div> 
<div class="yui-b">
    <?php echo $_smarty_tpl->getSubTemplate ("departments_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
  <!-- YOUR NAVIGATION GOES HERE -->
    <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['obj']->value->mCategoriesCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
       </div> 
 </div> 
<div id="ft" role="contentinfo">created by naOy</div> 
</div> 
</body> 
</html> 
<?php }} ?>