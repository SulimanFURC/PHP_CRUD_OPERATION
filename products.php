
<?php 

$db = 'mysql:dbname=php_crud;host=localhost';
$user = 'root';
$password = '';
$pdo = new PDO($db,$user,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search = $_GET['search'] ?? '';
if($search)
{
  $statement = $pdo->prepare('Select * from products where title LIKE :title order by create_date desc');
  $statement->bindValue(':title',"%$search%");
}
else
{
  $statement = $pdo->prepare('Select * from products order by create_date desc');
} 
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

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
    <h1>PHP CRUD Operation</h1>
    <p><a href="create.php" type="button" class="btn btn-outline-success">Create Product</a></p>
    <table class="table">

    <form>
    <div class="input-group mb-3 col-4">
      <input type="text" class="form-control" placeholder="Search Product" name="search">
      <button class="btn btn-outline-primary" type="submit" >Search</button>
    </div>
    </form>

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Create Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($products as $i => $product){ ?>
    <tr>
      <th ><?php echo $i +1 ?></th>
      <th scope="col">
        <img src="<?php echo $product['image'] ?>" alt="" class="thumbnail">
      </th>
      <th scope="col"><?php echo $product['title'] ?></th>
      <th scope="col"><?php echo $product['price'] ?></th>
      <th scope="col"><?php echo $product['create_date'] ?></th>
      <th scope="col">
      <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-outline-primary">Edit</a>
      <form action="delete.php" method="POST" style="display: inline-block;">
        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
        <button type="submit" class="btn btn-outline-danger">Delete</button>
      </form>
      </th>
      
    </tr>
   <?php } ?>
   
  </tbody>
</table>

  </body>
</html>