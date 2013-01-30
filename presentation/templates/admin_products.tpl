{* admin_products.tpl *}
{load_presentation_object filename="admin_products" assign="obj"}
<form method="post" action="{$obj->mLinkToCategoryProductsAdmin}">
 <h3>
    Управление продуктами в котегории : {$obj->mCategoryName} [
    <a href="{$obj->mLinkToDepartmentCategoriesAdmin}">
    назад к категориям</a>]
 </h3>
 {if $obj->mErrorMessage}<p class="error">{$obj->mErrorMessage}</p>{/if}
 {if $obj->mProductsCount eq 0}
  <p class="no-items-found">В этой категории отсутствуют товары</p>
 {else}
 <table class="tss-table">
  <tr>
    <th>Имя</th>
    <th>Описание</th>
    <th>Цена</th>
    <th>Цена со скидкой</th>
    <th width="80">&nbsp;</th>
  </tr>
  {section name=i loop=$obj->mProducts}
   <tr>
    <td>{$obj->mProducts[i].name}</td>
    <td>{$obj->mProducts[i].description}</td>
    <td>{$obj->mProducts[i].price}</td>
    <td>{$obj->mProducts[i].discounted_price}</td>
    <td>
        <input type="submit" name="submit_edit_prod_{$obj->mProducts[i].product_id}" value="Изменить"/>
    </td>
   </tr>
 {/section}
 </table>
 {/if}
 <h3>Добавить новый товар</h3>
 <input type="text" name="product_name" value="[имя товара]" size="30"/>
 <input type="text" name="product_description" value="[описание]" size="60"/>
 <input type="text" name="product_price" value="[цена]" size="10"/>
 <input type="submit" name="submit_add_prod_0" value="Добавить"/>
</form>