var table;
var table1;
$(document).ready(function () {
	//datatables
	table = $("#mytable").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_user",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 3, 4],
				orderable: false,
			},
		],
	});

	//datatables petugas
	$("#tablepetugas").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_petugas",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 1, 3, 4, 5],
				orderable: false,
			},
		],
	});

	//datatables pengguna
	$("#tablepengguna").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_pengguna",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 2, 3],
				orderable: false,
			},
		],
	});

	//datatables transaksi
	var table = $("#tabletransaksi").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_transaksi",
			type: "POST",
			data: function (data) {
				data.bulan = $("#bulan").val();
				data.tahun = $("#tahun").val();
			},
		},

		columnDefs: [
			{
				targets: [0],
				orderable: false,
			},
		],
	});

	//datatables histori transaksi
	$("#historitransaksi").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_histori_transaksi",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 2, 4, 5],
				orderable: false,
			},
		],
	});

	//datatables rumah
	$("#tablerumah").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_rumah",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 2, 3],
				orderable: false,
			},
		],
	});

	//datatables rumah warga
	$("#tablerumahwarga").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_rumahwarga",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 4],
				orderable: false,
			},
		],
	});

	//datatables iuran
	$("#tableiuran").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_iuran",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 1, 2],
				orderable: false,
			},
		],
	});

	//datatables kontrak
	$("#tablekontrak").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_kontrak",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 2, 3, 6, 7],
				orderable: false,
			},
		],
	});

	//datatables kebijakan
	$("#tablekebijakan").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_kebijakan",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 2, 3],
				orderable: false,
			},
		],
	});

	//datatables tagihan
	$("#tablerumahtetap").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_tagihan",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 2],
				orderable: false,
			},
		],
	});

	//btn change pada menu transaksi
	$("#bulan").change(function () {
		table.ajax.reload();
	});
	$("#tahun").change(function () {
		table.ajax.reload();
	});

	//menu histori transaksi
	$("#warga").change(function () {
		let id = $(this).val();
		$.ajax({
			url: base_url + "Dashboard/get_bulan",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				let html = "<option value='none'>pilih bulan</option>";
				data.forEach(function (data) {
					html +=
						"<option value='" +
						data.iBulan +
						"' data-bulan='" +
						data.warga +
						"' data-tahun='" +
						data.iTahun +
						"'>" +
						data.bulan +
						"-" +
						data.tahun +
						"</option>";
				});
				$("#bulan").html(html);
			},
		});
	});
	$("#bulan").change(function () {
		let bulan = $(this).val();
		let id = $("#bulan option:selected").data("bulan");
		let tahun = $("#bulan option:selected").data("tahun");
		$("#tahun").val(tahun);
		$.ajax({
			url: base_url + "Dashboard/get_iuran",
			type: "post",
			dataType: "json",
			data: { id: id, bulan: bulan, tahun: tahun },
			success: function (data) {
				$("#jumlah_bayar").val(data.iuran);
				$("#transaksi").val(data.transaksi);
			},
		});
	});

	//modal edit warga
	var modaledit = $("#modalEdit");
	var title = $("#modalTitle");
	$("#mytable").on("click", ".btnEdit", function () {
		let id = $(this).data("id");

		$.ajax({
			url: base_url + "Admin/get_data_warga",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				$.each(data, function (nik, namawarga, idwarga) {
					title.text("Edit Data Warga");
					// $("#nik").attr("readonly", "readonly");
					$('[name="idwarga"]').val(data.idwarga);
					$('[name="nik"]').val(data.nik);
					$('[name="nama"]').val(data.namawarga);
					// $('[name="no_rumah"]').val(data.no_rumah);
					modaledit.modal("show");
				});
			},
		});
		return false;
	});
	//btn-hapus warga
	$("#mytable").on("click", ".btnHapus", function () {
		let id = $(this).data("id");

		Swal.fire({
			title: "Anda yakin?",
			text: "Ingin menghapus data warga ini",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Hapus",
			cancelButtonText: "Tidak",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: base_url + "Admin/delete_data_warga",
					type: "post",
					dataType: "json",
					data: { nik: id },
					success: function (data) {
						if (data.pesan == "berhasil") {
							window.location = base_url + "Admin/datawarga";
						}
					},
				});
			}
		});
	});

	//modal edit petugas
	var modaleditpetugas = $("#modalEditPetugas");
	var title = $("#modalTitle");
	$("#tablepetugas").on("click", ".btnEditPetugas", function () {
		let id = $(this).data("id");
		$.ajax({
			url: base_url + "Admin/get_data_petugas",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				$.each(data, function () {
					title.text("Edit Akun Petugas");
					$("#nama_petugas").attr("readonly", "readonly");
					$("#nik_petugas").attr("readonly", "readonly");
					$('[name="id_petugas"]').val(data.id_petugas);
					$('[name="password_lama"]').val(data.password_petugas);
					$('[name="nama_petugas"]').val(data.nama_petugas);
					$('[name="nik_petugas"]').val(data.nik_petugas);
					$('[name="username"]').val(data.username_petugas);
					modaleditpetugas.modal("show");
				});
			},
		});
		return false;
	});

	//modal edit password pengguna
	var modal = $("#modalEditPengguna");
	var title = $("#modalTitle");
	$("#tablepengguna").on("click", ".btnEditPengguna", function () {
		let id = $(this).data("id");

		$.ajax({
			url: base_url + "Admin/get_data_pengguna",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				$.each(data, function () {
					title.text("Edit Password Pengguna");
					$("#nik_pengguna").attr("readonly", "readonly");
					$("#username_pengguna").attr("readonly", "readonly");

					$('[name="id_pengguna"]').val(data.id_pengguna);
					$('[name="password_lama_pengguna"]').val(data.password_pengguna);
					$("#nik_pengguna").val(data.nama_pengguna);
					$('[name="username_pengguna"]').val(data.username_pengguna);
					modal.modal("show");
				});
			},
		});
		return false;
	});
	//button aktif akun
	$("#tablepengguna").on("click", ".btnAktifAkun", function () {
		let id = $(this).data("id");
		$.ajax({
			url: base_url + "Admin/update_aktif_akun_pengguna",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				if (data.status == "berhasil") {
					Swal.fire({
						title: "Akun pengguna",
						text: "Berhasil diaktivasi",
						icon: "success",
					}).then((result) => {
						window.location = base_url + "Admin/dataakunpengguna";
					});
				} else if (data.status == "gagal") {
					Swal.fire({
						title: "Password pengguna",
						text: "Gagal diaktivasi",
						icon: "error",
					}).then((result) => {
						window.location = base_url + "Admin/dataakunpengguna";
					});
				}
			},
		});
		return false;
	});
	//button no aktif akun
	$("#tablepengguna").on("click", ".btnNonAktifAkun", function () {
		let id = $(this).data("id");
		$.ajax({
			url: base_url + "Admin/update_non_aktif_akun_pengguna",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				if (data.status == "berhasil") {
					Swal.fire({
						title: "Akun pengguna",
						text: "Berhasil dinon aktivasi",
						icon: "success",
					}).then((result) => {
						window.location = base_url + "Admin/dataakunpengguna";
					});
				} else if (data.status == "gagal") {
					Swal.fire({
						title: "Password pengguna",
						text: "Gagal dinon aktivasi",
						icon: "error",
					}).then((result) => {
						window.location = base_url + "Admin/dataakunpengguna";
					});
				}
			},
		});
		return false;
	});

	//btn aktif akun petugas
	$("#tablepetugas").on("click", ".btnAktifAkunPetugas", function () {
		let id = $(this).data("id");
		$.ajax({
			url: base_url + "Admin/update_aktif_akun_petugas",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				if (data.status == "berhasil") {
					Swal.fire({
						title: "Akun petugas",
						text: "Berhasil diaktivasi",
						icon: "success",
					}).then((result) => {
						window.location = base_url + "Admin/dataakunpetugas";
					});
				} else if (data.status == "gagal") {
					Swal.fire({
						title: "Akun petugas",
						text: "Gagal diaktivasi",
						icon: "error",
					}).then((result) => {
						window.location = base_url + "Admin/dataakunpetugas";
					});
				}
			},
		});
		return false;
	});

	//btn non aktif akun petugas
	$("#tablepetugas").on("click", ".btnNonAktifAkunPetugas", function () {
		let id = $(this).data("id");
		$.ajax({
			url: base_url + "Admin/update_non_aktif_akun_petugas",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				if (data.status == "berhasil") {
					Swal.fire({
						title: "Akun petugas",
						text: "Berhasil dinon aktivasi",
						icon: "success",
					}).then((result) => {
						window.location = base_url + "Admin/dataakunpetugas";
					});
				} else if (data.status == "gagal") {
					Swal.fire({
						title: "Akun petugas",
						text: "Gagal dinon aktivasi",
						icon: "error",
					}).then((result) => {
						window.location = base_url + "Admin/dataakunpetugas";
					});
				}
			},
		});
		return false;
	});

	//modal edit rumah
	var modalRumah = $("#modalEditRumah");
	var titleModalRumah = $("#modalTitle");
	$("#tablerumah").on("click", ".btnEditRumah", function () {
		let id = $(this).data("id");
		$.ajax({
			url: base_url + "Rumah/get_data_rumah",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				$.each(data, function () {
					titleModalRumah.text("Edit Data Rumah");
					$(".text-primary").text(data.status_rumah).val(data.status_rumah);
					$('[name="id_rumah"]').val(data.id_rumah);
					$('[name="no_rumah"]').val(data.no_rumah);
					modalRumah.modal("show");
				});
			},
		});
	});

	//modal edit rumah warga
	var modalrw = $("#modalEditRumahWarga");
	var titleModalRumah = $("#modalTitle");
	$("#tablerumahwarga").on("click", ".btnEditRumahWarga", function () {
		let id = $(this).data("id");

		$.ajax({
			url: base_url + "RumahWarga/get_data_rumahwarga",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				$.each(data, function () {
					titleModalRumah.text("Edit Data Rumah Warga");
					$(".select").val(data.id_warga);
					$(".select").text(data.warga);
					// $('select[name="id_warga"]').children("option").val(data.warga);
					$('[name="idrw"]').val(data.id_rm);
					$('[name="id_warga_lama"]').val(data.id_warga);
					$('[name="id_rumah"]').val(data.id_rumah);
					$('[name="no_rumah"]').val(data.rumah).attr("readonly", "readonly");
					modalrw.modal("show");
				});
			},
		});
	});

	//button edit keterangan menu transaksi
	$("#tabletransaksi").on("click", ".btnEditKet", function () {
		let id = $(this).data("id");
		$.ajax({
			url: base_url + "Admin/update_ket_transaksi",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				if (data.status == "berhasil") {
					Swal.fire({
						title: "Keterangan transaksi",
						text: "Berhasil dirubah",
						icon: "success",
					}).then((result) => {
						window.location = base_url + "Admin/datatransaksi";
					});
				} else if (data.status == "gagal") {
					Swal.fire({
						title: "Keterangan transaksi",
						text: "Gagal dirubah",
						icon: "error",
					}).then((result) => {
						window.location = base_url + "Admin/datatransaksi";
					});
				}
			},
		});
		return false;
	});

	//btn edit kebijakan menu transaksi
	$("#tabletransaksi").on("click", ".btnEditKebijakan", function () {
		let id = $(this).data("id");
		$.ajax({
			url: base_url + "Admin/update_kebijakan_transaksi",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				if (data.status == "berhasil") {
					Swal.fire({
						title: "Kebijakan transaksi",
						text: "Berhasil dirubah",
						icon: "success",
					}).then((result) => {
						window.location = base_url + "Admin/datatransaksi";
					});
				} else if (data.status == "gagal") {
					Swal.fire({
						title: "Kebijakan transaksi",
						text: "Gagal dirubah",
						icon: "error",
					}).then((result) => {
						window.location = base_url + "Admin/datatransaksi";
					});
				}
			},
		});
		return false;
	});

	//modal edit kontrak
	var modalkontrak = $("#modalEditKontrak");
	var titlemodalkontrak = $("#modalTitle");
	$("#tablekontrak").on("click", ".btnEditKontrak", function () {
		let id = $(this).data("id");
		$.ajax({
			url: base_url + "Kontrak/get_data_rumahkontrak",
			type: "post",
			dataType: "json",
			data: { id: id },
			success: function (data) {
				titlemodalkontrak.text("Edit Data Rumah Kontrak");
				$(".text-primary").val(data.id_warga).text(data.nama);
				$('[name="id_kontrak"]').val(data.id_kontrak);
				$('[name="id_rumah"]').val(data.id_rumah);
				$('[name="no_rumah"]').val(data.no_rumah).attr("readonly", "readonly");
				$('[name="jml_bulan"]').val(data.jml_bulan);
				$('[name="tgl_masuk"]').val(data.tgl_masuk);
				modalkontrak.modal("show");
			},
		});
		return false;
	});

	//btn selesai kontrak
	$("#tablekontrak").on("click", ".btnSelesai", function () {
		let id = $(this).data("id");
		Swal.fire({
			title: "Anda yakin?",
			text: "Ingin selesai kontrak rumah ini",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Selesai",
			cancelButtonText: "Tidak",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: base_url + "Kontrak/selesai_kontrak",
					type: "post",
					dataType: "json",
					data: { id: id },
					success: function (data) {
						if (data.pesan == "berhasil") {
							window.location = base_url + "Kontrak";
						}
					},
				});
			}
		});
	});

	//btn-hapus kebijakan
	$("#tablekebijakan").on("click", ".btnHapusKebijakan", function () {
		let id = $(this).data("id");

		Swal.fire({
			title: "Anda yakin?",
			text: "Ingin menghapus kebijakan ini",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Hapus",
			cancelButtonText: "Tidak",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: base_url + "Kebijakan/hapus_data_kebijakan",
					type: "post",
					dataType: "json",
					data: { id: id },
					success: function (data) {
						if (data.pesan == "berhasil") {
							window.location = base_url + "Kebijakan";
						}
					},
				});
			}
		});
	});

	//btn-hapus petugas
	// $('#tablepetugas').on('click', '.btnHapusPetugas', function(){
	//     let id = $(this).data('id');
	//     let nik =$(this).data('nik');

	//     Swal.fire({
	//         title: 'Anda yakin?',
	//         text: "Ingin menghapus akun petugas ini",
	//         icon: 'warning',
	//         showCancelButton: true,
	//         confirmButtonColor: '#3085d6',
	//         cancelButtonColor: '#d33',
	//         confirmButtonText: 'Hapus',
	//         cancelButtonText: 'Tidak'
	//       }).then((result) => {
	//         if (result.isConfirmed) {
	//             $.ajax({
	//                 url : base_url+'Admin/delete_data_petugas',
	//                 type : 'post',
	//                 dataType : 'json',
	//                 data : {id : id, nik : nik},
	//                 success : function(data){
	//                     if(data.pesan == 'berhasil'){
	//                         window.location = base_url+'Admin/dataakunpetugas'
	//                     }
	//                 }
	//                });
	//         }
	//       });
	// });

	// (function() {
	//     'use strict';
	//     window.addEventListener('load', function() {
	//       // Fetch all the forms we want to apply custom Bootstrap validation styles to
	//       var forms = document.getElementsByClassName('needs-validation');
	//       // Loop over them and prevent submission
	//       var validation = Array.prototype.filter.call(forms, function(form) {
	//         form.addEventListener('submit', function(event) {
	//           if (form.checkValidity() === false) {
	//             event.preventDefault();
	//             event.stopPropagation();
	//           }
	//           form.classList.add('was-validated');
	//         }, false);
	//       });
	//     }, false);
	//   })();
});
