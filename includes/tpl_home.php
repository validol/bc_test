<?php include "tpl_head.php"; ?>



<h2><?= $pageTitle ?></h2>

<main id="content">
  <div id="products">
    <?php foreach ($products as $product): ?>
      <div class="item">
        <a href="/product?id=<?= $product->id ?>" class="product-img">
          <img src="/public/img/bc_img_dummy_300x400.png"/>
        </a>
        <div class="product-info">
          <a href="/product?id=<?= $product->id ?>" class="product-title">
            <strong><?= htmlspecialchars($product->title) ?></strong>
          </a>

          <div class="product-category"><?= htmlspecialchars($product->product_category) ?></div>
          <div class="man-count">
            <div class="product-manufacturer"><?= htmlspecialchars($product->product_maufacturer) ?></div>
            <div class="product-instock">
              <?php if( boolval(htmlspecialchars($product->in_stock)) ): ?>
                <strong style="color: green;">In Stock</strong>
              <?php else: ?>
                <strong style="color: red;">Out of Stock</strong>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div><!-- products -->
</main><!-- content -->

<?php include "tpl_footer.php"; ?>

