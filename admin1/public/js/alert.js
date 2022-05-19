function salert() {
    const mycomp = document.getElementsByClassName("#forminput .form-control");
    var valid = false;
    console.log(mycomp[mycomp.length-1]);
    for (i = 0; i < mycomp.length; i++) {
        console.log(mycomp[i].value);
        if (mycomp[i].value == "") {
            valid = true;
            break;
        }
    }
    if (valid) {
        valid = false;
        Swal.fire({
            icon: "error",
            title: "Tidak Valid",
            text: "Sebagian Data Kosong!",
        });
    } else {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Apakah data sudah benar?",
                text: "Data yang sudah disimpan tidak dapat dirubah!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("forminput").submit();
                    swalWithBootstrapButtons.fire(
                        "Tersimpan!",
                        "Data berhasil disimpan.",
                        "success"
                    );
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        "Dibatalkan",
                        "Silahkan tinjau kembali data yang dimasukkan :)",
                        "error"
                    );
                }
            });
    }
}

function logout() {
    Swal.fire({
        title: "Logout",
        text: "Yakin Ingin Keluar?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Logout",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/logout";
        }
    });
}

function pembuatanuser(params) {
    const mycomp = document.getElementsByClassName("form-control");
    var valid = false;
    for (i = 0; i < mycomp.length; i++) {
        if (mycomp[i].value == "") {
            valid = true;
            break;
        }
    }
    if (valid) {
        valid = false;
        Swal.fire({
            icon: "error",
            title: "Tidak Valid",
            text: "Sebagian Data Kosong!",
        });
    } else {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: params.title,
                text: params.msg,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Tambahkan",
                cancelButtonText: "Batal",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("forminput").submit();
                    swalWithBootstrapButtons.fire(
                        "Tersimpan!",
                        "Pengguna Berhasil Dibuat.",
                        "success"
                    );
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        "Dibatalkan",
                        "Silahkan tinjau kembali data yang dimasukkan :)",
                        "error"
                    );
                }
            });
    }
}

function hapus(params) {
    Swal.fire({
        title: params.title,
        text: params.msg,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "green",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("forminput1").submit();
        }
    });
}
function hapussetting(params) {
    Swal.fire({
        title: params.msg,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = "/" + params.url + "/" + params.id;
        }
    });
}

function filecheck() {
    const fileInput = document.getElementById("fileform");
    var filePath = fileInput.value;
    var allowedExtensions = /(\.pdf)$/i;
    if (!allowedExtensions.exec(filePath)) {
        Swal.fire({
            icon: "error",
            title: "Maaf",
            text: "Format File Tidak Didukung",
        });
        fileInput.value = "";
        return false;
    } else if (fileInput.files[0].size / 1024 > 1024) {
        Swal.fire({
            icon: "error",
            title: "Maaf",
            text: "Ukuran Terlalu Besar",
        });
        fileInput.value = "";
        return false;
    }
}

function salert1(params) {
    const mycomp = document.getElementsByClassName("form-control " + params);
    var valid = false;
    for (i = 0; i < mycomp.length; i++) {
        if (mycomp[i].value == "") {
            valid = true;
        }
    }
    if (valid) {
        valid = false;
        Swal.fire({
            icon: "error",
            title: "Tidak Valid",
            text: "Sebagian Data Kosong!",
        });
    } else {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger",
            },
            buttonsStyling: false,
        });

        swalWithBootstrapButtons
            .fire({
                title: "Apakah data sudah benar?",
                text: "Data yang sudah disimpan tidak dapat dirubah!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("forminput" + params).submit();
                    swalWithBootstrapButtons.fire(
                        "Tersimpan!",
                        "Data berhasil disimpan.",
                        "success"
                    );
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        "Dibatalkan",
                        "Silahkan tinjau kembali data yang dimasukkan :)",
                        "error"
                    );
                }
            });
    }
}

function setdatetoday() {
    const d = new Date();
    const today = moment(d.getTime()).format("YYYY-MM-DD HH:mm:ss");
    // console.log(today);
    document.getElementById("ambil_tanggal").value = today;
    document.getElementById("headertgl").innerHTML =
        '<i class="fas fa-calendar me-1"></i> ' + today;
}

function setdatetoday1(params) {
    const d = new Date();
    const today = moment(d.getTime()).format("YYYY-MM-DD HH:mm:ss");
    // console.log(today);
    document.getElementById("ambil_tanggal" + params).value = today;
    document.getElementById("headertgl" + params).innerHTML =
        '<i class="fas fa-calendar me-1"></i> ' + today;
}

function setdatetoday2() {
    const d = new Date();
    const today = moment(d.getTime()).format("YYYY-MM-DD HH:mm:ss");
    document.getElementById("ambil_tanggalx").value = today;
    document.getElementById("headertglx").innerHTML =
        '<i class="fas fa-calendar me-1"></i> ' + today;
}
function recaptchaCallback() {
    if (grecaptcha.getResponse()) {
        document.getElementById("forminput").submit();
    } else {
        document.getElementById("art").innerText =
            "Please complete the CAPTCHA.";
    }
}

function recaptcha_callback() {
    document.getElementById("art").innerText = "";
}
function register() {
    const mycomp = document.getElementsByClassName("form-control");
    var valid = false;
    for (i = 0; i < mycomp.length; i++) {
        if (mycomp[i].value == "") {
            valid = true;
            break;
        }
    }
    let inuser = document.getElementById("username").value;
    let cek = false;
    for (i = 0; i < username.length; i++) {
        if (username[i].nama.toLowerCase() === inuser.toLowerCase()) {
            cek = true;
            valid = true;
            break;
        }
    }
    if (cek) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Username Telah Digunakan",
            showConfirmButton: false,
            timer: 1000,
        });
    } else {
        if (valid) {
            valid = false;
            Swal.fire({
                icon: "error",
                title: "Tidak Valid",
                text: "Sebagian Data Kosong!",
            });
        } else {
            if (!usern) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger",
                    },
                    buttonsStyling: false,
                });

                swalWithBootstrapButtons
                    .fire({
                        title: "Apakah data sudah benar?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Iya",
                        cancelButtonText: "Batal",
                        reverseButtons: true,
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            recaptchaCallback();
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                "Dibatalkan",
                                "Silahkan tinjau kembali data yang dimasukkan :)",
                                "error"
                            );
                        }
                    });
            }
        }
    }
}
let usern = false;
