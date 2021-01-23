<?php
// INIT
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";

// HTML
require PATH_LIB . "page-top.php"; ?>
<script>
function login() {
  adm.ajax({

    url : "ajax-session.php",
    data : {
      req : "in",
      email : document.getElementById("user_email").value,
      password : document.getElementById("user_password").value
    },
    ok : function(){
      location.href = "index.php";
    },
    error : function(){
      alert("Invalid user/password");
    }
  });
  return false;
}
</script>
<style>
#login-form{
  max-width: 440px;
  margin: 0 auto;
  padding: 10px 20px 20px 20px;
  background: #eee;
}
#login-form input{
  width: 100%;
}
</style>
<form id="login-form" onsubmit="return login();">
  <h1><center>Vous devez vous identifier pour continuer</center></h1>
  <label for="user_email">Email:</label>
  <input type="email" id="user_email" >
  <label for="user_password">Mot de passe:</label>
  <input type="password" id="user_password" >
  <input type="submit" value="Connexion"/>
</form>
<?php require PATH_LIB . "page-bottom.php"; ?>