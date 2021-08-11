$(document).ready(function () {
	let nama = $(".notif").data("name");
	let notif = $(".notif").data("notif");
	let jenis = $(".notif").data("jenis");
	if (nama == "iuran") {
		if (jenis == "insert") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Data iuran",
					text: "Berhasil ditambah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Data iuran",
					text: "Gagal ditambah",
					icon: "error",
				});
			}
		}
	} else if (nama == "rumah") {
		if (jenis == "insert") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Data rumah",
					text: "Berhasil ditambah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Data rumah",
					text: "Gagal ditambah",
					icon: "error",
				});
			}
		} else if (jenis == "update") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Data rumah",
					text: "Berhasil dirubah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Data rumah",
					text: "Gagal dirubah",
					icon: "error",
				});
			}
		}
	} else if (nama == "pengguna") {
		if (jenis == "insert") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Akun pengguna",
					text: "Berhasil ditambah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Akun pengguna",
					text: "Gagal ditambah",
					icon: "error",
				});
			}
		} else if (jenis == "update") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Password pengguna",
					text: "Berhasil dirubah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Password pengguna",
					text: "Gagal dirubah",
					icon: "error",
				});
			}
		}
	} else if (nama == "petugas") {
		if (jenis == "insert") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Akun petugas",
					text: "Berhasil ditambah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Akun petugas",
					text: "Gagal ditambah",
					icon: "error",
				});
			}
		} else if (jenis == "update") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Password petugas",
					text: "Berhasil dirubah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Password petugas",
					text: "Gagal dirubah",
					icon: "error",
				});
			}
		}
	} else if (nama == "warga") {
		if (jenis == "insert") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Data warga",
					text: "Berhasil ditambah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Data warga",
					text: "Gagal ditambah",
					icon: "error",
				});
			}
		} else if (jenis == "update") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Data warga",
					text: "Berhasil dirubah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Data warga",
					text: "Gagal dirubah",
					icon: "error",
				});
			}
		}
	} else if (nama == "rumahwarga") {
		if (jenis == "insert") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Data rumah warga",
					text: "Berhasil ditambah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Data rumah warga",
					text: "Gagal ditambah",
					icon: "error",
				});
			}
		} else if (jenis == "update") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Data rumah warga",
					text: "Berhasil dirubah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Data rumah warga",
					text: "Gagal dirubah",
					icon: "error",
				});
			}
		}
	} else if (nama == "transaksi") {
		if (jenis == "insert") {
			if (notif == "berhasil") {
				Swal.fire({
					title: "Data transaksi",
					text: "Berhasil ditambah",
					icon: "success",
				});
			} else if (notif == "gagal") {
				Swal.fire({
					title: "Data transaksi",
					text: "Gagal ditambah",
					icon: "error",
				});
			}
		} else if (jenis == "cek") {
			if (notif == "gagal") {
				Swal.fire({
					title: "Data transaksi",
					text: "Bulan ini sudah dibuka",
					icon: "warning",
				});
			}
		}
	}

	//alert untuk login
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
	// const div = $(".flash").data("flash");

	// if (div == "berhasil") {
	// 	Swal.fire({
	// 		title: "Data transaksi",
	// 		text: "Berhasil ditambah",
	// 		icon: "success",
	// 	});
	// } else if (div === "gagal") {
	// 	Swal.fire({
	// 		title: "Data transaksi",
	// 		text: "Gagal ditambah",
	// 		icon: "error",
	// 	});
	// }

	// const flash = $(".flash").data("notif");
	// const flashinsertwarga = $(".flashinsertwarga").data("notif");
	// if (flash == "berhasil") {
	// 	Swal.fire({
	// 		title: "Data Warga",
	// 		text: "Berhasil dirubah",
	// 		icon: "success",
	// 	});
	// }

	// if (flashinsertwarga == "berhasil") {
	// 	Swal.fire({
	// 		title: "Data Warga",
	// 		text: "Berhasil ditambah",
	// 		icon: "success",
	// 	}).then((result) => {
	// 		if (result.isConfirmed) {
	// 			window.location = base_url + "Admin/datawarga";
	// 		}
	// 	});
	// }

	// const flashpetugas = $(".flashpetugas").data("notif");
	// const flashinsertpetugas = $(".flashinsertpetugas").data("notif");
	// if (flashpetugas == "berhasil") {
	// 	Swal.fire({
	// 		title: "Akun Petugas",
	// 		text: "Berhasil dirubah",
	// 		icon: "success",
	// 	});
	// }

	// if (flashinsertpetugas == "berhasil") {
	// 	Swal.fire({
	// 		title: "Akun Petugas",
	// 		text: "Berhasil ditambah",
	// 		icon: "success",
	// 	}).then((result) => {
	// 		if (result.isConfirmed) {
	// 			window.location = base_url + "Admin/dataakunpetugas";
	// 		}
	// 	});
	// }
	// const flashpengguna = $(".flashpengguna").data("notif");
	// const flashinsertpengguna = $(".flashinsertpengguna").data("notif");
	// if (flashpengguna == "berhasil") {
	// 	Swal.fire({
	// 		title: "Akun Pengguna",
	// 		text: "Berhasil rubah",
	// 		icon: "success",
	// 	});
	// }

	// if (flashinsertpengguna == "berhasil") {
	// 	Swal.fire({
	// 		title: "Akun Pengguna",
	// 		text: "Berhasil ditambah",
	// 		icon: "success",
	// 	}).then((result) => {
	// 		if (result.isConfirmed) {
	// 			window.location = base_url + "Admin/dataakunpengguna";
	// 		}
	// 	});
	// }
});
