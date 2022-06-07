<?php
require_once('tinsweb.php');

// berikut script untuk proses tambah barang ke database
if(!empty($_POST['isbn'])){
    // menangkap data post
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $abstrak = $_POST['abstrak'];

    $data[] = $isbn;
    $data[] = $judul;
    $data[] = $pengarang;
    $data[] = $jumlah;
    $data[] = $tanggal;
    $data[] = $abstrak;
    // simpan data barang

    $sql = 'INSERT INTO buku (isbn,judul,pengarang,jumlah,tanggal,abstrak)VALUES (?,?,?,?,?,?)';
    /**
     * @var $connection PDO
     */
    $row = $connection->prepare($sql);
    $row->execute($data);

    // redirect
    echo '<script>alert("Berhasil Tambah Data");window.location="all.php"</script>';
}
?>

