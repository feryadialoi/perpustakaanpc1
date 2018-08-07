var anggotaR = document.getElementById('anggotaRecord');
var bukuR = document.getElementById('bukuRecord');
var transaksiR = document.getElementById('transaksiRecord');

var containerAnggota = document.getElementById('container-table-anggota');
var containerBuku = document.getElementById('container-table-buku');
var containerTransaksi = document.getElementById('container-table-transaksi');

// anggotaR.addEventListener('keyup', function(){
//   //buat objeck ajax
//   var xhr = new XMLHttpRequest();
//   //cek kesiapan ajax
//   xhr.onreadystatechange = function() {
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       console.log('OK');
//       containerAnggota.innerHTML = xhr.responseText;
//     }
//   }
//   //eksekusi ajax
//   xhr.open('GET','../assets/js/ajax/tableAnggota.php?anggotaR=' + anggotaR.value,true);
//   xhr.send();
// });

bukuR.addEventListener('keyup', function(){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
      console.log('OK');
      containerBuku.innerHTML = xhr.responseText;
    }
  }
  xhr.open('GET','../assets/js/ajax/tableBuku.php?bukuR=' + bukuR.value,true);
  xhr.send();
});

// transaksiR.addEventListener('keyup', function(){
//   var xhr = new XMLHttpRequest();
//   xhr.onreadystatechange = function(){
//     if (xhr.readyState == 4 && xhr.status == 200) {
//       console.log('OK');
//       containerTransaksi.innerHTML = xhr.responseText;
//     }
//   }
//   xhr.open('GET','../assets/js/ajax/tableTransaksi.php?transaksiR=' + transaksiR.value,true);
//   xhr.send();
// });
