
<script >
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
		});
	});
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