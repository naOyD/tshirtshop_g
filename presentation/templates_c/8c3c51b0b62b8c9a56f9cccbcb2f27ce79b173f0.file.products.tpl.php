<?php /* Smarty version Smarty-3.1.8, created on 2012-11-12 22:35:14
         compiled from "C:\xampp1.8\htdocs\myWork\tshirtshop_g/presentation/templates\products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1412850a16b92ba3f27-86991639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c3c51b0b62b8c9a56f9cccbcb2f27ce79b173f0' => 
    array (
      0 => 'C:\\xampp1.8\\htdocs\\myWork\\tshirtshop_g/presentation/templates\\products.tpl',
      1 => 1351627353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1412850a16b92ba3f27-86991639',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_50a16b92d32411_39636576',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a16b92d32411_39636576')) {function content_50a16b92d32411_39636576($_smarty_tpl) {?><?php if (!is_callable('smarty_function_load_presentation_object')) include './presentation/smarty_plugins\\function.load_presentation_object.php';
?><?php echo smarty_function_load_presentation_object(array('filename'=>"product",'assign'=>"obj"),$_smarty_tpl);?>

<h1 class="title"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
</h1>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mProduct['image']){?>
<img class="product-image" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
 image"/>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mProduct['image_2']){?>
<img class="product-image" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['image_2'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
 image 2"/>
<?php }?>
<p class="description"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['description'];?>
</p>
    <p class="section">
    Price:
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProduct['discounted_price']!=0){?>
    <span class="old-price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['price'];?>
</span>
    <span class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['discounted_price'];?>
</span>
    <?php }else{ ?>
    <span class="price"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['price'];?>
</span>
    <?php }?>
    </p>
 
        
        <p class="attributes">
        
            
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['k'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['k']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['name'] = 'k';
$_smarty_tpl->tpl_vars['smarty']->value['section']['k']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            
                
                 <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['k']['first']||$_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_name']!==$_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index_prev']]['attribute_name']){?>
                 <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_name'];?>

                    <select name="attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_name'];?>
">
                 <?php }?>
        
                 
                    <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_value'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_value'];?>

                    </option>
                    
                    <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['k']['last']||$_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index']]['attribute_name']!==$_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][$_smarty_tpl->getVariable('smarty')->value['section']['k']['index_next']]['attribute_name']){?>
                    </select>
                    <?php }?>
           <?php endfor; endif; ?>
        </p>
 
             <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping;?>
">Countinue Shopping</a>
            <?php }?>
 <h2>Find semilar products in our catalog:</h2>
        <ol>
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['obj']->value->mLocations) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link_to_department'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['department_name'];?>
</a>
            &raquo;
            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['link_to_category'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['category_name'];?>
</a>
            </li>
            <?php endfor; endif; ?>
        </ol><?php }} ?>