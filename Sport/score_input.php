
<?php
    $canUpload = 1;
   $msg = "";
   // If upload button is clicked ... 
 if (isset($_POST['upload'])) {
       require "../connect.php";
       $clubOne = $_POST['club_one'];
       $scoreClubOne = $_POST['score_one'];
       $imageClubOne = $_FILES['image_club_one']['name'];

       $clubTwo =  $_POST['club_two'];
       $scoreClubTwo = $_POST['score_club_two'];
       $imageClubTwo = $_FILES['image_club_two']['name'];

    
       $tempFilenameTwo = $_FILES['image_club_one']['tmp_name'];
       $tempFilenameThree = $_FILES['image_club_two']['tmp_name'];

       $folderTitle = '../uploads/sport/'.basename($imageClubOne);
       $folderTwo = '../uploads/sport/'.basename($imageClubTwo);

       $type = $_POST['type'];
   
       // // Get all the submitted data from the form 
       $sql = "INSERT INTO score VALUES (null, '$clubOne', '$scoreClubOne', '$imageClubOne', '$clubTwo', '$scoreClubTwo', '$imageClubTwo', '$type')"; 
 
       // Execute query 
       if (mysqli_query($conn, $sql)) {
           echo "insert success";
       } else {
           echo("Error description: " . $conn -> error);
       }
         
       // Now let's move the uploaded image into the folder: image 
       move_uploaded_file($tempFilenameTwo, $folderTitle);
       

       move_uploaded_file($tempFilenameTwo, $folderTwo);
       
      
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
                           <label for="ipNameImage">clb 1 (<span id="spNameImage" class="text-danger">*</span>)</label>
                           <input class="form-control" id="ipNameImage" name="club_one" aria-describedby="titleHelp" placeholder="Nhập tiêu đề">
                           <small id="titleHelp" class="form-text text-muted d-none">Chưa nhập title</small>
                       </div>
                       <div class="form-group">
                           <label for="ipAvatarAuthor">Ảnh 1 (<span id="spAvatarAuthor" class="text-danger">*</span>)</label>
                           <input type="file" name="image_club_one" class="form-control-file" id="ipAvatarAuthor" accept="image/*" />
                       </div>
                       <div class="form-group">
                           <label for="ipNameAuthor">tỉ số 1:(<span id="spNameAuthor" class="text-danger">*</span>)</label>
                           <input class="form-control" id="ipNameAuthor" name="score_one" placeholder="Nhập nội dung" rows="3"></input>
                       </div>
                       <div class="form-group">
                           <label for="ipNameImage">clb 2 (<span id="spNameImage" class="text-danger">*</span>)</label>
                           <input class="form-control" id="ipNameImage" name="club_two" aria-describedby="titleHelp" placeholder="Nhập tiêu đề">
                           <small id="titleHelp" class="form-text text-muted d-none">Chưa nhập title</small>
                       </div>
                       <div class="form-group">
                           <label for="ipAvatarImage">Ảnh 2 (<span id="spAvatarImage" class="text-danger">*</span>)</label>
                           <input type="file" name="image_club_two" class="form-control-file" id="ipAvatarImage" accept="image/*" />
                       </div>
                       <div class="form-group">
                           <label for="ipNameAuthor">tỉ số 2: (<span id="spNameAuthor" class="text-danger">*</span>)</label>
                           <input class="form-control" id="ipNameAuthor" name="score_club_two" placeholder="Nhập nội dung" rows="3"></input>
                       </div>
                       <div class="dropdown">
                        <select class="form-select" name="type" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Ngoai hang anh</option>
                            <option value="2">Tay ban nha</option>
                        </select>
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