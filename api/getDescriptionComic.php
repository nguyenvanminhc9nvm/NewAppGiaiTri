
<?php
	require "../connect.php";
	$result_per_page = 10;
	if(!isset($_GET['page'])){
	    $page = 1;
	} else {
	    $page = $_GET['page'];
	}
	$this_page_first_result = ($page-1)*$result_per_page;
	$sql = "SELECT * FROM decription_comic  LIMIT " . $this_page_first_result . ',' . $result_per_page;
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