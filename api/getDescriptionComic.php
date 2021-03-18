
<?php
	require "../connect.php";
	$comicId = $_GET['comicId'];
	$sql = "SELECT * FROM decription_comic where comic_id='$comicId'";
	$result = mysqli_query($conn, $sql);
	$listhomestay = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($listhomestay,new Comic(
			$row['id'],
			$row['image_url'],
            $row['position'],
		));
	}
	echo json_encode($listhomestay);

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