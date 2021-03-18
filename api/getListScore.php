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
	echo json_encode($scores);
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