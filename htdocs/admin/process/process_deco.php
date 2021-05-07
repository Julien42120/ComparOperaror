<?php
session_start();
session_destroy();
header('Location:../../index.php?message=Vous êtes deconnecté'.' '. $_SESSION['name'].', merci de votre visite!');
?>
