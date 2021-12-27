<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="<? //base_url('assets/')?>assets.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/bootstrap/css/bootstrap.min.css' ?>">
</head>

<body>
  <div class="login">
    <h1>Login</h1>
    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
    <form action="<?php echo site_url('login/loginAction'); ?>" method="post">

      <div class="form-outline mb-4">
        <input type="email" name="email" placeholder="Email" required="required" />
        <label class="form-label" for="email">Email address</label>
      </div>

      <div class="form-outline mb-4">
        <input type="password" name="password" placeholder="Password" required="required" />
        <label class="form-label" for="password">Email address</label>
      </div>


      <button type="submit" class="btn btn-primary">Login.</button>
    </form>
    </div>
  </div>
</body>

<!-- jQuery 2.2.3 -->
<!-- <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<!-- Bootstrap 3.3.6 -->
<!-- <script src="plugins/bootstrap/js/bootstrap.min.js"></script> -->

</html>