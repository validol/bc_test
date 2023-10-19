<?php
include "tpl_head.php";
?>

<h2><?= $pageTitle ?></h2>

<main id="content">
  <div id="product-show">

      <?php if( isset($product) ): ?>
        <div class="img">
          <img src="/public/img/bc_img_dummy_300x400.png"/>
        </div>
        
        <div class="info">
          <div class="product-title" ><strong><?= htmlspecialchars($product->title) ?></strong></div>
          <p class="product-category" ><strong class="pinfo">Category:</strong> <?= htmlspecialchars($product->product_category) ?></p>
          <p class="product-manufacturer" ><strong class="pinfo">Manufacturer:</strong> <?= htmlspecialchars($product->product_maufacturer) ?></p>
          <p class="product-instock">
            <?php if( boolval(htmlspecialchars($product->in_stock)) ): ?>
              <strong style="color: green;">In Stock</strong>
            <?php else: ?>
              <strong style="color: red;">Out of Stock</strong>
            <?php endif ?>
          </p>
        </div>
    
      <?php else: ?>
        
        <p>No product</p>
  
      <?php endif; ?>

    </div><!-- product -->
</main><!-- content -->

<?php
include "tpl_footer.php";
?>