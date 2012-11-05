<?php /* Smarty version Smarty-3.1.8, created on 2012-11-05 22:49:21
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_github/presentation/templates\department.tpl" */ ?>
<?php /*%%SmartyHeaderCode:380509834614cb0b6-52498514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20f97a0eb3567f0d7a0ae0498914c634c276a6af' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_github/presentation/templates\\department.tpl',
      1 => 1350421810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '380509834614cb0b6-52498514',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50983461539a75_87186667',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50983461539a75_87186667')) {function content_50983461539a75_87186667($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"department",'assign'=>"obj"),$_smarty_tpl);?>

<h1 class='title'><?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
</h1>
<p class="description"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDescription;?>
</p>
<?php echo $_smarty_tpl->getSubTemplate ("products_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>