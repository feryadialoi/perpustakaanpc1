<script>


// <!-- ajax hapus anggota bootstrap modal -->
$(document).ready(function(){
		$('.hapus_data_anggota').click(function(e){
			e.preventDefault();
			var pnis = $(this).attr('data-id');
			var pnama = $(this).attr('data-nama');
			var parent = $(this).parent("td").parent("tr");

			bootbox.dialog({
			  message: "Anda Yakin Hapus Anggota <br> NIS : "
				+pnis+"<br> Nama : "+pnama+" ?",
			  title: "<i class='material-icons'>delete</i> Hapus",
			  buttons: {
				danger: {
				  label: "Hapus",
				  className: "btn-danger",
				  callback: function() {
            $.ajax({
						  type: 'POST',
						  url: './page/anggota/hapus.php',
              data: {
                'nis': pnis
              }
					  })
					  .done(function(response){
						  bootbox.alert('Data Berhasil Dihapus!');
						  parent.fadeOut('slow');
					  })
					  .fail(function(){
						  bootbox.alert('Ada yang salah...');
					  })
				  }
				},
        success: {
				  label: "Batal",
				  className: "btn-primary",
				  callback: function() {
					 $('.bootbox').modal('hide');
				  }
				}
			  }
			});
		});
	});

// <!-- ajax hapus buku bootstrap modal -->
$(document).ready(function(){
	$('.hapus_data_buku').click(function(e){
		e.preventDefault();

		var pisbn = $(this).attr('data-id');
		var pjudul = $(this).attr('data-judul');
		var parent = $(this).parent("td").parent("tr");

		bootbox.dialog({
		  message: "Anda Yakin Hapus Buku <br> ISBN : "
			+pisbn+"<br> Judul : "+pjudul+" ?",
		  title: "<i class='material-icons'>delete</i> Hapus",
		  buttons: {
			danger: {
			  label: "Hapus",
			  className: "btn-danger",
			  callback: function() {

          $.ajax({
					  type: 'POST',
					  url: './page/buku/hapus.php',
            data: {
              'isbn': pisbn
            }
				  })
				  .done(function(response){
					  bootbox.alert('Data Berhasil Dihapus!');
					  parent.fadeOut('slow');
				  })
				  .fail(function(){
					  bootbox.alert('Ada yang salah...');
				  })
			  }
			},
      success: {
			  label: "Batal",
			  className: "btn-primary",
			  callback: function() {
				 $('.bootbox').modal('hide');
			  }
			}
		  }
		});
	});
});

// <!-- ajax simpan edit anggota -->
$(document).ready(function () {
  $('.simpan_edit_anggota').click(function (e) {
    e.preventDefault();

    var pnis = document.getElementById('nis_edit_anggota').value;
    var pnama_anggota = document.getElementById('nama_edit_anggota').value;
    var ptmp_lahir = document.getElementById('tmp_lahir_edit_anggota').value;
    var ptgl_lahir = document.getElementById('tgl_lahir_edit_anggota').value;
    var pjk = document.getElementById('jk_edit_anggota').value;
    var ptingkat = document.getElementById('tingkat_edit_anggota').value;

    $.ajax({
      type: 'POST',
      url: './page/anggota/simpan_edit.php',
      data: {
        'nis': pnis,
        'nama_anggota': pnama_anggota,
        'tmp_lahir': ptmp_lahir,
        'tgl_lahir': ptgl_lahir,
        'jk': pjk,
        'tingkat': ptingkat
      }
    });

    bootbox.dialog({
      message: "Data Berhasil Disimpan!",
      title: "<i class='glyphicon glyphicon-trash'></i> Simpan",
      buttons: {
        success: {
          label: "OK",
          className: "btn-success",
          callback: function() {
          $('.bootbox').modal('hide');

           window.location.href="?page=anggota";
          }
        }
      }
    });
  });
});

// <!-- ajax simpan tambah anggota -->
$(document).ready(function () {
  $('.simpan_tambah_anggota').click(function (e) {
    e.preventDefault();

    var pnis = document.getElementById('nis_tambah_anggota').value;
    var pnama_anggota = document.getElementById('nama_tambah_anggota').value;
    var ptmp_lahir = document.getElementById('tmp_lahir_tambah_anggota').value;
    var ptgl_lahir = document.getElementById('tgl_lahir_tambah_anggota').value;
    var pjk = document.getElementById('jk_tambah_anggota').value;
    var ptingkat = document.getElementById('tingkat_tambah_anggota').value;
		var pnama_user = '<?php echo $_SESSION['nama_user']; ?>'
    $.ajax({
      type: 'POST',
      url: './page/anggota/simpan_tambah.php',
      data: {
        'nis': pnis,
        'nama_anggota': pnama_anggota,
        'tmp_lahir': ptmp_lahir,
        'tgl_lahir': ptgl_lahir,
        'jk': pjk,
        'tingkat': ptingkat,
				'nama_user': pnama_user
      }
    });

    bootbox.dialog({
      message: "Data Berhasil Disimpan!",
      title: "<i class='glyphicon glyphicon-trash'></i> Simpan",
      buttons: {
        success: {
          label: "OK",
          className: "btn-success",
          callback: function() {
          $('.bootbox').modal('hide');

           window.location.href="?page=anggota";
          }
        }
      }
    });
  });
});

// <!-- ajax simpan edit buku -->
$(document).ready(function () {
  $('.simpan_edit_buku').click(function (e) {
    e.preventDefault();
		var pisbn = document.getElementById('isbn_edit_buku').value;
    var pjudul = document.getElementById('judul_edit_buku').value;
    var ppengarang = document.getElementById('pengarang_edit_buku').value;
    var ppenerbit = document.getElementById('penerbit_edit_buku').value;
    var ptahun_terbit = document.getElementById('tahun_terbit_edit_buku').value;
    var pjumlah_buku = document.getElementById('jumlah_buku_edit_buku').value;
    var plokasi = document.getElementById('lokasi_edit_buku').value;

    $.ajax({
      type: 'POST',
      // url: '../hapusAnggota.php',
      url: './page/buku/simpan_edit.php',
      data: {
				'isbn': pisbn,
        'judul': pjudul,
        'pengarang': ppengarang,
        'penerbit': ppenerbit,
        'tahun_terbit': ptahun_terbit,
        'jumlah_buku': pjumlah_buku,
        'lokasi': plokasi
      }
    });

    bootbox.dialog({
      message: "Data Berhasil Disimpan!",
      title: "<i class='glyphicon glyphicon-trash'></i> Simpan",
      buttons: {
        success: {
          label: "OK",
          className: "btn-success",
          callback: function() {
          $('.bootbox').modal('hide');

           window.location.href="?page=buku";
          }
        }
      }
    });
  });
});

// <!-- ajax simpan tambah buku -->
$(document).ready(function () {
  $('.simpan_tambah_buku').click(function (e) {
    e.preventDefault();

		var pisbn = document.getElementById('isbn_tambah_buku').value;
    var pjudul = document.getElementById('judul_tambah_buku').value;
    var ppengarang = document.getElementById('pengarang_tambah_buku').value;
    var ppenerbit = document.getElementById('penerbit_tambah_buku').value;
    var ptahun_terbit = document.getElementById('tahun_terbit_tambah_buku').value;
    var pjumlah_buku = document.getElementById('jumlah_buku_tambah_buku').value;
    var plokasi = document.getElementById('lokasi_tambah_buku').value;
		var pnama_user = '<?php echo $_SESSION['nama_user']; ?>'
    // alert(pid);

    $.ajax({
      type: 'POST',
      // url: '../hapusAnggota.php',
      url: './page/buku/simpan_tambah.php',
      data: {
				'isbn': pisbn,
        'judul': pjudul,
        'pengarang': ppengarang,
        'penerbit': ppenerbit,
        'tahun_terbit': ptahun_terbit,
        'jumlah_buku': pjumlah_buku,
        'lokasi': plokasi,
				'nama_user': pnama_user
      }
    });

    bootbox.dialog({
      message: "Data Berhasil Disimpan!",
      title: "<i class='glyphicon glyphicon-trash'></i> Simpan",
      buttons: {
        success: {
          label: "OK",
          className: "btn-success",
          callback: function() {
          $('.bootbox').modal('hide');

           window.location.href="?page=buku";
          }
        }
      }
    });
  });
});

// <!-- ajax simpan tambah pinjam -->
$(document).ready(function () {
  $('.simpan_tambah_pinjam').click(function (e) {
    e.preventDefault();

    var pkode_pinjam = document.getElementById('kode_pinjam').value;
    var pnis = document.getElementById('nis').value;
    var ptgl_pinjam = document.getElementById('tgl_pinjam').value;
		var pnama = document.getElementById('nama').value;
		var plama_pinjam = document.getElementById('lama_pinjam').value;
		var pdenda = '<?php echo $_SESSION['denda']?>';
    $.ajax({
      type: 'POST',
      url: './page/peminjaman/simpan_tambah.php',
      data: {
				'kode_pinjam': pkode_pinjam,
        'nis': pnis,
        'tgl_pinjam': ptgl_pinjam,
				'nama': pnama,
				'lama_pinjam': plama_pinjam,
				'denda': pdenda
      }
    })
		.done(function (response) {
			$("#dataTables-example-temp-buku").load("./page/peminjaman/reset_table_temp_buku.php");
		});

    bootbox.dialog({
      message: "Data Berhasil Disimpan!",
      title: "<i class='glyphicon glyphicon-trash'></i> Simpan",
      buttons: {
        success: {
          label: "OK",
          className: "btn-success",
          callback: function() {
          $('.bootbox').modal('hide');

           // window.location.href="?page=peminjaman&aksi=tambah";
           window.location.href="?page=peminjaman";
          }
        }
      }
    });
  });
});


// <!-- ajax simpan temp buku -->
$(document).ready(function () {
  $('.simpan_temp_buku').click(function (e) {
    e.preventDefault();
		var pkode_buku = document.getElementById('cari_kode_buku').value;
		$.ajax({
      type: 'POST',
      url: './page/peminjaman/simpan_temp_tambah.php',
      data: {
				'kode_buku': pkode_buku
      },
    })
		.done(function(response){
			$("#dataTables-example-temp-buku").load("./page/peminjaman/table_temp_buku.php");
		});
  });
});

// <!-- ajax simpan temp buku modal -->
$(document).ready(function () {
	$(document).on('click','.simpan_temp_buku_modal', function (e) {
    e.preventDefault();
		var pkode_buku = $(this).attr('data-id');
    $.ajax({
      type: 'POST',
      url: './page/peminjaman/simpan_temp_tambah.php',
      data: {
				'kode_buku': pkode_buku
      }
    })
		.done(function(response){
			$("#container-table-temp-buku").load("./page/peminjaman/table_temp_buku.php");
			$("#container-table-buku").load("./page/peminjaman/content_modal_cari_buku.php");
		});
  });
});


$(document).ready(function() {
	$(document).on('click','.modal_cari', function (e) {
		e.preventDefault();
		$.ajax({
			// url: '/path/to/file',
			// type: 'default GET (Other values: POST)',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			// data: {param1: 'value1'}
		})
		.done(function() {
			console.log("success");
			$("#container-table-buku").load("./page/peminjaman/content_modal_cari_buku.php");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});
});

// <!-- ajax hapus temp buku bootstrap modal -->
$(document).ready(function(){
	$(document).on('click','.hapus_temp_buku', function (e) {
		e.preventDefault();
		var pkode_buku = $(this).attr('data-id');
		var parent = $(this).parent("td").parent("tr");
	    $.ajax({
			  type: 'POST',
			  url: './page/peminjaman/hapus.php',
	      data: {
	        'kode_buku': pkode_buku
	      }
		  })
			.done(function(response){
				$("#container-table-temp-buku").load("./page/peminjaman/table_temp_buku.php");
			});
	});
});
// datatables
$(document).ready(function () {
	$('#dataTables-example').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-temp-buku').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-pinjam').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-pinjam2').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-kembali').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-kembali2').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-tanggal').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-tanggal2').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-buku-modal').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-peminjaman').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-perpanjang').DataTable();
});
$(document).ready(function () {
	$('#dataTables-example-kembalikan').DataTable();
});

//perpanjang Peminjaman
$(document).ready(function() {
	$('.perpanjang').click(function(e) {
		e.preventDefault();
		var pkode_pinjam = $(this).attr('data-pinjam');
		var plambat = $(this).attr('data-lambat');
		var pmaks = $(this).attr('data-maks');
		var pdenda = $(this).attr('data-denda');
		// alert(pkode_pinjam);
		console.log(pkode_pinjam);
		$.ajax({
      type: 'POST',
      url: './page/peminjaman/content_modal_perpanjang.php',
      // url: './index.php',
      data: {
				'kode_pinjam': pkode_pinjam,
				'lambat': plambat,
				'maks': pmaks,
				'denda': pdenda
      }
    })
		.done(function() {
			console.log("success");
			console.log(pkode_pinjam);
			// $('#body_perpanjang').load('./page/peminjaman/content_modal_perpanjang.php?kode_pinjam=' + pkode_pinjam);
			$('#isi_perpanjang').load('./page/peminjaman/content_modal_perpanjang.php?kode_pinjam=' + pkode_pinjam +
			'&lambat=' + plambat +
			'&maks=' + pmaks +
			'&denda=' + pdenda);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
});
//kembalikan Peminjaman
$(document).ready(function() {
	$('.kembalikan').click(function(e) {
		e.preventDefault();
		var pkode_pinjam = $(this).attr('data-pinjam');
		// alert(pkode_pinjam);
		console.log(pkode_pinjam);
		$.ajax({
      type: 'POST',
      url: './page/peminjaman/content_modal_kembalikan.php',
      // url: './index.php',
      data: {
				'kode_pinjam': pkode_pinjam
      }
    })
		.done(function() {
			console.log("success");
			console.log(pkode_pinjam);
			// $('#body_kembalikan').load('./page/peminjaman/content_modal_kembalikan.php?kode_pinjam=' + pkode_pinjam);
			$('#isi_kembalikan').load('./page/peminjaman/content_modal_kembalikan.php?kode_pinjam=' + pkode_pinjam);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});
});

//confirm perpanjang
$(document).ready(function() {
	$(document).on('click','.confirm_perpanjang', function (e) {
		e.preventDefault();
		var pkode_pinjam = $(this).attr('data-confirm-perpanjang');
		var plambat = $(this).attr('data-lambat');
		var pmaks = $(this).attr('data-maks');
		var pdenda = $(this).attr('data-denda');
		var pperpanjang = document.getElementById('input_perpanjang').value;
		console.log(pkode_pinjam);
		// alert(pkode_pinjam);
		// alert(plambat);
		// alert(pmaks);
		// alert(pdenda);
		// alert(pperpanjang);
		console.log("kode pinjam : "+pkode_pinjam);
		console.log("lambat : "+plambat);
		console.log("maks : "+pmaks);
		console.log("denda : "+pdenda);
		console.log("perpanjang : "+pperpanjang);
		if (plambat>7) {
			bootbox.alert("Maaf Tidak Bisa Perpanjang!");
		}
		else {
			bootbox.alert("Silahkan Lanjut!");
			$.ajax({
				url: './page/peminjaman/perpanjang.php',
				type: 'POST',
				data: {
				'kode_pinjam': pkode_pinjam,
				'lambat': plambat,
				'maks': pmaks,
				'denda': pdenda,
				'perpanjang': pperpanjang
				}
			})
			.done(function() {
				console.log("success");

			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			bootbox.dialog({
				message: "Peminjaman Berhasil Diperpanjang!",
				title: "<i class='material-icons md-18'>autorenew</i> Perpanjang",
				buttons: {
					success: {
						label: "OK",
						className: "btn-success",
						callback: function() {
						$('.bootbox').modal('hide');
						 window.location.href="?page=peminjaman";
						}
					}
				}
			});
		}
		//end of if else condition

	});
});

//confirm kembalikan
$(document).ready(function() {
	$(document).on('click','.confirm_kembalikan', function (e) {
		e.preventDefault();
		var pkode_pinjam = $(this).attr('data-confirm-kembalikan');
		console.log(pkode_pinjam);
		// alert(pkode_pinjam);
		$.ajax({
			url: './page/peminjaman/kembali.php',
			type: 'POST',
			data: {
				'kode_pinjam': pkode_pinjam
			},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		bootbox.dialog({
			message: "Peminjaman Berhasil Dikembalikan!",
			title: "<i class='material-icons md-18'>check</i> Kembalikan",
			buttons: {
				success: {
					label: "OK",
					className: "btn-success",
					callback: function() {
					$('.bootbox').modal('hide');
					 window.location.href="?page=peminjaman";
					}
				}
			}
		});
	});
});

$(document).ready(function() {
	// $('.simpan_pengaturan').click(function (e) {
		$(document).on('click','.simpan_pengaturan', function (e) {
		e.preventDefault();
		var pdenda = document.getElementById('pengaturan_denda').value;
		var pmaks = document.getElementById('pengaturan_maksimal_lama_pinjam').value;
		// alert("OK");
		$.ajax({
			url: './page/pengaturan/simpan_pengaturan.php',
			type: 'POST',
			data: {
				'denda': pdenda,
				'maks': pmaks
			}
		})
		.done(function() {
			console.log("success");
			bootbox.dialog({
				message: "Pengaturan Berhasil Disimpan!",
				title: "<i class='material-icons md-18'>settings</i> Pengaturan",
				buttons: {
					success: {
						label: "OK",
						className: "btn-success",
						callback: function() {
						$('.bootbox').modal('hide');
						 window.location.href="?page=pengaturan";
						}
					}
				}
			});
		})
		.fail(function() {
			console.log("error");
			bootbox.dialog({
				message: "Pengaturan Gagal Disimpan!",
				title: "<i class='material-icons md-18'>settings</i> Pengaturan",
				buttons: {
					success: {
						label: "OK",
						className: "btn-success",
						callback: function() {
						$('.bootbox').modal('hide');
						 window.location.href="?page=pengaturan";
						}
					}
				}
			});
		})
		.always(function() {
			console.log("complete");
		});

	});
});

</script>
