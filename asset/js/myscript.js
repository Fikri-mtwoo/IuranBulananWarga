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
			{
				targets: [5],
				visible: false,
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
				targets: [0, 2],
				orderable: false,
			},
		],
	});

	//datatables transaksi
	$("#tabletransaksi").DataTable({
		processing: true,
		serverSide: true,
		order: [],

		ajax: {
			url: base_url + "Datatables/get_data_transaksi",
			type: "POST",
		},

		columnDefs: [
			{
				targets: [0, 5],
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
				targets: [0, 2, 3, 4],
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
				targets: [0],
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
					$("#nik_pengguna").val(data.username_pengguna);
					$('[name="username_pengguna"]').val(data.username_pengguna);
					modal.modal("show");
				});
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
					$('[name="id_rumah"]').val(data.id_rumah);
					$('[name="no_rumah"]').val(data.rumah).attr("readonly", "readonly");
					modalrw.modal("show");
				});
			},
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
const div = $(".flash").data("flash");

if (div == "berhasil") {
	Swal.fire({
		title: "Data transaksi",
		text: "Berhasil ditambah",
		icon: "success",
	});
} else if (div === "gagal") {
	Swal.fire({
		title: "Data transaksi",
		text: "Gagal ditambah",
		icon: "error",
	});
}

const flash = $(".flash").data("notif");
const flashinsertwarga = $(".flashinsertwarga").data("notif");
if (flash == "berhasil") {
	Swal.fire({
		title: "Data Warga",
		text: "Berhasil dirubah",
		icon: "success",
	});
}

if (flashinsertwarga == "berhasil") {
	Swal.fire({
		title: "Data Warga",
		text: "Berhasil ditambah",
		icon: "success",
	}).then((result) => {
		if (result.isConfirmed) {
			window.location = base_url + "Admin/datawarga";
		}
	});
}

const flashpetugas = $(".flashpetugas").data("notif");
const flashinsertpetugas = $(".flashinsertpetugas").data("notif");
if (flashpetugas == "berhasil") {
	Swal.fire({
		title: "Akun Petugas",
		text: "Berhasil dirubah",
		icon: "success",
	});
}

if (flashinsertpetugas == "berhasil") {
	Swal.fire({
		title: "Akun Petugas",
		text: "Berhasil ditambah",
		icon: "success",
	}).then((result) => {
		if (result.isConfirmed) {
			window.location = base_url + "Admin/dataakunpetugas";
		}
	});
}
const flashpengguna = $(".flashpengguna").data("notif");
const flashinsertpengguna = $(".flashinsertpengguna").data("notif");
if (flashpengguna == "berhasil") {
	Swal.fire({
		title: "Akun Pengguna",
		text: "Berhasil rubah",
		icon: "success",
	});
}

if (flashinsertpengguna == "berhasil") {
	Swal.fire({
		title: "Akun Pengguna",
		text: "Berhasil ditambah",
		icon: "success",
	}).then((result) => {
		if (result.isConfirmed) {
			window.location = base_url + "Admin/dataakunpengguna";
		}
	});
}
const pesan = $(".pesan").data("pesan");
if (pesan === "gagal") {
	Swal.fire({
		title: "Login Gagal",
		text: "Username atau Password salah",
		icon: "error",
		showConfirmButton: false,
		timer: 1500,
	});
}
