<?php require('inc/links.php');?>
<html>
    <body>
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    </body>
</html>

    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-person-lines-fill fs-3 me-2"></i>User Registration
            </h5>
            <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lb-base">
              Note: Your details must match with your ID (Aadhar cad, Passport, Driving Licence, etc.)
              that will be required during check-in.
            </span>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">First Name</label>
                  <input type="text" class="form-control shadow-none">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Middle Name</label>
                  <input type="text" class="form-control shadow-none">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Last Name</label>
                  <input type="text" class="form-control shadow-none">
                </div>
                <!-- <div class="col-md-6 p-0 mb-3">
                  <label class="form-label">Designation</label>
                  <input type="text" class="form-control shadow-none">
                </div> -->
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control shadow-none">
                </div>
                <div class="col-md-6 p-0">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control shadow-none">
                </div>
                <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label">Mobile Number</label>
                  <input type="tel" maxlength="10" class="form-control shadow-none">
                </div>
                <div class="col-md-6 p-0">
                  <label class="form-label">Education</label>
                  <input type="text" class="form-control shadow-none">
                </div>
                <div class="col-md-12 ps-0 mb-3">
                  <label class="form-label">Address</label>
                  <textarea class="form-control" rows="1"></textarea>
                </div>
              </div>
              <div class="text-center my-1">
                <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>