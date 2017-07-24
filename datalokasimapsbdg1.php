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
    	$server="us-cdbr-azure-west-b.cleardb.com";
		$username="b619a5cf6e68dd";
		$password="e0153e39";
		$database="loker";
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
          echo 'Produk_Utama="' . parseToXML($row['Produk_Utama']) . '" ';
          echo 'Produk_Usaha="' . parseToXML($row['Produk_Usaha']) . '" ';
		   //echo 'Produk_Utama="' . $row['Produk_Utama'] . '" ';
          echo 'Latitude="' . $row['Latitude'] . '" ';
          echo 'Longitude="' . $row['Longitude'] . '" ';
         
          echo '/>';
     }
 
     // Akhir File XML (tag penutup node)
     echo '</markers>';
 
?>