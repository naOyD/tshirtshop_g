<?php /* Smarty version Smarty-3.1.8, created on 2012-11-15 17:47:38
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\search_results.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1894850a51caab32d67-84800400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e02cbf4b228e3709f864f34f6faf75eb120d5efe' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\search_results.tpl',
      1 => 1352755653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1894850a51caab32d67-84800400',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a51caabc5345_85236043',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a51caabc5345_85236043')) {function content_50a51caabc5345_85236043($_smarty_tpl) {?>
<h1>Search results</h1>
<?php echo $_smarty_tpl->getSubTemplate ("products_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>