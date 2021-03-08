<?php
	require "./connect.php";
	$query = "SELECT * FROM humor";
	$data = mysqli_query($conn,$query);
	$humors = array();
	while ($row = mysqli_fetch_assoc($data)) {
		array_push($humors,new Humor(
			$row['id'],
			$row['title'],
			$row['image_url'],
			$row['content']
		));
	}
	echo json_encode($humors);

	/**
	 * 
	 */
	class Humor 
	{
	
		function Humor($id,$title,$image_url,$content)
		{
			$this ->id = $id;
			$this ->title = $title;
			$this ->image_url = $image_url;
			$this ->content = $content;
		}
	}
?>