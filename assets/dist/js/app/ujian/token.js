$(document).ready(function () {
	ajaxcsrf();

	$("#btncek").on("click", function () {
		var token = $("#token").val();
		console.log(token);
		var idUjian = $(this).data("id");
		if (token === "") {
			Swal("Gagal", "Token harus diisi", "error");
		} else {
			var key = $("#id_ujian").data("key");
			$.ajax({
				url: base_url + "loker/cektoken/",
				type: "POST",
				data: {
					id_ujian: idUjian,
					token: token,
				},
				cache: false,
				success: function (result) {
					Swal({
						type: result.status ? "success" : "error",
						title: result.status ? "Berhasil" : "Gagal",
						text: result.status ? "Token Benar" : "Token Salah",
					}).then((data) => {
						if (result.status) {
							location.href = base_url + "loker/garap/?key=" + key;
						}
					});
				},
			});
		}
	});

	var time = $(".countdown");
	if (time.length) {
		countdown(time.data("time"));
	}
});
