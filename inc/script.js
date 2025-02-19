function login() {
    swal({
      icon: "info",
      title: "Oops...",
      text: "You are not loggined!!!",
      button:"Login Here..",
     
      // footer: '<a href="student.php">Why do I have this issue?</a>'
    }).then(function() {
              window.location.href = 'student.php';
          });
  }