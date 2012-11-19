<?php /* Smarty version Smarty-3.1.8, created on 2012-11-19 22:18:24
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\admin_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2113250aaa2203ce355-02248386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e347852f3aca56da68adeca1f1487975c225b19e' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\admin_login.tpl',
      1 => 1353186830,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2113250aaa2203ce355-02248386',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50aaa220431114_61743042',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50aaa220431114_61743042')) {function content_50aaa220431114_61743042($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_login",'assign'=>"obj"),$_smarty_tpl);?>

<div class="login">
 <p class="login-title">TshirtShop Login</p>
 <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">
  <p>
   Enter login information or go back to
   <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToIndex;?>
">storefront</a>
  </p>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mLoginMessage!=''){?>
    <p class="error"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLoginMessage;?>
</p>
<?php }?>
    <p>
     <label for="username">Username:</label>
     <input type="text" name="username" size="35" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mUsername;?>
"/>
    </p>
    <p>
     <label for="password">Password:</label>
     <input type="text" name="password" size="35" value=""/>
    </p>
    <p>
     <input type="submit" name="submit" value="Login"/>
    </p>
 </form>
</div><?php }} ?>