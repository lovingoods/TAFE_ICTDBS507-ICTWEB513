
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <?php 
          if(isset($_SESSION['message']))
          { 
              ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Hey! </strong><?= $_SESSION['message'];?>.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php
              unset($_SESSION['message']); 
          } 
          ?>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          
        </div>
      </div>
    </nav>