<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">Educa.</a>

     

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span>Alumno</span>
         <a href="profile.php" class="btn">Ver perfil</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">Entrar</a>
            <a href="register.php" class="option-btn">Registrarse</a>
         </div>
         <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">Salir</a>
         <?php
            }else{
         ?>
         <h3>Ingresar o registrarse</h3>
          <div class="flex-btn">
            <a href="login.php" class="option-btn">Ingresar</a>
            <a href="register.php" class="option-btn">Registrarse</a>
         </div>
         <?php
            }
         ?>
      </div>

   </section>

</header>

<!-- header section ends -->

<!-- side bar section starts  -->

<div class="side-bar">

   <div class="close-side-bar">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <span>Estudiante</span>
         <a href="profile.php" class="btn">Ver perfil </a>
         <?php
            }else{
         ?>
         <h3>Registrar o Ingresar</h3>
          <div class="flex-btn" style="padding-top: .5rem;">
            <a href="login.php" class="option-btn">Ingresar</a>
            <a href="register.php" class="option-btn">Registrar</a>
         </div>
         <?php
            }
         ?>
      </div>

   <nav class="navbar">
      <a href="home.php"><i class="fas fa-home"></i><span>Inicio</span></a>
      <a href="courses.php"><i class="fas fa-graduation-cap"></i><span>Cursos</span></a>
      <a href="teachers.php"><i class="fas fa-chalkboard-user"></i><span>Profesores</span></a>
      <a href="contact.php"><i class="fas fa-headset"></i><span>Bandeja</span></a>
   </nav>

</div>

<!-- side bar section ends -->