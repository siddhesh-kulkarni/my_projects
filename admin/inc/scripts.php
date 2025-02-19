<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                            window.location.href = "index.php";
                        });
                    }
                });
        }
    </script>