<?php /* Smarty version Smarty-3.1.8, created on 2012-11-17 22:12:31
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\first_page_contents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1781650a7fdbf4534b9-62851211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10da6dbb21162aaec4f0bc3a9bbb7bc12d0be918' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\first_page_contents.tpl',
      1 => 1353010228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1781650a7fdbf4534b9-62851211',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a7fdbf4682f3_16886099',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a7fdbf4682f3_16886099')) {function content_50a7fdbf4682f3_16886099($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"first_page_contents",'assign'=>"obj"),$_smarty_tpl);?>

<p class="description">
We hope you have fun developing TShirtShop... Это тестовый интернет-магазин. Нажимайте, проверяйте.
</p>
<p class="description">
We have the largest collection if t-shirts with postal stamps on Eearth!
Browse our departments and categories to find your favorite!
</p>
<p>Access the <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">Admin page</a></p>
<?php echo $_smarty_tpl->getSubTemplate ('products_list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>