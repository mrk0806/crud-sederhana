<?php
include "koneksi.php";
$nama = @$_POST['nama'];
$tgl_lahir = @$_POST['tgl_lahir'];
$jk = @$_POST['jk'];
$alamat = @$_POST['alamat'];
$telp = @$_POST['telp'];
$id = @$_POST['id'];

if(@$_GET['page']=='tambah'){
   $insert = $db->prepare("insert into tbl_anggota(nama,tgl_lahir,jk,alamat,telp) values(?,?,?,?,?)");

   $insert->bindParam(1, $nama);
   $insert->bindParam(2, $tgl_lahir);
   $insert->bindParam(3, $jk);
   $insert->bindParam(4, $alamat);
   $insert->bindParam(5, $telp);
   $insert->execute();

   if($insert->rowCount()>0){
    echo "sukses";
   }

   

}else if(@$_GET['page']=='edit'){
   $edit = $db->prepare("update tbl_anggota set nama=?, tgl_lahir=?, jk=?,alamat=?,telp=? where id=?");
   $edit->execute(array($nama,$tgl_lahir,$jk,$alamat,$telp,$id)); 

   if($edit->rowCount()>0){
    echo "sukses";
   }
}else if(@$_GET['page']=='hapus'){
   $del = $db->prepare("delete from tbl_anggota where id=:id");
   $del->bindParam(":id", $id);
   $del->execute();

   if($del->rowCount()>0){
    echo "sukses";
   }
}

?>