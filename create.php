
<?php 

$db = 'mysql:dbname=php_crud;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($db,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo '<pre>';
// print_r($_FILES);
// echo '<pre>';


$errors = [];
// variables to hold the data enter in filed if important fileds are missing... 
$title = '';
$description = '';
$price = '';
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $price = $_POST['price'];
  $dat = date('Y-m-d');

  if(!$title)
  {
    $errors[] = 'Product Title can not be empty.';
  }
  if(!$price)
  {
    $errors[] = 'Price can not be empty.';
  }

  if(!is_dir('images'))
  {
      mkdir('images');
  }

  if(empty($errors))
  {
    $image = $_FILES['image_upload'] ?? null;
    $imagePath = '';
    if($image && $image['tmp_name'])
    {
      $imagePath = 'images/'.randomString(8).'/'.$image['name'];
      mkdir(dirname($imagePath));
      move_uploaded_file($image['tmp_name'],$imagePath);
    }
    $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date) values (:title, :image, :description, :price, :dat)");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':image',  $imagePath);
    $statement->bindValue(':description', $desc);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':dat', $dat);
    $statement->execute();
    header('Location: products.php');
  }
 

}

function randomString($n)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';
  for ($i = 0; $i< $n; $i++)
  {
    $index = rand(0, strlen($characters) - 1);
    $str .= $characters[$index];
  }

  return $str;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Create New Product</h1>
    
    <?php if(!empty($errors)) : ?>
      <div class="alert alert-danger">
      <?php foreach($errors as $error) : ?>
        <div><?php echo $error ?></div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <form action="create.php" method="post" enctype="multipart/form-data">
      <div class="mb-3 col-md-4">
        <label  class="form-label">Product Image</label>
        <input type="file" name="image_upload" class="form-control">
      </div>
      <div class="mb-3 col-md-4">
        <label  class="form-label">Product Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
      </div>
      <div class="mb-3 col-md-4">
        <label  class="form-label">Product Description</label>
        <textarea type="text" name="description" class="form-control" value="<?php echo $description ?>"></textarea>
      </div>
      <div class="mb-3 col-md-4">
        <label  class="form-label">Product price</label>
        <input type="text" step=".01" name="price" class="form-control" value="<?php echo $price ?>">
      </div>
      <button type="submit" class="btn btn-outline-primary">Submit</button>
</form>

  </body>
</html>