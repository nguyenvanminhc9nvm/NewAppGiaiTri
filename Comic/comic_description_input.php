
<?php
   
   $msg = "";
   // If upload button is clicked ... 
 if (isset($_POST['upload'])) {
       require "../connect.php";
       $position = $_POST['position'];
       $comic_id = $_POST['comicId'];
       $filenameImage = $_FILES['comic_image']['name'];
       $tempFilenameImage = $_FILES['comic_image']['tmp_name'];
       $folderImage = '../uploads/comic/image/detail/description/'.basename($filenameImage);
       $date = date('Y-m-d H:i:s');
   
       // // Get all the submitted data from the form 
       $sql = "INSERT INTO decription_comic VALUES (null, '$filenameImage', '$position', '$comic_id')"; 
 
       // Execute query 
       if (mysqli_query($conn, $sql)) {
           echo "insert success";
       } else {
           echo("Error description: " . $conn -> error);
       }

       if (move_uploaded_file($tempFilenameImage, $folderImage))  { 
            echo $filenameImage;
        } else { 
            echo " Failed to upload image"; 
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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
       integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <title>Comic Input</title>
   <script>
       
   </script>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <a class="navbar-brand" href="#">AppGiaiTri</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav mr-auto">
               <li class="nav-item">
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
       <div class="row">
           <div class="col-md-6">
               <h1>Comic Input</h1>
           </div>
       </div>
       <div class="row">
           <div class="col-md-6">
               <div class="bd-example">
                   <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="ipNameImage">Comic Id (<span id="spNameImage" class="text-danger">*</span>)</label>
                           <input class="form-control" id="ipNameImage" name="comicId" aria-describedby="titleHelp" placeholder="Nhập tiêu đề">
                           <small id="titleHelp" class="form-text text-muted d-none">Chưa nhập title</small>
                       </div>
                       <div class="form-group">
                           <label for="ipNameImage">position (<span id="spNameImage" class="text-danger">*</span>)</label>
                           <input class="form-control" id="ipNameImage" name="position" aria-describedby="titleHelp" placeholder="Nhập tiêu đề">
                           <small id="titleHelp" class="form-text text-muted d-none">Chưa nhập title</small>
                       </div>
                       <div class="form-group">
                           <label for="ipAvatarImage">Ảnh truyện (<span id="spAvatarImage" class="text-danger">*</span>)</label>
                           <input type="file" name="comic_image" class="form-control-file" id="ipAvatarImage" accept="image/*" />
                       </div>
                       <div class="form-group">
                           <a href="/NewAppGiaiTri/Comic/comic.php" class="btn btn-danger">Back</a>
                           <button type="submit" class="btn btn-primary" name="upload">Submit</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
       <!-- /.container -->
   </div>
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
</body>

</html>