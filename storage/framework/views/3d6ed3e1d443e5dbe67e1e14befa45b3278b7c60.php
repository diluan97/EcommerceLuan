<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media  screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Đăng Nhập</h2>

<form action="<?php echo e(route('login')); ?>" method="POST">
    <?php echo csrf_field(); ?>
  <div class="imgcontainer">
    <img src="<?php echo e(asset('image/img_avatar2.png')); ?>" style="width:100px;height:100px" alt="Avatar" class="avatar">
  </div>
  <?php if(Session::has('errorlogin')): ?>
            <div class="alert alert-danger">
                <strong>Lỗi ! <?php echo e($errors->first('errorlogin')); ?></strong>
            </div>
            <?php endif; ?>
  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>
     <?php if($errors->has('email')): ?>
        <p style="color:Glosbe"><?php echo e($errors->first('email')); ?></p>
    <?php endif; ?>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
     <?php if($errors->has('password')): ?>
        <p style="color:Glosbe"><?php echo e($errors->first('password')); ?></p>
    <?php endif; ?>
    <button type="submit">Login</button>

  </div>


</form>

</body>
</html>
