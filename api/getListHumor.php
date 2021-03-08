<?php
	require "../connect.php";
	$result_per_page = 3;
	if(!isset($_GET['page'])){
	    $page = 1;
	} else {
	    $page = $_GET['page'];
	}
	
	$this_page_first_result = ($page-1)*$result_per_page;
	$sql = "SELECT * FROM humor order by create_at desc LIMIT " . $this_page_first_result . ',' . $result_per_page;
	$result = mysqli_query($conn, $sql);
	$listhomestay = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($listhomestay,new Humor(
			$row['id'],
			$row['title'],
			$row['image_url'],
			$row['content'],
			$row['create_at'],
		));
	}
	echo json_encode($listhomestay);

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