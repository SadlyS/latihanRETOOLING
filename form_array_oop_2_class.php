<?php
	class operasional
	{
		function simpan_data($new_nim, $new_nama, $new_telp, $nama_file) { 
			  echo "====================================================<br />";
			  $array = array();
			  foreach($new_nim as $key => $val){
					$pushArr = array('nim'=>$new_nim[$key], 'nama'=>$new_nama[$key], 'telp'=>$new_telp[$key]);
					array_push($array,$pushArr);
			  }
			  file_put_contents($nama_file, serialize($array));
			  echo "====================================================<br />";
		}
		function tampil_data($new_nim, $new_nama, $new_telp) { 
			  echo "====================================================<br />";
			  foreach($new_nim as $key => $val){
				echo 'NIM = '.$new_nim[$key].', Nama = '.$new_nama[$key].', Telp = '.$new_telp[$key].'<br/>';
			  }
			  echo "====================================================<br />";
		}
	}
	class runfile
	{
		function retrieve($file_saya) {
			 echo "====================================================<br />";
			 $array = unserialize(file_get_contents($file_saya));
			 var_dump($array);
			 echo "<br />====================================================<br />";
		}
	}
?>

<?php 
	$nama_file = 'file_saya.txt';
	if(isset($_POST['btnOk']))
	{
		$nim  = $_POST['nim'];
		$nama = $_POST['nama'];
		$tlp  = $_POST['telp'];
		// BUAT OBJEK BARU BRO
		$OBJEK_BARU = new operasional();
		//[ANGGIL METHOD "OK" BRO
		$OBJEK_BARU -> tampil_data($nim, $nama, $tlp);
	}
	
	if(isset($_POST['btnSave']))
	{
		$nim   = $_POST['nim'];
	    $nama  = $_POST['nama'];
	    $telp  = $_POST['telp'];
		// BUAT OBJEK BARU BRO
		$OBJEK_BARU = new operasional();
		// PANGGIL METHOD "SAVE" BRO
		$OBJEK_BARU -> simpan_data($nim, $nama, $telp, $nama_file);
	}
	
	if(isset($_POST['btnRetrieve'])){
		// BUAT OBJEK BARU BRO
		$OBJEK_BARU = new runfile();
		// PANGGIL METHOD "retrieve" BRO
		$OBJEK_BARU -> retrieve($nama_file);
	}
?> 


<br />
<form method="get" name="frm" action="">
  Masukan Jumlah Baris : <input name="jumlah" type="text" /> <input style="background-color:#CC6600; font-size:18px" type="submit" name="btnJumlah" value="Ok" />
</form>

<form method="post" name="frmpost" action="">
  <table width="547" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr>
      <td width="25" height="22" valign="top">No</td>
      <td width="93" valign="top">NIM</td>
      <td width="238" valign="top">Nama</td>
      <td width="157" valign="top">Telp</td>
    </tr>
    <?php
    if(isset($_GET['jumlah']) && $_GET['jumlah']>0){
      $jumlah_form = $_GET['jumlah'];
    }
    else{
      $jumlah_form = 1;
    }
    for($i=1; $i<=$jumlah_form; $i++){
      ?>
    <tr>
      <td height="23"><?php echo $i; ?></td>
      <td><input name="nim[]"  type="text" size="10" /></td>
      <td><input name="nama[]" type="text" size="30" /></td>
      <td><input name="telp[]" type="text" /></td>
    </tr>
    <?php
    }
    ?>
    
	<tr>
      <td colspan="5" height="10"></td>
    </tr>
	
	<tr>
      <td></td>
	  <td colspan="3">
	  <input style="background-color:#CCCCCC; font-size:18px" type="submit" name="btnOk" value="VIEW" /> 
	  <input style="background-color:#3399CC; font-size:18px"type="submit" name="btnSave" value="Simpan->File" />
	  <input style="background-color:#66FFCC; font-size:18px"type="submit" name="btnRetrieve" value="Retrieve->File" />
	  </td>
    </tr>
  </table>
</form>
</tr>