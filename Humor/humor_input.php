
<?php
   
    $msg = "";
    // If upload button is clicked ... 
  if (isset($_POST['upload'])) {
        require "../connect.php";
        $titles = $_POST['title'];
        $content = $_POST['content'];
        $filename = $_FILES['image']['name']; 
        $tempname = $_FILES['image']['tmp_name'];     
        $folder = '../uploads/humor'.basename($filename);
        $date = date('Y-m-d H:i:s');
    
        // // Get all the submitted data from the form 
        $sql = "INSERT INTO humor VALUES (null, '$titles', '$filename', '$content', '$date')"; 
  
        // Execute query 
        if (mysqli_query($conn, $sql)) {
            echo "insert success";
        } else {
            echo("Error description: " . $conn -> error);
        }
          
        // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            echo $filename;
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

    <title>Hello, world!</title>
    <script>
        function validateForm() {
            var input = document.getElementsByTagName("input");
            var dlsp = document.getElementsByTagName("span");
            var textarea = document.getElementsByTagName("textarea");
            for (var i = 0; i < input.length; i++) {
                if (input[i].value.charAt(0) == " ") {
                    dlsp[i].innerHTML = "(*) Dữ Liệu không hợp lệ";
                    input[i].style.border = "1px solid red";
                    return false
                } else {
                    dlsp[i].innerHTML = "";
                    input[i].style.border = "1px solid green";
                }
                if (input[0].value == "") {
                    dlsp[0].innerHTML = "(*) Nhập đủ dữ liệu";
                    input[0].style.border = "1px solid red";
                    return false
                } else {
                    dlsp[0].innerHTML = "";
                    input[0].style.border = "1px solid green";
                }
                if (input[2].value == "") {
                    dlsp[2].innerHTML = "(*) Nhập đủ dữ liệu";
                    input[2].style.border = "1px solid red";
                    return false
                } else {
                    dlsp[2].innerHTML = "";
                    input[2].style.border = "1px solid green";
                }
                if (input[1].value == "") {
                    dlsp[1].innerHTML = "(*) Nhập đủ dữ liệu";
                    input[1].style.border = "1px solid red";
                    return false
                } else {
                    dlsp[1].innerHTML = "";
                    input[1].style.border = "1px solid green";
                }
                if (100 < input[1].value.length < 0) {
                    dlsp[1].innerHTML = "(*) Số tầng không hợp lệ";
                    input[1].style.border = "1px solid red";
                    return false
                } else {
                    dlsp[1].innerHTML = "";
                    input[1].style.border = "1px solid green";
                }
                if (input[3].files.length == 0) {
                    dlsp[3].innerHTML = "(*) Vui lòng chọn 1 tệp ảnh";
                    return false
                } else {
                    dlsp[3].innerHTML = "";
                }
            }
            for (var i = 0; i < textarea.length; i++) {
                if (textarea[i].value == "") {
                    dlsp[4].innerHTML = "(*) Nhập đủ dữ liệu";
                    textarea[i].style.border = "1px solid red";
                    return false
                } else {
                    dlsp[4].innerHTML = "";
                    textarea[i].style.border = "1px solid green";
                }
            }
        }
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
                <li class="nav-item active">
                    <a class="nav-link" href="/NewAppGiaiTri/index.php">Humor <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/NewAppGiaiTri/Comic/comic.php">Comic</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/NewAppGiaiTri/Sport/sport.php">Sport</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/NewAppGiaiTri/Tech/tech.php">Tech</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Humor Input</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="bd-example">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputTitle">Tiêu đề (<span class="text-danger">*</span>)</label>
                            <input class="form-control" id="inputTitle" name="title" aria-describedby="titleHelp" placeholder="Nhập tiêu đề">
                            <small id="titleHelp" class="form-text text-muted d-none">Chưa nhập title</small>
                        </div>
                        <div class="form-group">
                            <label for="inputContent">Nội dung</label>
                            <textarea class="form-control" id="inputContent" name="content" placeholder="Nhập nội dung" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputImage">Chọn ảnh</label>
                            <input type="file" name="image" class="form-control-file" id="inputImage" accept="image/*" />
                        </div>
                        <div class="form-group">
                            <a href="/NewAppGiaiTri/index.php" class="btn btn-danger">Back</a>
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