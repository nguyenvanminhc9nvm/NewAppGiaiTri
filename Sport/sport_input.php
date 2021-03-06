
<?php
   
   $msg = "";
   // If upload button is clicked ... 
 if (isset($_POST['upload'])) {
       require "../connect.php";
       $title = $_POST['title'];
       $description = $_POST['description'];

       $filenameTitle = $_FILES['imageTitle']['name'];
       $filenameTwo = $_FILES['image_two']['name'];
       $filenameThree = $_FILES['image_three']['name'];

       $tempFilenameTitle = $_FILES['imageTitle']['tmp_name'];
       $tempFilenameTwo = $_FILES['image_two']['tmp_name'];
       $tempFilenameThree = $_FILES['image_three']['tmp_name'];

       $folderTitle = '../uploads/sport/'.basename($filenameTitle);
       $folderTwo = '../uploads/sport/'.basename($filenameTwo);
       $folderThree = '../uploads/sport/'.basename($filenameThree);

       $date = date('Y-m-d H:i:s');
   
       // // Get all the submitted data from the form 
       $sql = "INSERT INTO sport VALUES (null, '$filenameTitle', '$title', '$description', '$date', '$filenameTwo', '$filenameThree')"; 
 
       // Execute query 
       if (mysqli_query($conn, $sql)) {
           echo "insert success";
       } else {
           echo("Error description: " . $conn -> error);
       }
         
       // Now let's move the uploaded image into the folder: image 
       move_uploaded_file($tempFilenameTitle, $folderTitle);
       

       move_uploaded_file($tempFilenameTwo, $folderTwo);
       
       move_uploaded_file($tempFilenameThree, $folderThree);
      
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
               <li class="nav-item ">
                   <a class="nav-link" href="/NewAppGiaiTri/Comic/comic.php">Comic</a>
               </li>
               <li class="nav-item active">
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
                           <label for="ipNameImage">Tiêu đề (<span id="spNameImage" class="text-danger">*</span>)</label>
                           <input class="form-control" id="ipNameImage" name="title" aria-describedby="titleHelp" placeholder="Nhập tiêu đề">
                           <small id="titleHelp" class="form-text text-muted d-none">Chưa nhập title</small>
                       </div>
                       <div class="form-group">
                           <label for="ipNameAuthor">Nội dung (<span id="spNameAuthor" class="text-danger">*</span>)</label>
                           <input class="form-control" id="ipNameAuthor" name="description" placeholder="Nhập nội dung" rows="3"></input>
                       </div>
                       <div class="form-group">
                           <label for="ipDescription">Ảnh bìa (<span id="spDescription" class="text-danger">*</span>)</label>
                           <input  type="file" id="ipDescription" name="imageTitle" class="form-control-file" ></input>
                       </div>
                       <div class="form-group">
                           <label for="ipAvatarAuthor">Ảnh 2 (<span id="spAvatarAuthor" class="text-danger">*</span>)</label>
                           <input type="file" name="image_two" class="form-control-file" id="ipAvatarAuthor" accept="image/*" />
                       </div>
                       <div class="form-group">
                           <label for="ipAvatarImage">Ảnh 3 (<span id="spAvatarImage" class="text-danger">*</span>)</label>
                           <input type="file" name="image_three" class="form-control-file" id="ipAvatarImage" accept="image/*" />
                       </div>
                       <div class="form-group">
                           <a href="/NewAppGiaiTri/Sport/sport.php" class="btn btn-danger">Back</a>
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