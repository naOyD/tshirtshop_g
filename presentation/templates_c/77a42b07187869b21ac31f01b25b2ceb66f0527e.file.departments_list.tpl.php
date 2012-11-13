<?php /* Smarty version Smarty-3.1.8, created on 2012-11-12 22:23:57
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\departments_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:614850a168ed70aeb3-67345426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77a42b07187869b21ac31f01b25b2ceb66f0527e' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\departments_list.tpl',
      1 => 1351545332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '614850a168ed70aeb3-67345426',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
    'selected' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a168ed761dc9_04814511',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a168ed761dc9_04814511')) {function content_50a168ed761dc9_04814511($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"departments_list",'assign'=>"obj"),$_smarty_tpl);?>


<div class="box">
    <p class="box-title">Choose a Department</p>
    <ul>
    
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mDepartments) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
        <?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable('', null, 0);?>
    
    <?php if (($_smarty_tpl->tpl_vars['obj']->value->mSelectedDepartment==$_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['department_id'])){?>
        <?php $_smarty_tpl->tpl_vars['selected'] = new Smarty_variable("class=\"selected\"", null, 0);?>
    <?php }?>
    <li>
    
            <a <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>
 href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link_to_department'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>

            </a>
    </li>
    <?php endfor; endif; ?>
    </ul>
</div>
<?php }} ?>