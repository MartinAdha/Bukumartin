<?php
require_once('tinsweb.php');

// berikut script untuk proses edit buku ke database
if(!empty($_POST['isbn'])){
    // menangkap data post
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $abstrak = $_POST['abstrak'];
    $isbn = $_POST['isbn'];

    $data[] = $isbn;
    $data[] = $judul;
    $data[] = $pengarang;
    $data[] = $jumlah;
    $data[] = $tanggal;
    $data[] = $abstrak;


    // simpan data buku

    $sql = 'UPDATE buku SET judul=?,pengarang=?,jumlah=?,tanggal=?,abstrak=? WHERE isbn=?';
    /**
     * @var $connection PDO
     */
    $row = $connection->prepare($sql);
    $row->execute($data);

    // redirect
    echo '<script>alert("Berhasil Edit Data");window.location="all.php"</script>';
}
// untuk menampilkan data barang berdasarkan isbn
$isbn = $_GET['isbn'];
$sql = "SELECT * FROM buku WHERE isbn=?";
$row = $connection->prepare($sql);
$row->execute(array($isbn));
$hasil = $row->fetch();
?>

