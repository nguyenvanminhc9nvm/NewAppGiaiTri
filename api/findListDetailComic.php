
<?php
	require "../connect.php";
	$result_per_page = 10;
	$name = $_GET['name'];
	$comicId = $_GET['comicId'];
	if(!isset($_GET['page'])){
	    $page = 1;
	} else {
	    $page = $_GET['page'];
	}
	$this_page_first_result = ($page-1)*$result_per_page;
	$sql = "SELECT * FROM detail_comic where comic_id='$comicId' and name_comic like '%$name%' order by create_at desc  LIMIT " . $this_page_first_result . ',' . $result_per_page;
	$result = mysqli_query($conn, $sql);
	$listhomestay = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($listhomestay,new Comic(
			$row['id'],
			$row['comic_id'],
			$row['image_url'],
            $row['description'],
			$row['create_at'],
			$row['name_comic'],
		));
	}
	echo json_encode($listhomestay);

	/**
	 * 
	 */
	class Comic 
	{
	
		function Comic($id,$comic_id,$image_url,$description, $create_at, $name_comic)
		{
			$this ->id = $id;
			$this ->comic_id = $comic_id;
			$this ->image_url = $image_url;
            $this ->description = $description;
			$this ->create_at = $create_at;
			$this ->name_comic = $name_comic;
		}
	}
?>