<?php /* Smarty version Smarty-3.1.8, created on 2012-11-05 22:49:12
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_github/presentation/templates\first_page_contents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:442050983458b16551-52145633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bca05f0dbb0308ca41956408952df39223b233b0' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_github/presentation/templates\\first_page_contents.tpl',
      1 => 1350592460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '442050983458b16551-52145633',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50983458b21f43_41277055',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50983458b21f43_41277055')) {function content_50983458b21f43_41277055($_smarty_tpl) {?>
<p class="description">
We hope you have fun developing TShirtShop... And bla bla bla
</p>
<p class="description">
We have the largest collection if t-shirts with postal stamps on Eearth!
Browse our departments and categories to find your favorite!
</p>
<?php echo $_smarty_tpl->getSubTemplate ('products_list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>