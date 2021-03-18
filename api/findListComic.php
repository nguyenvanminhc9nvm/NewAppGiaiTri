
<?php
	require "../connect.php";
    $result_per_page = 10;
    $name = $_GET['name'];
	if(!isset($_GET['page'])){
	    $page = 1;
	} else {
	    $page = $_GET['page'];
	}
	$this_page_first_result = ($page-1)*$result_per_page;
	$sql = "SELECT * FROM comic where name_image like '%$name%' order by create_at desc  LIMIT " . $this_page_first_result . ',' . $result_per_page;
	$result = mysqli_query($conn, $sql);
	$listhomestay = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($listhomestay,new Comic(
			$row['id'],
			$row['name_image'],
			$row['author'],
            $row['avatar_author'],
            $row['comic_image'],
            $row['create_at'],
            $row['description'],
		));
	}
	echo json_encode($listhomestay);

	/**
	 * 
	 */
	class Comic 
	{
	
		function Comic($id,$name_image,$author,$avatar_author, $comic_image, $create_at, $description)
		{
			$this ->id = $id;
			$this ->name_image = $name_image;
			$this ->author = $author;
            $this ->avatar_author = $avatar_author;
            $this ->comic_image = $comic_image;
            $this ->create_at = $create_at;
            $this ->description = $description;
		}
	}
?>