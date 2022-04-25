

<script >
	$('#button-edit').click(function(e) {
        swal({
			title: 'Yakin diubah?',
			icon: 'warning',
			buttons:{
				confirm: {
				text : 'Ubah',
				className : 'btn btn-success'
				},
				cancel: {
				text : 'Tidak',
				visible: true,
				className: 'btn btn-focus'
				}
			}
			}).then((Tambah) => {
			if (Tambah) {
				document.getElementById("form-edit").submit();
			} else {
				swal.close();
			}
		});
    });
</script>