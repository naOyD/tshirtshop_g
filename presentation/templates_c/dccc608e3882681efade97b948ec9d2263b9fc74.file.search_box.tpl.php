<?php /* Smarty version Smarty-3.1.8, created on 2012-11-12 22:23:57
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\search_box.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1947950a168ed6aad34-10403685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dccc608e3882681efade97b948ec9d2263b9fc74' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\search_box.tpl',
      1 => 1352755403,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1947950a168ed6aad34-10403685',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a168ed6d0934_73061700',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a168ed6d0934_73061700')) {function content_50a168ed6d0934_73061700($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?>﻿
<?php echo smarty_function_load_presentation_object(array('filename'=>"search_box",'assign'=>"obj"),$_smarty_tpl);?>


<div class="box">
  <p class="box-title">Search the Catalog</p>
  <form class="search_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToSearch;?>
">
    <p>
      <input maxlength="100" id="search_string" name="search_string"
       value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSearchString;?>
" size="19" />
      <input type="submit" value="Go!" /><br />
    </p>
    <p>
      <input type="checkbox" id="all_words" name="all_words"
       <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAllWords=="on"){?> checked="checked" <?php }?>/>
      Search for all words
    </p>
  </form>
</div>

<?php }} ?>