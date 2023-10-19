<?php

class DB
{
  private $con;

  function __construct() {
    $dbCredentials = include 'config.php';

    $host = $dbCredentials['database']['host'];
    $port = $dbCredentials['database']['port'];
    $dbname = $dbCredentials['database']['database'];
    $user = $dbCredentials['database']['username'];
    $pass = $dbCredentials['database']['password'];
    
    $this->con = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=UTF8", $user, $pass);
    $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // $stmt->fetch(PDO::FETCH_ASSOC);    // single
    // $stmt->fetchAll(PDO::FETCH_ASSOC); // array/collection
    // $stmt->rowCount();                 // count(*)
  }

  public function getProductsAll()
  {    
    $stmt = $this->con->query("
      SELECT p.id, p.title, p.manufacturer, p.in_stock, c.id AS category_id, c.title AS product_category, m.title AS product_maufacturer
      FROM products AS p
      JOIN categories AS c ON p.category = c.id
      JOIN manufacturer AS m ON p.manufacturer = m.id
      ORDER BY p.id DESC
    ");
    return $stmt->fetchAll();
  }
  
  public function getProduct($id) {
    $stmt = $this->con->prepare("
      SELECT p.id, p.title, p.category, p.manufacturer, p.in_stock, c.title AS product_category, m.title AS product_maufacturer
      FROM products AS p
      JOIN categories AS c ON p.category = c.id
      JOIN manufacturer AS m ON p.manufacturer = m.id
      WHERE p.id=:id
      ORDER BY p.id DESC
    ");
    $stmt->execute([ 'id' => $id ]);  // named
    return $stmt->fetch();  // {...}
  }

  public function addProduct($title, $catId, $manufacturer, $instock) 
  {
    $stmt = $this->con->prepare("INSERT INTO products(title, category, manufacturer, in_stock) VALUES(?, ?, ?, ?)");
    $stmt->execute([$title, $catId, $manufacturer, $instock]);  // positional
  }

  public function updateProduct($id, $data)
  {
    $fieldValues = array_map(function($value, $key) {
        return $key.'="'.$value.'"';
      }, 
      array_values($data),
      array_keys($data)
    );

    $fields = implode(", ", $fieldValues);

    $stmt = $this->con->prepare("UPDATE products SET $fields WHERE id=?");
    $stmt->execute([$id]);
  }

  public function deleteProduct($id)
  {
    $stmt = $this->con->prepare("DELETE FROM products WHERE id=?");
    $stmt->execute([$id]);
  }

  public function getCategoriesAll()
  {
    $stmt = $this->con->query("SELECT * FROM categories");
    return $stmt->fetchAll();
  }
  
  public function addCategory($title) 
  {
    $stmt = $this->con->prepare("INSERT INTO categories(title) VALUES(?)");
    $stmt->execute([$title]);
    return $this->con->lastInsertId();
  }

  public function getManufacturersAll()
  {
    $stmt = $this->con->query("SELECT id, title FROM manufacturer");
    return $stmt->fetchAll();
  }

  public function addManufacturer($title) 
  {
    $stmt = $this->con->prepare("INSERT INTO manufacturer(title) VALUES(?)");
    $stmt->execute([$title]);
    return $this->con->lastInsertId();
  }
  public function getUsersAll()
  {
    $stmt = $this->con->query("SELECT id, name, email, role FROM users");
    return $stmt->fetchAll();
  }
  
  public function createUser($user, $email, $password, $role) 
  {
    $stmt = $this->con->prepare("INSERT INTO users(name, email, password, role) VALUES(?, ?, ?, ?)");
    $stmt->execute([$user, $email, $password, $role]);
  }
  
  public function getUser($email)
  {
    $stmt = $this->con->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->execute([ 'email' => $email ]);
    return $stmt->fetch();
  }
  
  
  public function getManufacturersProducts($id)
  {
    $stmt = $this->con->prepare("
      SELECT p.id, p.title, p.in_stock, c.title AS product_category, m.title AS product_maufacturer
      FROM products AS p
      JOIN categories AS c ON p.category = c.id
      JOIN manufacturer AS m ON p.manufacturer = m.id
      WHERE manufacturer=?
      ORDER BY p.id DESC
    ");
    $stmt->execute([ $id ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCategoryProducts($id)
  {
    $stmt = $this->con->prepare("
      SELECT p.id, p.title, p.in_stock, c.title AS product_category, m.title AS product_maufacturer
      FROM products AS p
      JOIN categories AS c ON p.category = c.id
      JOIN manufacturer AS m ON p.manufacturer = m.id
      WHERE category=?
      ORDER BY p.id DESC
    ");
    $stmt->execute([ $id ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}