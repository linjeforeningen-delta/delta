<?php if(is_product_category('kompendier')){
  echo App\Template('arkiv-kompendier');
}else{
  echo App\Template('deltashop');
} ?>
