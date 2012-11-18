<?php /* Smarty version Smarty-3.1.8, created on 2012-11-17 22:18:39
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\admin_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2833750a7ff2f695b94-71114711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '593a8b73afb4e6bd992f7895adf1997715a4d088' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\admin_menu.tpl',
      1 => 1353184550,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2833750a7ff2f695b94-71114711',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a7ff2f700b09_13028226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a7ff2f700b09_13028226')) {function content_50a7ff2f700b09_13028226($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_menu",'assign'=>"obj"),$_smarty_tpl);?>

<h1>TShirtShop Admin console</h1>
 <p>
  <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStoreAdmin;?>
">CATALOG ADMIN</a>
  <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStoreFront;?>
">STOREFRONT</a>
  <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLogout;?>
">LOGOUT</a>
 </p><?php }} ?>