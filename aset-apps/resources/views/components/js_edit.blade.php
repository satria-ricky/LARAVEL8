

<script >
	$('#button-edit').click(function(e) {
        swal({
			title: 'Yakin ditambah?',
			icon: 'warning',
			buttons:{
				confirm: {
				text : 'Tambah',
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