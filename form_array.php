<?php
if(isset($_POST['btnOk'])){
  $nim = $_POST['nim'];
  $nama= $_POST['nama'];
  $telp= $_POST['telp'];
  foreach($nim as $key => $val){
    echo 'Nomor Induk = '.$nim[$key].' Nama = '.$nama[$key].' Telp = '.$telp[$key].'<br/>';
  }
}
if(isset($_POST['btnSave'])){
  $array = array();
  $nim = $_POST['nim'];
  $nama= $_POST['nama'];
  $telp= $_POST['telp'];

  foreach($nim as $key => $val){
    $anim=$nim[$key];
    $anama=$nama[$key];
    $atelp=$telp[$key];
    $pushArr=array("nim`" => $anim,'nama'=>$anama,'telp'=>$atelp);
    array_push($array,$pushArr);
  }
  file_put_contents('file_saya.txt', serialize($array));
}

if(isset($_POST['btnRetrieve'])){
  $array = unserialize(file_get_contents('file_saya.txt'));
  var_dump($array);
}
?>
<form method="get" name="frm" action="">
  Masukan Jumlah Baris :<input name="jumlah" type="text" />
  <input type="submit" name="btnJumlah" value="Ok" />
</form>

<form method="post" name="frmpost" action="">
  <table width="547" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr>
      <td width="32" height="22" valign="top">No</td>
      <td width="114" valign="top">NIM</td>
      <td width="240" valign="top">Nama</td>
      <td width="161" valign="top">Telp</td>
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
      <td><input name="nim[]" type="text" size="10" /></td>
      <td><input name="nama[]" type="text" size="30" /></td>
      <td><input type="text" name="telp[]" /></td>
    </tr>
    <?php
    }
    ?>
    <tr>
      <td height="23" colspan="4" align="right"><input type="submit" name="btnOk" value="Simpan" /></td>
      <td><input type="submit" name="btnSave" value="Simpan->File" /></td>
      <td><input type="submit" name="btnRetrieve" value="Retrieve->File" /></td>
    </tr>
  </table>
</form>
</TR>