<?php include 'tpl_head.php'; ?>

<div class="dashboard-header">
  <div class="page-title"><?= $pageTitle ?></div>
  <div class="product-create">
    <a href="/product/create" class="btn-create">Create Product</a>
  </div>
</div>

<div id="filter">

  <div class="filter-menu">
    <button class="menubtn" data-menu="category">Category</button>
    <button class="menubtn" data-menu="manufacturer">Manufacturer</button>
    <button class="clear">X</button>
  </div>
      
  <div id="category" class="menu-content">
    <?php foreach ($categories as $category): ?>
      <button 
        class="catbtn"
        data-id="<?= $category->id ?>"
        >
        <?= $category->title ?>
      </button>
    <?php endforeach; ?>
  </div>
  
  <div id="manufacturer" class="menu-content">
    <?php foreach ($manufacturers as $manufacturer): ?>
      <button 
        class="catbtn"
        data-id="<?= $manufacturer->id ?>"
        >
        <?= $manufacturer->title ?>
      </button>
    <?php endforeach; ?>
  </div>
</div>

<main id="content">
  <div id="products" class="admin">
    <div id="spinner"  style="display: none;">Loading...</div>
    <?php foreach ($products as $product): ?>
      <div class="item admin">
        
        <div class="left">
          <div class="item-img">
            <a href="/product?id=<?= $product->id ?>">
              <img src="/public/img/bc_img_dummy_300x400.png"/>
            </a>
          </div>

          <div class="item-info">
            <div>
              <a href="/product?id=<?= $product->id ?>" class="product-title">
              <strong><?= htmlspecialchars($product->title) ?></strong>
              </a>
            </div>
            
            <div class="category-title">
              <strong>Category:</strong><?= htmlspecialchars($product->product_category) ?>
            </div>
            
            <div class="product-manufacturer">
              <strong>Manufacturer:</strong>
                <?= htmlspecialchars($product->product_maufacturer) ?>
            </div>
            
            <div class="product-instock">
              <?php if( boolval(htmlspecialchars($product->in_stock)) ): ?>
                <strong style="color: green;">In Stock</strong>
              <?php else: ?>
                <strong style="color: red;">Out of Stock</strong>
              <?php endif ?>
            </div>
          </div>
        </div>

        <div class="right">
          <a href="/product/edit?id=<?= $product->id ?>" class="btn-edit">Edit</a>

          <form action="#" method="post">
            <input type="hidden" name="id" value="<?= $product->id ?>"/>
            <button type="submit" class="btn-delete">Delete</button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div><!-- products -->
</main><!-- content -->


<?php include 'tpl_footer.php'; ?>
