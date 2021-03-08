<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <title>Humor</title>
  <style>
    .card {
      margin-top: 20px;
    }
  </style>
</head>

<body>
<?php
	require "./connect.php";
	$query = "SELECT * FROM humor order by create_at desc";
	$data = mysqli_query($conn,$query);
	$humors = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($humors,new Humor(
			$row['id'],
			$row['title'],
			$row['image_url'],
      $row['content'],
      $row['create_at']
		));
	}
	/**
	 * 
	 */
	class Humor 
	{
	
		function Humor($id,$title,$image_url,$content, $create_at)
		{
			$this ->id = $id;
			$this ->title = $title;
			$this ->image_url = $image_url;
      $this ->content = $content;
      $this ->create_at = $create_at;
		}
	}
?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">AppGiaiTri</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/NewAppGiaiTri/index.php">Humor <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/NewAppGiaiTri/Comic/comic.php">Comic</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/NewAppGiaiTri/Sport/sport.php">Sport</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-sm">
      <?php foreach($humors as $humor) {?>
     <div class="card">
        <img class="card-img-top" src="http://localhost:8080/NewAppGiaiTri/uploads/<?php echo $humor->image_url?>" alt="Card image cap">
        <div class="card-body">
          <p class="card-text"><?php echo $humor->title?></p>
        </div>
     </div>
     <?php } ?>
      </div>
      <div class="col-sm">
        <a type="button" class="btn btn-primary" href="/NewAppGiaiTri/Humor/humor_input.php">Post</a>
      </div>
    </div>
  </div>
</body>

</html>