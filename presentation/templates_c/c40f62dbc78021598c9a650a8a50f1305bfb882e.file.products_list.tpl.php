<?php /* Smarty version Smarty-3.1.8, created on 2012-11-17 22:12:31
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\products_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:868950a7fdbf48d979-47852951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c40f62dbc78021598c9a650a8a50f1305bfb882e' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\products_list.tpl',
      1 => 1352998310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '868950a7fdbf48d979-47852951',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a7fdbf60a6a0_15003557',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a7fdbf60a6a0_15003557')) {function content_50a7fdbf60a6a0_15003557($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?>
<?php echo smarty_function_load_presentation_object(array('filename'=>"products_list",'assign'=>"obj"),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mSearchDescription!=''){?>
  <p class="description"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSearchDescription;?>
</p>
<?php }?>
<?php if (count($_smarty_tpl->tpl_vars['obj']->value->mProductListPages)>0){?>
<p>

  <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToPreviousPage){?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToPreviousPage;?>
">Previous page</a>
  <?php }?>

  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['m'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['m']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['name'] = 'm';
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mProductListPages) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['m']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['m']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['m']['total']);
?>
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPage==$_smarty_tpl->getVariable('smarty')->value['section']['m']['index_next']){?>
    <strong><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['m']['index_next'];?>
</strong>
    <?php }else{ ?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProductListPages[$_smarty_tpl->getVariable('smarty')->value['section']['m']['index']];?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['m']['index_next'];?>
</a>
    <?php }?>
  <?php endfor; endif; ?>

  <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToNextPage){?>
  <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToNextPage;?>
">Next page</a>
  <?php }?>

</p>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mProducts){?>
<table class="product-list" border="0">
  <tbody>
  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['k'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['k']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['name'] = 'k';
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mProducts) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['k']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['k']['total']);
?>
    <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['k']['index']%2==0){?>
    <tr>
    <?php }?>
      <td valign="top">
        <h3 class="product-title">
          <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['link_to_product'];?>
">
            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['name'];?>

          </a>
        </h3>
        <p>
          <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['thumbnail']!=''){?>
          <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['link_to_product'];?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['thumbnail'];?>
"
             alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['name'];?>
" />
          </a>
          <?php }?>
          <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['description'];?>

        </p>
        <p class="section">
          Price:
          <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['discounted_price']!=0){?>
            <span class="old-price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['price'];?>
</span>
            <span class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['discounted_price'];?>
</span>
          <?php }else{ ?>
            <span class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['price'];?>
</span>
          <?php }?>
        </p>

        
        <form class="add-product-form" target="_self" method="post"
         action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['link_to_add_product'];?>
">

        
        <p class="attributes">

        
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['l'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['l']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['name'] = 'l';
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['l']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['l']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['l']['total']);
?>

          
          <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['l']['first']||$_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_name']!==$_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index_prev']]['attribute_name']){?>
            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_name'];?>
:
          <select name="attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_name'];?>
">
          <?php }?>

            
            <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_value'];?>
">
              <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_value'];?>

            </option>

          
          <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['l']['last']||$_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index']]['attribute_name']!==$_smarty_tpl->tpl_vars['obj']->value->mProducts[$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['l']['index_next']]['attribute_name']){?>
          </select>
          <?php }?>

        <?php endfor; endif; ?>
        </p>

        
        <p>
          <input type="submit" name="submit" value="Add to Cart" />
        </p>
        </form>

      </td>
    <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['k']['index']%2!=0&&!$_smarty_tpl->getVariable('smarty')->value['section']['k']['first']||$_smarty_tpl->getVariable('smarty')->value['section']['k']['last']){?>
    </tr>
    <?php }?>
  <?php endfor; endif; ?>
  </tbody>
</table>
<?php }?>
<?php }} ?>