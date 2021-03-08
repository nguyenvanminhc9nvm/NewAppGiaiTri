
<?php
	require "../connect.php";
	$query = "SELECT * FROM comic order by create_at desc";
	$data = mysqli_query($conn,$query);
	$comics = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($comics,new Comic(
			$row['id'],
			$row['name_image'],
			$row['author'],
      $row['avatar_author'],
      $row['comic_image'],
      $row['create_at'],
      $row['description'],
		));
	}
	/**
	 * 
	 */
	class Comic 
	{
	
		function Comic($id,$name_image,$author,$avatar_author, $comic_image, $create_at, $description)
		{
			$this ->id = $id;
			$this ->name_image = $name_image;
			$this ->author = $author;
      $this ->avatar_author = $avatar_author;
      $this ->comic_image = $comic_image;
      $this ->create_at = $create_at;
      $this ->description = $description;
		}
	}
?>

<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <title>Comic</title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">AppGiaiTri</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item ">
                  <a class="nav-link" href="/NewAppGiaiTri/index.php">Humor <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" href="/NewAppGiaiTri/Comic/comic.php">Comic</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="/NewAppGiaiTri/Sport/sport.php">Sport</a>
               </li>
              
            </ul>
         </div>
      </nav>
      <div class="container">
         <div class="col-sm">
            <a type="button" class="btn btn-primary" href="/NewAppGiaiTri/Comic/comic_input.php">Post</a>
         </div>
         <div class="list-group">
            <?php foreach($comics as $comic) {?>
              <div class="card mb-3" style="max-width: 540px; min-height: 150px">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="http://localhost:8080/NewAppGiaiTri/uploads/comic/author/<?php echo $comic->avatar_author ?>" class="card-img" style="height: 100%;">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $comic->name_image ?></h5>
                    <p class="card-text"><?php echo $comic->description ?></p>
                    <p class="card-text"><small class="text-muted">create when: <?php echo $comic->create_at ?></small></p>
                    <a href="/NewAppGiaiTri/Comic/comic_detail.php" class="btn btn-primary">Go Detail</a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </body>
</html>
