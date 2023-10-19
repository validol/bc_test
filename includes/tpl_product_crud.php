<?php include "tpl_head.php"; ?>

<h2><?= $pageTitle ?></h2>

<main id="content">
  <div id="product-form" class="form">
    <form method="post">
      <label>Title</label>
      <div>
        <input
          type="text"
          name="title"
          value="<?= isset($_POST['title']) ? $_POST['title'] : (isset($product) ? $product->title : '')?>"
        />
        <p class="error"><?= isset($errors['title']) ? $errors['title'] : ''; ?></p>
      </div>
      
      <label>Category</label>
      <div class="category-fields">
        <div class="category-select <?= $urlPath === "/product/edit" ? 'flexgrow' : '' ?>">
          <select name="category">
            <option value="">Select</option>
            <?php foreach ($categories as $category): ?>
              <option
                value="<?= $category->id ?>" 
                  <?= (isset($_POST['category']) && $_POST['category'] === $category->id) ? 'selected' : ''; ?>
                  <?= (isset($product) && $category->id === $product->category) ? 'selected' : ''; ?>
                >
                <?= $category->title ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <?php if( $urlPath === "/product/create" ): ?>
        <span class="separator"> - or - </span>

        <div class="category-new">
          <input
            type="text"
            name="category_new"
            value="<?= isset($_POST['category_new']) ? $_POST['category_new'] : ''?>"
            placeholder="Create new category"
          />
        </div>
        <?php endif; ?>
      </div>
      <p class="error"><?= isset($errors['category']) ? $errors['category'] : ''; ?></p>
      
      <label>Manufacturer</label>
      <div class="manufacturer-fields">
        <div class="manufacturer-select <?= $urlPath === "/product/edit" ? 'flexgrow' : '' ?>">
          <select name="manufacturer">
            <option value="">Select</option>
            <?php foreach ($manufacturers as $manufacturer): ?>
              <option
                value="<?= $manufacturer->id ?>"
                  <?= (isset($_POST['manufacturer']) && $_POST['manufacturer'] === $manufacturer->id) ? 'selected' : ''; ?>
                  <?= (isset($product) && $manufacturer->id === $product->manufacturer) ? 'selected' : ''; ?>
                >
                <?= $manufacturer->title ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        
        <?php if( $urlPath === "/product/create" ): ?>
        <span class="separator"> - or - </span>
        
        <div class="manufacturer-new">
          <input
            type="text"
            name="manufacturer_new"
            value="<?= isset($_POST['manufacturer_new']) ? $_POST['manufacturer_new'] : ''?>"
            placeholder="Create new manufacturer"
          />
        </div>
        <?php endif; ?>
      </div>
      <p class="error"><?= isset($errors['manufacturer']) ? $errors['manufacturer'] : ''; ?></p>
      
      <label>Stock</label>
      <div class="stock-select">
        <select name="in_stock">
          <option value="">Select</option>
          <option value="in" 
            <?= (isset($_POST['in_stock']) && $_POST['in_stock'] === "in") 
                ? 'selected' 
                : ((isset($product) && $product->in_stock === '1') ? 'selected' : '');
            ?>
            >In Stock</option>
          <option value="out"
            <?= (isset($_POST['in_stock']) && $_POST['in_stock'] === "out")
                ? 'selected'
                : ((isset($product) && $product->in_stock === '0') ? 'selected' : '');
            ?>
            >Out of Stock</option>
        </select>
        <p class="error"><?= isset($errors['in_stock']) ? $errors['in_stock'] : ''; ?></p>
      </div>
      
      <?php if( $urlPath === "/product/create" ): ?>
        <button type="submit">Create</button>
      <?php elseif( $urlPath === "/product/edit" ): ?>
        <button type="submit">Update</button>
      <?php else:?>
        <button type="submit">Save</button>
      <?php endif;?>
    </form>
  </div><!-- products -->
</main><!-- content -->

<?php include "tpl_footer.php"; ?>

