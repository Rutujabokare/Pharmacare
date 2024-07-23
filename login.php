<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <style>
    body {
      background-image: url('assets/images/loginimg.jpg'); 
      background-size: cover; 
      background-position: center center; 
      height: 100vh; 
      margin: 0; 
      display: flex; 
      justify-content: center; 
      align-items: center; 
      flex-direction: column; 
    }

    

    /* .logo-container img {
     
      height:50px;
      margin-bottom:50px;
      margin-right:130px;
     
    } */

    .card {
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 20px; 
      max-width: 400px; 
      background: rgba(255, 255, 255, 0.9); 
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    }

    .form-control {
      width: 100%; 
      border-color: #ddd; 
    }

    .btn-login {
      width: 100%;
      background-color: #41A317; 
      color: #fff; 
      border: none; 
    }

    .btn-login:hover {
      background-color:#41A316 ; 
    }

    .btn-container {
      display: flex;
      justify-content: center;
    }

    .card-header {
      text-align: center; 
      padding: 10px;
      border-bottom: none; 
    }
  </style>
</head>
<body>
  <div class="logo-container">
    <!-- <img src="assets/images/logo.jpg" alt="Pharma Care Logo"> -->
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="text-center mb-4">Sign in</h4>
            <form action="loginconnect.php" method="POST">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="ex@gmail.com" autocomplete="off">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" autocomplete="off">
              </div>
              <div class="btn-container"> 
                <button type="submit" class="btn btn-sm btn-login m-1" name="submit">Sign in</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
