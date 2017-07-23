<?php
 
     // Parsing Karakter-Karakter Khusus
     function parseToXML($htmlStr)
     {
          $xmlStr=str_replace('<','<',$htmlStr);
          $xmlStr=str_replace('>','>',$xmlStr);
          $xmlStr=str_replace('"','"',$xmlStr);
          $xmlStr=str_replace("'",'"',$xmlStr);
          $xmlStr=str_replace("&",'&',$xmlStr);
          return $xmlStr;
     }
 
    // Menghubungkan Koneksi dengan server MySQL, ganti bagian $username, $password, dan $database.
    	$server="127.0.0.1";
		$username="root";
		$password="";
		$database="new_atol";
	// isi nama host, username mysql, dan password mysql anda
		$link = mysqli_connect($server,$username,$password,$database);
 
		if(!$link){
			die('tidak terhubung '.mysqli_error());
		}
     // Memilih semua baris pada tabel 'markers2'
     	$query = "SELECT * FROM data_usaha";
     	$result = mysqli_query($link,$query);
     	if (!$result) {
          die('Invalid query: ' . mysqli_error());
        }
 
     // Header File XML
     header("Content-type: text/xml");
 
     // Parent node XML
     echo '<markers>';
 
     // Iterasi baris, masing-masing menghasilkan node-node XML
     while ($row = @mysqli_fetch_assoc($result)){
 
          // Menambahkan ke node dokumen XML
          echo '<marker ';
          echo 'Nama_Usaha="' . parseToXML($row['Nama_Usaha']) . '" ';
          echo 'Alamat="' . parseToXML($row['Alamat']) . '" ';
		   echo 'Produk_Utama="' . $row['Produk_Utama'] . '" ';
          echo 'Latitude="' . $row['Latitude'] . '" ';
          echo 'Longitude="' . $row['Longitude'] . '" ';
         
          echo '/>';
     }
 
     // Akhir File XML (tag penutup node)
     echo '</markers>';
 
?>