<?php
  session_start();
  session_unset();
  session_destroy();

  header('Location: /Segundo_Parcial_LuisEsteban_13902013113/login.php');
?>