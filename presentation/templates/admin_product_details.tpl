{* admin_product_details.tpl *}
{load_presentation_object filename="admin_product_details" assign="obj"}
<form enctype="multipart/form-data" method="post" 
      action="{$obj->mLinkToProductDetailsAdmin}">
<h3>
        Редактирование товара: ID # {$obj->mProduct.product_id} &mdash; 
        {$obj->mProduct.name} [ 
        <a href="{$obj->mLinkToCategoryProductsAdmin}">
        Вернуться к товарам ... </a> ]
</h3>
        {if $obj->mErrorMessage}<p class="error">{$obj->mErrorMessage}</p>{/if}
 <table class="borderless-table">
     <tbody>
         <tr>
             <td valign="top">
                 <p class="bold-text">
                     Имя товара:
                 </p>
                 <p>
                     <input type="text" name="name" 
                     value="{$obj->mProduct.name}" size="30" />
                 </p>
                 <p class="bold-text">
                     Описание товара:
                 </p>
                 <p>
                     {strip}
                         <textarea name="description" rows="3" cols="60">
                          {$obj->mProduct.description}
                         </textarea>
                     {/strip}
                 </p>
                 <p class="bold-text">
                     Цена товара:
                 </p>
                 <p>
                     <input type="text" name="price" 
                     value="{$obj->mProduct.price}" size="5"/>
                 </p>
                 <p class="bold-text">
                     Цена товара со скидкой:
                 </p>
                 <p>
                     <input type="text" name="discounted_price" 
                     value="{$obj->mProduct.discounted_price}" size="5"/>
                 </p>
                 <p>
                     <input type="submit" name="UpdateProductInfo"
                            value="Обновить данные"/>
                 </p>
             </td>
             <td valign="top"> 
                 <p>
                     <font class="bold-text"> 
                     Продукт расположен в данной категории: </font>
                     {$obj->mProductCategoriesString}                  
                 </p>
                 <p class="bold-text">
                     Удалить этот товар из:
                 </p>
                 <p>                  
                  {html_options name="TargetCategoryIdRemove"
                  options=$obj->mRemoveFromCategories}
                  <input type="submit" name="RemoveFromCategory" value="Удалить"
                  {if $obj->mRemoveFromCategoryButtonDisabled}
                         disabled="disabled" {/if}/>
                 </p>
                 
                <p class="bold-text">
                     Назначить категорию для товара:
                 </p>
                 <p>
                     {html_options name="TargetCategoryIdAssign"
                     options=$obj->mAssignOrMoveTo}
                     <input type="submit" name="Assign" value="Назначить" />
                 </p>
                 <p class="bold-text">
                     Переместить товар в эту категорию:
                 </p>
                 <p>
                     {html_options name="TargetCategoryIdMove"
                     options=$obj->mAssignOrMoveTo}
                     <input type="submit" name="Move" value="Переместить" />
                     <input type="submit" name="RemoveFromCatalog" 
                            value="Удалить товар из каталога"
                     {if !$obj->mRemoveFromCategoryButtonDisabled}
                         disabled="disabled" {/if}/>
                 </p>
                 {if $obj->mProductAttributes}
                 <p class="bold-text">
                     Атрибуты товара:
                 </p>   
                 <p>
                     {html_options name="TargetAttributeValueIdRemove"
                     options=$obj->mProductAttributes}
                     <input type="submit" name="RemoveAttributeValue"
                            value="Удалить" />
                 </p>
                 {/if}
                 {if $obj->mCatalogAttributes}
                 <p class="bold-text">
                     Назначить атрибуты товару:
                 </p> 
                 <p>
                     {html_options name="TargetAttributeValueIdAssign"
                     options=$obj->mCatalogAttributes}
                     <input type="submit" name="AssignAttributeValue"
                            value="Назначить"/>
                 </p>
                 {/if}
                 <p class="bold-text">
                     Установить параметры отображения для этого продукта:
                 </p>
                 <p>
                     {html_options name="ProductDisplay"
                     options=$obj->mProductDisplayOptions
                     selected=$obj->mProduct.display}
                     <input type="submit" name="SetProductDisplayOption" 
                            value="Установить"/>
                 </p>
             </td>
         </tr>      
     </tbody> 
 </table>
<p> 
 <font class="bold-text"> Название изображения № 1: </font> {$obj->mProduct.image}
 <input name="ImageUpload" type="file" value="Загрузить" />
 <input type="submit" name="Upload" value="Загрузить"/>
</p>
{if $obj->mProduct.image}
    <p>
        <img src="images/product_images/{$obj->mProduct.image}" border="0" 
             alt="{$obj->mProduct.name} изображение № 1">
    </p>
{/if}
<p> 
 <font class="bold-text"> Название изображения № 2: </font> {$obj->mProduct.image_2}
 <input name="Image2Upload" type="file" value="Загрузить" />
 <input type="submit" name="Upload" value="Загрузить"/>
</p>
{if $obj->mProduct.image_2}
    <p>
        <img src="images/product_images/{$obj->mProduct.image_2}" border="0" 
             alt="{$obj->mProduct.name} изображение № 2">
    </p>
{/if}
<p>
    <font class="bold-text">Название миниатюра: </font>
    {$obj->mProduct.thumbnail}
    <input name="ThumbnailUpload" type="file" value="Загрузить" />
    <input type="submit" name="Upload" value="Загрузить"/>
</p>
{if $obj->mProduct.thumbnail}
    <p>
        <img src="images/product_images/{$obj->mProduct.thumbnail}" 
             border="0" alt="{$obj->mProduct.name} миниатюра" />
    </p>
{/if}
</form>