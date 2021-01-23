<?php
// RESTRICT ACCESS
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
session_start();
if (!is_array($_SESSION['user'])) {
    die("ERR");
}

// INIT
require PATH_LIB . "lib-instruments.php";
$instLib = new Instruments();

// HANDLE AJAX REQUEST
switch ($_POST['req']) {
    /* [INVALID REQUEST] */
    default:
        die("ERR");
        break;
        
        /* [SHOW ALL USERS] */
    case "list":
        $instruments = $instLib->getAll(); ?>
    <h1>Gestion de la liste des instruments allant &#224; l'Observatoire du Mont-M&#233;gantic</h1>
    <input type="button" value="Ajouter un instrument" onclick="inst.addEdit()"/>
    <?php
    if (is_array($instruments)) {
      echo "<table class='zebra'>";
      foreach ($instruments as $u) {
        printf("<tr><td>%s (%s depuis %s)</td><td class='right'>"
          . "<input type='button' value='Supprimer' onclick='inst.del(%u)'>"
          . "<input type='button' value='&#201;diter' onclick='inst.addEdit(%u)'>"
          . "</td></tr>", 
            $u['instrument_name'], $u['instrument_statut'],$u['instrument_date'],
          $u['instrument_id'], $u['instrument_id']
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
        $instruments = $instLib->get($_POST['id']);
    } ?>
    <h1><?=$edit?"&#201;diter":"Ajouter"?> un instrument</h1>
    <form onsubmit="return inst.save()">
      <input type="hidden" id="inst_id" value="<?=$instruments['instrument_id']?>"/>
      <label for="inst_name">Nom:</label>
      <input type="text" id="inst_name" required value="<?=$instruments['instrument_name']?>"/>
      <label for="inst_statut">Statut:</label>
      <input type="text" id="inst_statut" required value="<?=$instruments['instrument_statut']?>"/>
      <label for="inst_date">Date de mise en fonction:</label><br>
      <input type="date" id="inst_date"  required value="<?=$instruments['instrument_date']?>"/><br>
      <input type="button" value="Annuler" onclick="inst.list()"/>
      <input type="submit" value="Sauvegarder"/>
    </form>
    <?php break;

  /* [ADD USER] */
  case "add":
      echo $instLib->add($_POST['name'], $_POST['statut'], $_POST['date']) ? "OK" : "ERR" ;
    break;

  /* [EDIT USER] */
  case "edit":
      echo $instLib->edit($_POST['name'], $_POST['statut'], $_POST['date'], $_POST['id']) ? "OK" : "ERR" ;
    break;

  /* [DELETE USER] */
  case "del":
      echo $instLib->del($_POST['id']) ? "OK" : "ERR" ;
    break;
}
?>