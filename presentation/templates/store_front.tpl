{* smarty *}
{config_load file="site.conf"}
{load_presentation_object filename="store_front" assign="obj"}
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
 "http://www.w3.org/TR/html4/strict.dtd"> 
<html> 
<head> 
<title>{$obj->mPageTitle}</title> 
<link rel="stylesheet" href="{$obj->mSiteUrl}styles/tshirtshop.css" type="text/css"> 
<script src="{$obj->mSiteUrl}js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="{$obj->mSiteUrl}js/script1.js"></script>
</head> 
<body class="yui-skin-sam"> 
    <div id="doc" class="yui-t2"> 
        <div id="bd"> 
           <div id="yui-main"> 
              <div class="yui-b">
                 <div id='header'class="yui-g"> 
                  <a href="{$obj->mSiteUrl}">
                    <img src="{$obj->mSiteUrl}images/images/title.png" alt="tshirtshop logo"/>
                  </a>
                 </div> 
                 <div id="contents" class="yui-g"> 
                      {include file=$obj->mContentsCell}
                 </div> 
            </div> 
          </div> 
            <div class="yui-b">
             {include file="search_box.tpl"}
             {include file="departments_list.tpl"}
             {include file=$obj->mCategoriesCell} 
            <div class="view-cart">
                <form target="_self" method="post" action="{$smarty.const.PAYPAL_URL}">
                <input type='hidden' name="cmd" value="_cart"/>
                <input type="hidden" name="business" value="{$smarty.const.PAYPAL_EMAIL}"/>
                <input type="hidden" name="display" value="1"/>
                <input type="hidden" name="shopping_url" value="{$obj->mPayPalContinueShoppingLink}"/>
                <input type="hidden" name="return" value="{$smarty.const.PAYPAL_RETURN_URL}"/>
                <input type="hidden" name="return" value="{$smarty.const.PAYPAL_CANCEL_RETURN_URL}"/>
                <input type="submit" name="view_cart" value="View Cart"/>
                </form>
            </div>
            </div> 
        </div> 
       <div id="ft" role="contentinfo">created by naOy</div> 
    </div> 
</body> 
</html> 
