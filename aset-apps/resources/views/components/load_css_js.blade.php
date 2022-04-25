
<script >
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
		});
	});

	function logout (){
		swal({
			title: 'Yakin Logout?',
			icon: 'warning',
			buttons:{
				confirm: {
				text : 'Logout',
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
				document.getElementById("form-logout").submit();
			} else {
				swal.close();
			}
		});
	}
</script>

@if(session()->has('pesan'))
	<script>
		swal("{{ session('pesan') }}", {
			icon : "success",
			buttons: {                  
				confirm: {
					className : 'btn btn-success'
				}
			},
		});
	</script>
@endif

@if(session()->has('error'))
	<script>
		swal("{{ session('error') }}", {
			icon : "error",
			buttons: {                  
				confirm: {
					className : 'btn btn-error'
				}
			},
		});
	</script>
@endif

</body>
</html>