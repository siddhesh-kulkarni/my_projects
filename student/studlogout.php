<script>
    function logout() {
        swal({
                title: "Are you sure?",
                text: "You will be logged out.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willLogout) => {
                if (willLogout) {
                    swal({
                        title: "Logout Successful!",
                        icon: "success",
                        button: "OK",
                    }).then(function() {
                        sessionStorage.setItem('loggedin', false);
                        sessionStorage.removeItem('email');
                        window.location.href = "../project/student.php";
                    });
                }
            });
    }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">