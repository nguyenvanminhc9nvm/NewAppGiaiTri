<?php
	require "../connect.php";
	$query = "SELECT * FROM decription_comic order by position desc";
	$data = mysqli_query($conn,$query);
	$comics = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($comics,new Comic(
			$row['id'],
			$row['image_url'],
         $row['position'],
		));
	}
	/**
	 * 
	 */
	class Comic 
	{
	
		function Comic($id,$image_url,$position)
		{
			$this ->id = $id;
			$this ->position = $position;
			$this ->image_url = $image_url;
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
      <title>Comic Detail</title>
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
            <a type="button" class="btn btn-primary" href="/NewAppGiaiTri/Comic/comic_description_input.php">Post</a>
         </div>
         <div class="list-group">
               <?php foreach($comics as $comic) { ?>
                  <div class="card bg-dark text-white" style="margin-bottom: 10px">
                     <img src="http://localhost:8080/NewAppGiaiTri/uploads/comic/image/detail/description/<?php echo $comic->image_url?>" class="card-img" alt="...">
                     </div>
             <?php } ?>
         </div>
      </div>
   </body>
</html>