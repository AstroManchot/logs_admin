<?php
// RESTRICT ACCESS
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
session_start();
if (!is_array($_SESSION['user'])) {
  die("ERR");
}

// INIT
require PATH_LIB . "lib-users.php";
$usrLib = new Users();

// HANDLE AJAX REQUEST
switch ($_POST['req']) {
  /* [INVALID REQUEST] */
  default:
    die("ERR");
    break;

  /* [SHOW ALL USERS] */
  case "list":
    $users = $usrLib->getAll(); ?>
    <h1>Gestion des utilisateurs pouvant acc&#233;der &#224; ce module de gestion:</h1>
    <input type="button" value="Ajouter un utilisateur" onclick="usr.addEdit()"/>
    <?php
    if (is_array($users)) {
      echo "<table class='zebra'>";
      foreach ($users as $u) {
        printf("<tr><td>%s (%s)</td><td class='right'>"
          . "<input type='button' value='Supprimer' onclick='usr.del(%u)'>"
          . "<input type='button' value='&#201;diter' onclick='usr.addEdit(%u)'>"
          . "</td></tr>", 
          $u['user_name'], $u['user_email'],
          $u['user_id'], $u['user_id']
        );
      }
      echo "</table>";
    } else {
      echo "<div>No userrs found.</div>";
    }
    break;

  /* [ADD/EDIT USER DOCKET] */
  case "addEdit":
    $edit = is_numeric($_POST['id']);
    if ($edit) {
      $user = $usrLib->get($_POST['id']);
    } ?>
    <h1><?=$edit?"&#201;diter":"Ajouter"?> un utilisateur</h1>
    <form onsubmit="return usr.save()">
      <input type="hidden" id="usr_id" value="<?=$user['user_id']?>"/>
      <label for="usr_name">Nom:</label>
      <input type="text" id="usr_name" required value="<?=$user['user_name']?>"/>
      <label for="usr_email">Email:</label>
      <input type="text" id="usr_email" required value="<?=$user['user_email']?>"/>
      <label for="usr_password">Mot de passe:</label>
      <input type="password" id="usr_password" required minlength="6"/>
      <input type="button" value="Annuler" onclick="usr.list()"/>
      <input type="submit" value="Sauvegarder"/>
    </form>
    <?php break;

  /* [ADD USER] */
  case "add":
    echo $usrLib->add($_POST['email'], $_POST['name'], $_POST['password']) ? "OK" : "ERR" ;
    break;

  /* [EDIT USER] */
  case "edit":
    echo $usrLib->edit($_POST['email'], $_POST['name'], $_POST['password'], $_POST['id']) ? "OK" : "ERR" ;
    break;

  /* [DELETE USER] */
  case "del":
    echo $usrLib->del($_POST['id']) ? "OK" : "ERR" ;
    break;
}
?>