<?php /* Smarty version Smarty-3.1.8, created on 2012-11-12 22:35:21
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\department.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3015950a16b99748269-75462649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adbdaf72804dbcfb6a361c8b4b852e70112e1991' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\department.tpl',
      1 => 1350421810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3015950a16b99748269-75462649',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a16b997b9e43_22103615',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a16b997b9e43_22103615')) {function content_50a16b997b9e43_22103615($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"department",'assign'=>"obj"),$_smarty_tpl);?>

<h1 class='title'><?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
</h1>
<p class="description"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDescription;?>
</p>
<?php echo $_smarty_tpl->getSubTemplate ("products_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>