<?php /* Smarty version Smarty-3.1.8, created on 2012-11-17 22:25:12
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\store_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1980050a7fdc1c5a9a0-17350168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86ad94f7fe08cea57ead8c27de4d4469ae45649a' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\store_admin.tpl',
      1 => 1353187497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1980050a7fdc1c5a9a0-17350168',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a7fdc1cc78c9_67392545',
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a7fdc1cc78c9_67392545')) {function content_50a7fdc1cc78c9_67392545($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"store_admin",'assign'=>"obj"),$_smarty_tpl);?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
 "http://www.w3.org/TR/html4/strict.dtd"> 
 <html>
  <head>
    <title>Demo Store Admin from Beginning PHP and MySQL E-Commerce</title>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
styles/tshirtshop.css" type="text/css"> 
  </head>
   <body>
    <div id="doc" class="yui-t7">
      <div id="bd">
      <div class="yui-g">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['obj']->value->mMenuCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      </div>
      <div class="yui-g">
        <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['obj']->value->mContentsCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
    
      </div>
     </div>
    </div>
   </body>
 </html><?php }} ?>