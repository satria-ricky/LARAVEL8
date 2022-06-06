
function buttonLogout() {
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
            // window.location.href = "/logout";
        }
    });
}