{* first_page_contetns.tpl *}
{load_presentation_object filename="first_page_contents" assign="obj"}
<p class="description">
We hope you have fun developing TShirtShop... Это тестовый интернет-магазин. Нажимайте, проверяйте.
</p>
<p class="description">
We have the largest collection if t-shirts with postal stamps on Eearth!
Browse our departments and categories to find your favorite!
</p>
<p>Access the <a href="{$obj->mLinkToAdmin}">Admin page</a></p>
{include file='products_list.tpl'}