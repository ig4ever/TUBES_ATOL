<?php  

	//require "../../php/connection.php";

	$mysql_host = "us-cdbr-azure-west-b.cleardb.com";
	$mysql_user = "b619a5cf6e68dd";
	$mysql_pass = "e0153e39";
	$mysql_database = "loker";
	$backup_folder = "../backup";
	$name = 'new_atol'.date("YmdHis").'.sql';

	$koneksi = mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
	if(!$koneksi){
		echo "koneksi gagal";
	}
	if(function_exists('exec')) {
		echo "fungsi exec sudah aktif";
	}

	$target_file = basename($_FILES["file_db"]["name"]);

	exec("mysql -h $mysql_host -u $mysql_user $mysql_database < $backup_folder/$target_file ", $results, $result_value);

	echo "<script language=javascript>alert('Sukses Restore Database $target_file');</script>";
	echo "<script language=javascript>document.location.href='../dashboard.php'</script>";
?>