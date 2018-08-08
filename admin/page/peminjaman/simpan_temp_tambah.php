<?php
  $conn = mysqli_connect('localhost','root','','perpustakaanpc');

  // $isbn = $_GET['isbn'];
  // $judul = $_REQUEST['judul'];
  // $pengarang = $_REQUEST['pengarang'];
  // $penerbit = $_REQUEST['penerbit'];
  // $tahun_terbit = $_REQUEST['tahun_terbit'];
  // $jumlah_buku = $_REQUEST['jumlah_buku'];
  // $lokasi = $_REQUEST['lokasi'];

//   INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country)
//   SELECT SupplierName, ContactName, Address, City, PostalCode, Country FROM Suppliers;
//
//
//   INSERT INTO Customers (CustomerName, City, Country)
// SELECT SupplierName, City, Country FROM Suppliers
// WHERE Country='Germany';
$kode_buku = mysqli_escape_string($conn, $_POST['kode_buku']);
$isbn = substr($kode_buku, 0, 5);

  $sql = "INSERT INTO tb_temp_buku (isbn,judul,pengarang,penerbit,tahun_terbit,jumlah_buku,lokasi)
          SELECT isbn,judul,pengarang,penerbit,tahun_terbit,jumlah_buku,lokasi
          FROM tb_detil_buku
          WHERE isbn = $isbn";
  $sql2 = "INSERT INTO tb_temp_buku (kode_buku,isbn,judul,pengarang,penerbit,tahun_terbit,lokasi)
          SELECT t1.kode_buku,t1.isbn,t1.judul,t1.pengarang,t1.penerbit,t1.tahun_terbit,t1.lokasi
          FROM tb_detil_buku t1
          LEFT JOIN tb_buku t2 ON t1.isbn = t2.isbn
          WHERE t1.isbn = '$isbn' AND t1.kode_buku = '$kode_buku'";
  $sql3 = "INSERT INTO tb_temp_buku (kode_buku,isbn,judul,pengarang,penerbit,tahun_terbit,lokasi)
          SELECT kode_buku,isbn,judul,pengarang,penerbit,tahun_terbit,lokasi
          FROM tb_detil_buku
          WHERE kode_buku = '$kode_buku' AND status_pinjam = 'kembali'";

  $conn->query($sql3);

  $sql4 = $conn->query("SELECT * FROM tb_temp_buku");
  while ($data = $sql4->fetch_assoc()) {
    $kode_buku2 = $data['kode_buku'];
    $conn->query("UPDATE tb_detil_buku SET status_pinjam = 'pinjam'
                  WHERE kode_buku = '$kode_buku2'");
  }
?>
