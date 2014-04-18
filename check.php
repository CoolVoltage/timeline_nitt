<pre>
<?php
print_r($_POST);
print_r($_FILES);
?>
</pre>
<?php
		date_default_timezone_set("Asia/Kolkata");
		include 'tmp.php';

		function gete($s){
			$sp = explode(" ", $s);
			//$sq = explode("-", $sp[0]);
			//$sr = explode(":", $sp[1]);
			//$r =  date("Y-m-d H:i:s", mktime($sr[0], $sr[1], 0, $sq[1], $sq[2], $sp[0]));
			echo $sp[1];
			echo "<br>";
			echo "<br>";
			echo $sp[0];
			$r = $sp[1] . $sp[0];
			echo $r;
			echo "<br>";
			return $r;
		}

		$title = isset($_POST['title']) ? $_POST['title'] : null;
		$sdate  = isset($_POST['date']) ? $_POST['date'] : null;
		$edate = isset($_POST['edate']) ? $_POST['edate'] : null;
		$descp  = isset($_POST['desc']) ? $_POST['desc'] : null;

		$prim  = isset($_POST['primary']) ? $_POST['primary'] : null;
		$seco  = isset($_POST['secondary']) ? $_POST['secondary'] : null;

    if($title == null or $sdate == null or $descp == null or $edate == null or $prim == null or $seco == null ){
			echo "Please Fill in All Details";
			die();
    }else{
	    $con = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
	    $result = mysqli_query($con,"INSERT INTO `content_data`(`content_title`, `content_desc`, `content_start`, `content_end`, `content_revision_history`, `content_updated_by`, `content_modified_on`, `content_created_on`) VALUES ('{$title}','{$descp}','{$sdate}','{$edate}','1','1','{$edate}','{$edate}')") or die(mysqli_error($con));
	    $content_id = mysqli_insert_id($con);
	    $result = mysqli_query($con,"INSERT INTO `timeline_tags`(`tag_name`,`tag_description`) VALUES('{$prim}','primary')");
	    $primary_id = mysqli_insert_id($con);
	    $result = mysqli_query($con,"INSERT INTO `timeline_tags`(`tag_name`,`tag_description`) VALUES('{$seco}','secondary')");
	    $secondary_id = mysqli_insert_id($con);
	    $result = mysqli_query($con,"INSERT INTO `content_manage_tags`(`content_id`,`tag_id`) VALUES('{$content_id}','{$primary_id}')");	   
	    $result = mysqli_query($con,"INSERT INTO `content_manage_tags`(`content_id`,`tag_id`) VALUES('{$content_id}','{$secondary_id}')")
		    or die(mysqli_error($con));
	    $array_string = "var array = [";
	    foreach($_FILES["photo"]["name"] as $key => $value){
		    if($_FILES["photo"]["error"][$key]!=1){
			    move_uploaded_file($_FILES["photo"]["tmp_name"][$key],"./files/".$content_id."_".$key);
			    $array_string .= "'./files/".$content_id."_".$key."',";
		    }
	    }
	    $array_string .= "NULL];";
//	    echo $array_string;
	    $file = fopen("./js/".$content_id.".js",'w');
	    echo fwrite($file,$array_string);
	    fclose($file);
			}

?>
