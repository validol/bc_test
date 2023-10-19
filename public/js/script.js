const menuButtons = document.querySelectorAll('.menubtn');
const menuContents = document.querySelectorAll(".menu-content");
const categoryButtons = document.getElementById("category");
const manufacturersButtons = document.getElementById("manufacturer");
const productsList = document.getElementById("products");
const clear = document.querySelector(".clear");
const spinner = document.getElementById("spinner");

if (clear) {
  clear.style.display = "none";
  clear.addEventListener('click', function(evt) {
    clearFilter();

    getProducts('products_all')
      .then(products => setProducts(products));
    
    this.style.display = 'none';
    // TODO: remove event listeners
  });
}

if(menuButtons) {
  for (const menu of menuButtons) {
    menu.addEventListener('click', function (evt) {
      openMenu(evt.target, this.getAttribute('data-menu'));
    });
  }
}

if (categoryButtons) {
  for (const category of categoryButtons.children) {
    category.addEventListener('click', function (evt) {
      clear.style.display = 'block';

      getProducts(`category_products?id=${this.getAttribute('data-id')}`)
        .then(products => setProducts(products));
    });
  }
}

if (manufacturersButtons) {
  for (const manufacturer of manufacturersButtons.children) {
    manufacturer.addEventListener('click', function (evt) {
      clear.style.display = 'block';
      
      getProducts(`manufacturer_products?id=${this.getAttribute('data-id')}`)
        .then(products => setProducts(products));
    });
  }
}

function setProducts(products = []) {
  productsList.innerHTML = '';
  
  if (!products.length) {
    buildNoProductItem('No products');
    return;
  }
  
  for (let product of products) {
    buildProductItem(product);
  }  
}

function buildProductItem(product) {
  let itemAdmin = document.createElement('div');
  itemAdmin.className = "item admin";

  let left = document.createElement('div');
  left.className = "left";
  
  let itemImg = document.createElement('div');
  itemImg.innerHTML = `
    <div class="item-img">
      <a href="/product?id=${product.id}"><img src="/public/img/bc_img_dummy_300x400.png"/></a>
    </div>`;
  left.append(itemImg);
  // ---

  let info = document.createElement('div');
  info.className = "item-info";

  let div = document.createElement('div');
  div.innerHTML = `
    <div>
      <a href="/product?id=${product.id}" class="product-title"><strong>${product.title}</strong></a>
    </div>`; 
  info.append(div);

  let category = document.createElement('div');
  category.className = "category-title";
  category.innerHTML = `<strong>Category:</strong>${product.product_category}`;
  info.append(category);
  
  let manufacturer = document.createElement('div');
  manufacturer.className = 'product-manufacturer';
  manufacturer.innerHTML = `<strong>Manufacturer:</strong>${product.product_maufacturer}`;
  info.append(manufacturer);
  
  let stock = document.createElement('div');
  stock.className = 'product-instock';

  if ( parseInt(product.in_stock) ) {
    stock.className += ' in-stock';
    stock.innerText = 'In Stock';
  } else {
    stock.className += ' out-stock';
    stock.innerText = 'Out of Stock';
  }

  info.append(stock);
  left.append(info);

  // ---
  let right = document.createElement('div');
  right.className = "right";
  right.innerHTML = `
    <a href="/product/edit?id=${product.id}" class="btn-edit">Edit</a>

    <form action="#" method="post">
      <input type="hidden" name="id" value="$product.id"/>
      <button type="submit" class="btn-delete">Delete</button>
    </form>
  `;

  itemAdmin.append(left);
  itemAdmin.append(right);

  productsList.append(itemAdmin);
}

function buildNoProductItem(msg) {
  let noProducts = document.createElement('div');
  noProducts.className = "no-products item";
  noProducts.innerText = msg;

  productsList.append(noProducts);
}

function clearFilter() { 
  for (const content of menuContents) {
    content.style.display = "none";
  }

  for (const menu of menuButtons) {
    menu.classList.remove("active");
  }
}

function openMenu(currentMenu, contentBlock) {
  for (const content of menuContents) {
    content.style.display = "none";
  }

  for (const menu of menuButtons) {
    menu.className = menu.className.replace(" active", "");
  }

  document.getElementById(contentBlock).style.display = "block";
  currentMenu.classList.add("active");
}

async function getProducts(url) {
  const response = await fetch(`/${url}`);
  const json = await response.json();
  return json;
}