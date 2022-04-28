

<script >
	function cekFoto(){
		const getFoto = document.querySelector('#getFoto');
		const setFoto = document.querySelector('#priviewFoto');

		const ofReader = new FileReader();
		ofReader.readAsDataURL(getFoto.files[0]);

		ofReader.onload = function(oFREvent){
			setFoto.src = oFREvent.target.result;
		}
	}
</script>