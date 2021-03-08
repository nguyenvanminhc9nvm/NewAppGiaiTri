<!-- sport -->
<?php
	require "../connect.php";
	$query = "SELECT * FROM sport";
	$data = mysqli_query($conn,$query);
	$humors = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($humors,new Humor(
			$row['id'],
      $row['image_title'],
      $row['title'],
			$row['description'],
      $row['create_at'],
      $row['image_two'],
      $row['image_three'],
		));
	}
	/**
	 * 
	 */
	class Humor 
	{
	
		function Humor($id,$image_title,$title,$description, $create_at, $image_two, $image_three)
		{
			$this ->id = $id;
			$this ->image_title = $image_title;
			$this ->title = $title;
      $this ->description = $description;
      $this ->create_at = $create_at;
      $this ->image_two = $image_two;
      $this ->image_three = $image_three;
		}
	}
?>
<!-- score -->
<?php
	require "../connect.php";
	$query = "SELECT * FROM score";
	$data = mysqli_query($conn,$query);
	$scores = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($scores,new Score(
			$row['id'],
      $row['club_one'],
      $row['score_club_one'],
			$row['image_club_one'],
      $row['club_two'],
      $row['score_club_two'],
      $row['image_club_two'],
      $row['type'],
		));
	}
	/**
	 * 
	 */
	class Score 
	{
	
		function Score($id, $club_one, $score_club_one, $image_club_one, $club_two, $score_club_two, $image_club_two, $type)
		{
			$this ->id = $id;
			$this ->club_one = $club_one;
			$this ->score_club_one = $score_club_one;
      $this ->image_club_one = $image_club_one;
      $this ->club_two = $club_two;
      $this ->score_club_two = $score_club_two;
      $this ->image_club_two = $image_club_two;
      $this ->type = $type;
		}
	}
?>
<!-- view -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>Sport</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">AppGiaiTri</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/NewAppGiaiTri/index.php">Humor <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
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
                <div class="col">
                    <div class="col-sm">
                        <a type="button" class="btn btn-primary" href="/NewAppGiaiTri/Sport/sport_input.php">Post news</a>
                    </div>
                    <hr />
                    <div class="col-sm">
                        <a type="button" class="btn btn-primary" href="/NewAppGiaiTri/Sport/score_input.php">Post score</a>
                    </div>
                    <hr />
                    <div class="list-group">
                        <?php foreach($humors as $humor) {?>
                        <div class="card mb-3" style="max-width: 540px; min-height: 150px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="http://localhost:8080/NewAppGiaiTri/uploads/sport/<?php echo $humor->image_title ?>" class="card-img" style="height: 100%;" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $humor->title ?></h5>
                                        <p class="card-text"><?php echo $humor->description ?></p>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                create when:
                                                <?php echo $humor->create_at ?>
                                            </small>
                                        </p>
                                        <a href="/NewAppGiaiTri/Comic/comic_detail.php" class="btn btn-primary">Go Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col">
                    <?php foreach($scores as $score) {?>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <button type="button" class="btn btn-outline-primary"><?php echo $score->club_one ?></button>
                        </div>
                        <div class="col"><?php echo $score->score_club_one ?></div>
                        <div class="col">:</div>
                        <div class="col"><?php echo $score->score_club_two ?></div>
                        <div class="col">
                            <button type="button" class="btn btn-outline-danger"><?php echo $score->club_two ?></button>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>

