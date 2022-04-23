

<script >
	function hapus(e){
		// console.log(e)
		var $id = "form-hapus"+e;
		// console.log($id);
        swal({
			title: 'Yakin dihapus?',
			icon: 'warning',
			buttons:{
				confirm: {
				text : 'Hapus',
				className : 'btn btn-danger'
				},
				cancel: {
				text : 'Tidak',
				visible: true,
				className: 'btn btn-focus'
				}
			}
			}).then((Tambah) => {
			if (Tambah) {
				document.getElementById($id).submit();
			} else {
				swal.close();
			}
		});
    }
</script>