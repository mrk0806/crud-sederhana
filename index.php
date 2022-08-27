<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar CRUD PDO</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;

        }
        div{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div><button id="tambahdata">Tambah</button></div>
    <div class="" id="tampildata">
        <?php include 'tampil.php'; ?>
    </div> 
    <div class="cruddata"></div>
    <script src="./jquery-3.6.1.js"></script>
    <script>
        $("#tambahdata").click(function(){
            $(".cruddata").hide().load("tambah.php").fadeIn(1000);
        });

        $(".cruddata").on("click","#simpantambah",function(){
            let nama = $("#nama").val();
            let tgl_lahir = $("#tgl_lahir").val();
            let jk = $("#jk").val();
            let alamat = $("#alamat").val();
            let telp = $("#telp").val();
            // console.info(tgl_lahir);

            if(nama == ""||tgl_lahir==""|| jk==""||alamat==""||telp ==""){
                alert("Inputan tidak boleh kosong");
            }else{
                $.ajax({
                    url:'proses.php?page=tambah',
                    type:'post',
                    data : ` nama=${nama} &tgl_lahir=${tgl_lahir} &jk=${jk} &alamat=${alamat} &telp=${telp}`,
                    // data : 'nama='+nama+'&jk='+jk+'&alamat='+alamat+'&telp'+telp,
                    success:function(msg){
                        if(msg =='sukses'){
                            $("#tampildata").load("tampil.php");
                            $(".cruddata").hide();
                        }else{
                            alert("Gagal Menambahkan Data");
                        }
                    }
                });
            }
        });

        $("#tampildata").on("click",".edit",function(){
            let id= $(this).attr("id");
                $.ajax({
                    url:'edit.php',
                    type:'post',
                    data : `id=${id}`,
                    success:function(msg){
                        $(".cruddata").hide().fadeIn(1000).html(msg);
                    }
                });
            
        });

        
        $("#tampildata").on("click",".hapus",function(){
            let id= $(this).attr("id");
            let con = confirm("Apakah anda yakin?");
            if(con){

                $.ajax({
                    url:'proses.php?page=hapus',
                    type:'post',
                    data : `id=${id}`,
                    success:function(msg){
                        if(msg =='sukses'){
                            $("#tampildata").load("tampil.php");
                            $(".cruddata").hide();
                        }else{
                            alert("Gagal Hapus Data");
                        }
                    }
                });
            }
            
        });
        $(".cruddata").on("click","#cancel",function(){
            $(".cruddata").hide();
        })
        $(".cruddata").on("click","#simpanedit",function(){
            let nama = $("#nama").val();
            let tgl_lahir = $("#tgl_lahir").val();
            let jk = $("#jk").val();
            let alamat = $("#alamat").val();
            let telp = $("#telp").val();
            let id =$("#id_anggota").val();
            // console.info(tgl_lahir);

            if(nama == ""||tgl_lahir==""|| jk==""||alamat==""||telp ==""){
                alert("Inputan tidak boleh kosong");
            }else{
                $.ajax({
                    url:'proses.php?page=edit',
                    type:'post',
                    data : ` nama=${nama} &tgl_lahir=${tgl_lahir} &jk=${jk} &alamat=${alamat} &telp=${telp} &id=${id}`,
                    // data : 'nama='+nama+'&jk='+jk+'&alamat='+alamat+'&telp'+telp,
                    success:function(msg){
                        if(msg =='sukses'){
                            $("#tampildata").load("tampil.php");
                            $(".cruddata").hide();
                        }else{
                            alert("Gagal Edit Data");
                        }
                    }
                });
            }
        });

    </script>
</body>
</html>