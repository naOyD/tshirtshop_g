<?php /* Smarty version Smarty-3.1.8, created on 2012-11-19 22:18:27
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\admin_departments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1073050aaa22338a187-50574038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa50fecc1ec3dd955578a41ff8a03b32dcfd04b5' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\admin_departments.tpl',
      1 => 1353263444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1073050aaa22338a187-50574038',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50aaa2234256b0_49428617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50aaa2234256b0_49428617')) {function content_50aaa2234256b0_49428617($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"admin_departments",'assign'=>"obj"),$_smarty_tpl);?>

<form method="post"
 action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToDepartmentsAdmin;?>
">
  <h3>Edit the departments of TShirtShop:</h3>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mErrorMessage){?><p class="error"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mErrorMessage;?>
</p><?php }?>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mDepartmentsCount==0){?>
  <p class="no-items-found">There are no departments in your database!</p>
<?php }else{ ?>
  <table class="tss-table">
    <tr>
      <th width="200">Department Name</th>
      <th>Department Description</th>
      <th width="240">&nbsp;</th>
    </tr>
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
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditItem==$_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['department_id']){?>
    <tr>
      <td>
        <input type="text" name="name"
         value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
" size="30" />
      </td>
      <td>
      <textarea name="description" rows="3" cols="60"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['description'];?>
</textarea>
      </td>
      <td>
        <input type="submit"
         name="submit_edit_cat_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['department_id'];?>
"
         value="Edit Categories" />
        <input type="submit"
         name="submit_update_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['department_id'];?>
"
         value="Update" />
        <input type="submit" name="cancel" value="Cancel" />
        <input type="submit"
         name="submit_delete_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['department_id'];?>
"
         value="Delete" />
      </td>
    </tr>
    <?php }else{ ?>
    <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['description'];?>
</td>
      <td>
        <input type="submit"
         name="submit_edit_cat_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['department_id'];?>
"
         value="Edit Categories" />
        <input type="submit"
         name="submit_edit_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['department_id'];?>
"
         value="Edit" />
        <input type="submit"
         name="submit_delete_dept_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartments[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['department_id'];?>
"
         value="Delete" />
      </td>
    </tr>
    <?php }?>
  <?php endfor; endif; ?>
  </table>
<?php }?>
  <h3>Add new department:</h3>
  <p>
    <input type="text" name="department_name" value="[name]" size="30" />
    <input type="text" name="department_description" value="[description]"
     size="60" />
    <input type="submit" name="submit_add_dept_0" value="Add" />
  </p>
</form>
<?php }} ?>