

<?php
// RESTRICT ACCESS
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";
session_start();
if (!is_array($_SESSION['user'])) {
    die("ERR");
}

// INIT
require PATH_LIB . "lib-filtres.php";
$filtersLib = new Filters();

// HANDLE AJAX REQUEST
switch ($_POST['req']) {
    /* [INVALID REQUEST] */
    default:
        die("ERR");
        break;
        
        /* [SHOW ALL USERS] */
    case "list":
        $filters = $filtersLib->getAll(); ?>
    <h1>Gestion de la liste des filtres des instruments allant &#224; l'Observatoire du Mont-M&#233;gantic</h1>
    <input type="button" value="Ajouter un filtre" onclick="filtertest.addEdit()"/>
    <?php
    if (is_array($filters)) {
      echo "<table class='zebra' id='table_filter'>";
      echo "<tr>
                <th onclick=\"sortTable(0, 'table_filter')\"> Instrument </th>
                <th onclick=\"sortTable(1, 'table_filter')\">Filtre (affich&#233;s dans le log)</th>
                <th onclick=\"sortTable(2, 'table_filter')\">Filtre (nom dans le header)</th>
                <th onclick=\"sortTable(3, 'table_filter')\">Plage</th>
                <th></th>
            </tr>";
      foreach ($filters as $u) {
        printf("<tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td class='right'>"
                        . "<input type='button' value='Supprimer' onclick='filter.del(%u)'>"
                        . "<input type='button' value='&#201;diter' onclick='filter.addEdit(%u)'>"
                    . "</td></tr>", 
            $u['instrument'], $u['filtres'],$u['filtername_inst'],$u['plage'],
          $u['filtre_id'], $u['filtre_id']
        );
      }
      echo "</table>";
    } else {
      echo "<div>Aucuns filtres trouv&#233;s.</div>";
    }
    break;

  /* [ADD/EDIT USER DOCKET] */
  case "addEdit":
    $edit = is_numeric($_POST['id']);
    if ($edit) {
        $filters = $filtersLib->get($_POST['id']);
    } ?>
    <h1><?=$edit?"&#201;diter":"Ajouter"?> un filtre</h1>
    <form onsubmit="return filtertest.save()">
      <input type="hidden" id="filter_id" value="<?=$filters['filtre_id']?>"/>
      <label for="filter_instrument">Instrument:</label>
      <input type="text" id="filter_instrument" required value="<?=$filters['instrument']?>"/>
      <label for="filter_filter">Nom du filtre (affich&#233; dans le log):</label>
      <input type="text" id="filter_filter" required value="<?=$filters['filtres']?>"/>
      <label for="filter_name">Nom du filtre (Headers):</label><br>
      <input type="text" id="filter_name"   value="<?=$filters['filtername_inst']?>"/><br>
      <label for="filter_plage">Plage:</label><br>
      <input type="text" id="filter_plage"  required value="<?=$filters['plage']?>"/><br>
      <input type="button" value="Annuler" onclick="filtertest.list()"/>
      <input type="submit" value="Sauvegarder"/>
    </form>
    <?php break;

  /* [ADD USER] */
  case "add":
      echo $filtersLib->add($_POST['instrument'], $_POST['filter'], $_POST['filter_name'], $_POST['plage']) ? "OK" : "ERR" ;
    break;

  /* [EDIT USER] */
  case "edit":
      echo $filtersLib->add($_POST['instrument'], $_POST['filter'], $_POST['filter_name'], $_POST['plage'], $_POST['id']) ? "OK" : "ERR" ;
    break;

  /* [DELETE USER] */
  case "del":
      echo $filtersLib->del($_POST['id']) ? "OK" : "ERR" ;
    break;
}
?>

  