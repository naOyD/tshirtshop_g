{load_presentation_object filename="product" assign="obj"}
<h1 class="title">{$obj->mProduct.name}</h1>
{if $obj->mProduct.image}
<img class="product-image" src="{$obj->mProduct.image}" alt="{$obj->mProduct.name} image"/>
{/if}
{if $obj->mProduct.image_2}
<img class="product-image" src="{$obj->mProduct.image_2}" alt="{$obj->mProduct.name} image 2"/>
{/if}
<p class="description">{$obj->mProduct.description}</p>
    <p class="section">
    Price:
    {if $obj->mProduct.discounted_price !=0}
    <span class="old-price">{$obj->mProduct.price}</span>
    <span class="price">{$obj->mProduct.discounted_price}</span>
    {else}
    <span class="price">{$obj->mProduct.price}</span>
    {/if}
    </p>
 
        {*Генерируем список значений атрибутов*}
        <p class="attributes">
        
            {*Просматриваем список атрибутов и их значений*}
            {section name=k loop=$obj->mProduct.attributes}
            
                {*Генерируем новый тег select?*}
                 {if $smarty.section.k.first || 
                    $obj->mProduct.attributes[k].attribute_name !==
                    $obj->mProduct.attributes[k.index_prev].attribute_name}
                 {$obj->mProduct.attributes[k].attribute_name}
                    <select name="attr_{$obj->mProduct.attributes[k].attribute_name}">
                 {/if}
        
                 {*Генерируем новый тег option*}
                    <option value="{$obj->mProduct.attributes[k].attribute_value}">
                    {$obj->mProduct.attributes[k].attribute_value}
                    </option>
                    {*Закрываем тег select?*}
                    {if $smarty.section.k.last ||
                    $obj->mProduct.attributes[k].attribute_name !==
                    $obj->mProduct.attributes[k.index_next].attribute_name}
                    </select>
                    {/if}
           {/section}
        </p>
 
             {if $obj->mLinkToContinueShopping}
                <a href="{$obj->mLinkToContinueShopping}">Countinue Shopping</a>
            {/if}
 <h2>Find semilar products in our catalog:</h2>
        <ol>
            {section name=i loop=$obj->mLocations}
            <li>
            {strip}
            <a href="{$obj->mLocations[i].link_to_department}">
            {$obj->mLocations[i].department_name}
            </a>
            {/strip}
            &raquo;
            {strip}
            <a href="{$obj->mLocations[i].link_to_category}">
            {$obj->mLocations[i].category_name}
            </a>
            {/strip}
            </li>
            {/section}
        </ol>