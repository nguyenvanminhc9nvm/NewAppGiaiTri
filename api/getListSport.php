<?php
	require "../connect.php";
	$result_per_page = 10;
	if(!isset($_GET['page'])){
	    $page = 1;
	} else {
	    $page = $_GET['page'];
	}
	
	$this_page_first_result = ($page-1)*$result_per_page;
	$sql = "SELECT * FROM sport order by create_at desc LIMIT " . $this_page_first_result . ',' . $result_per_page;
	$result = mysqli_query($conn, $sql);
	$listhomestay = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($listhomestay,new Sport(
            $row['id'],
            $row['image_title'],
            $row['title'],
            $row['description'],
            $row['create_at'],
            $row['image_two'],
            $row['image_three'],
		));
	}
	echo json_encode($listhomestay);

		/**
	 * 
	 */
	class Sport 
	{
	
		function Sport($id,$image_title,$title,$description, $create_at, $image_two, $image_three)
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