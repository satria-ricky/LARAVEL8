


function buttonSimpan(params) {
    var link = "forminput"+params;
    const mycomp = document.getElementsByClassName("form-control "+params);
      var valid = false;
  
      for (i = 0; i < mycomp.length; i++) {
        //   console.log(mycomp[i].value);
          if (mycomp[i].value == "") {
              valid = true;
              break;
          }
      }
      if (valid) {
          valid = false;
          Swal.fire({
              icon: "error",
              title: "Opppss!",
              text: "Keterangan '*required' harus diisi!",
          });
      } else {
        Swal.fire({
            title: "Yakin Simpan Data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Simpan",
            cancelButtonText: "Batal",
            reverseButtons: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        })
        .then((result) => {
            if (result.isConfirmed) {
                document.getElementById(link).submit();
            } 
        });
      }
  }

 
  function buttonModalTambah(p) {
    // console.log(params)
    $('#addRowModal').modal('show');
    $("#forminput1").attr("action", p);
    // console.log($("#forminput1"));
    
}


function buttonModalEdit(params) {
    // console.log(params)
    $('#addRowModal').modal('show');
    
    $("#forminput1").attr("action", "edit_pasar");
    // console.log($("#forminput1"));
        var inputid = '<input type="hidden" name="id" value="' + params.id_pasar + '"/>'
        $(inputid).insertAfter("#token")

        $("#id_nama").val(params.nama)
        $("#id_alamat").val(params.alamat)
        $("#id_tahun_didirikan").val(new Date(params.tahun_didirikan).toISOString().slice(0, 10))
        $("#id_perbaikan_terakhir").val(new Date(params.perbaikan_terakhir).toISOString().slice(0, 10))
        $("#id_status_kepemilikan").val(params.status_kepemilikan)
        $("#id_luas_tanah").val(params.luas_tanah)
        $("#id_luas_bangunan").val(params.luas_bangunan)
        $("#id_kondisi").val(params.kondisi)
        $("#id_komoditi").val(params.komoditi)
        $("#id_jumlah_pedagang_los").val(params.jumlah_pedagang_los)
        $("#id_jumlah_pedagang_kios").val(params.jumlah_pedagang_kios)
        $("#id_aktivitas").val(params.aktivitas)
        $("#id_type_pasar").val(params.type_pasar)
        $("#id_latitude").val(params.latitude)
        $("#id_longitude").val(params.longitude)    
}

function buttonModalEditProduk(params) {
    // console.log(params)
    $('#addRowModal').modal('show');
    
    $("#forminput1").attr("action", "edit_produk");

    // console.log($("#forminput1"));

        var inputid = '<input type="hidden" name="id" value="' + params.id_produk + '"/>'
        $(inputid).insertAfter("#token")

        $("#id_nama").val(params.nama_produk)
}


function buttonLogout() {
    var link = "formLogout";
    Swal.fire({
        title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(link).submit();
        }
      })   
}

function buttonHapus(action,id) {
    var link = action+id;
    console.log(link)
    Swal.fire({
        title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(link).submit();
        }
      })   
}


function cekFoto(){
    const getFoto = document.querySelector('#id_foto');
    const setFoto = document.querySelector('#priviewFoto');
    
    var filePath = getFoto.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (! allowedExtensions.exec(filePath)) {
        Swal.fire({
          icon: "error", 
          title: "Gagal!", 
          text: "Format File Tidak Didukung"
        });
        getFoto.value = "";
        setFoto.src = "";
        
        return false;
    }else {
        const ofReader = new FileReader();
        ofReader.readAsDataURL(getFoto.files[0]);
        ofReader.onload = function(oFREvent){
            setFoto.src = oFREvent.target.result;
        }
    } 
    // else if (getFoto.files[0].size / 1024 / 1024 > 3) {
    //     Swal.fire({icon: "error", title: "Maaf", text: "Ukuran Terlalu Besar (Maksimal 3MB)"});
    //     getFoto.value = "";
    //     return false;
    // }
}

function show_password() {
    var input = document.getElementById("input_password");
    if (input.type === "password") {
      input.type = "text";
    } else {
      input.type = "password";
    }
  } 
