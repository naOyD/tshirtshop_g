{load_presentation_object filename="store_admin" assign="obj"}
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" 
 "http://www.w3.org/TR/html4/strict.dtd"> 
 <html>
  <head>
    <title>Demo Store Admin from Beginning PHP and MySQL E-Commerce</title>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
    <link rel="stylesheet" href="{$obj->mSiteUrl}styles/tshirtshop.css" type="text/css"> 
  </head>
   <body>
    <div id="doc" class="yui-t7">
      <div id="bd">
      <div class="yui-g">
        {include file=$obj->mMenuCell}
      </div>
      <div class="yui-g">
        {include file=$obj->mContentsCell}    
      </div>
     </div>
    </div>
   </body>
 </html>