<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Register</title>
</head>

<body>
  <div class="container mt-5">
    <form action="./handelers/handelRegister.php" method="POST">

      <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success text-center" role="alert">
          <?php echo $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); endif; ?>

      <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
          <div class="alert alert-danger text-center" role="alert">
            <?php echo $error; ?>
          </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']); endif; ?>

      <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>