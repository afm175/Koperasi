<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Simpan Data</title>
</head>
<body>
<h2> Simpan Data Tanpa Database</h2>
<table>
<form method="post" action="">
    <tr><td>Nama</td><td><input type="text" name="nama" style="width:300px"></td></tr>
    <tr><td>Isi</td><td><input type="number" name="data" style="width:300px"></input></td></tr>
    <tr><td></td><td><input type="submit" name="ok" value="Simpan"></td></tr>
</form>
<?php
if(isset($_POST['ok'])){
    if(empty($_POST['nama']) || empty($_POST['data'])){
        print "Lengkapi form";
    }else{
        $nama=$_POST['nama'];
        $data=$_POST['data'];
        $data2 = (int)$data;
        $data1 = '45';
        $tanggal=date("h:i:s");
        $buka=fopen("hasil.html",'a');
        fwrite($buka,"nama : ${nama} <br> ");
        fwrite($buka,"dibuat : ${tanggal} <br> ");
        fwrite($buka," isi : ${data} <br> ");
        fwrite($buka,"<hr>");
        fclose($buka);
        print "data berhasil disimpan";
        echo $nama;
        echo $data;
        echo "a is ". $data2;
        echo "a is ". is_int($data2);
    }
}?>
</table>
</body>
</html>


