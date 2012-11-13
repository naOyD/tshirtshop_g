<?php /* Smarty version Smarty-3.1.8, created on 2012-11-12 22:23:57
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\first_page_contents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3166550a168ed489808-13692980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10da6dbb21162aaec4f0bc3a9bbb7bc12d0be918' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\first_page_contents.tpl',
      1 => 1350592460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3166550a168ed489808-13692980',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a168ed48f6f8_62528573',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a168ed48f6f8_62528573')) {function content_50a168ed48f6f8_62528573($_smarty_tpl) {?>
<p class="description">
We hope you have fun developing TShirtShop... And bla bla bla
</p>
<p class="description">
We have the largest collection if t-shirts with postal stamps on Eearth!
Browse our departments and categories to find your favorite!
</p>
<?php echo $_smarty_tpl->getSubTemplate ('products_list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>