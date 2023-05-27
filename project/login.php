<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   
   if($select_user->rowCount() > 0){
     setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
     header('location:home.php');
   }else{
      $message[] = 'El correo o contraseña es incorrecta !';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body style="padding-left: 0;">



<section class="form-container">

   <form action="" method="post" enctype="multipart/form-data" class="login">
      <h3>Ingreso alumno</h3>
      <p>Correo electronico <span>*</span></p>
      <input type="email" name="email" placeholder="digita tu correo" maxlength="20" required class="box">
      <p>Contraseña <span>*</span></p>
      <input type="password" name="pass" placeholder="digita la contraseña" maxlength="20" required class="box">
      <p class="link">No tienes una cuenta? <a href="register.php">registrarse</a></p>
      <p class="link">Eres profesor? <a href="admin/login.php">entrar</a></p>
      <input type="submit" name="submit" value="Ingresar ahora" class="btn">
   </form>

</section>












<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>