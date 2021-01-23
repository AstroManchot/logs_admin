<?php
class Filters {
    private $pdo = null;
    private $stmt = null;
    
    function __construct () {
        // __construct() : Connexion à la base de donnée
        // PARAM : DB_HOST, DB_CHARSET, DB_NAME, DB_USER, DB_PASSWORD
        
        try {
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
                );
            return true;
        } catch (Exception $ex) {
            $this->CB->verbose(0, "DB", $ex->getMessage(), "", 1);
        }
    }
    
    function __destruct () {
        // __destruct() : Fermeture de la connexion
        
        if ($this->stmt !== null) {
            $this->stmt = null;
        }
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }
    
    function get ($id) {
        // get() : get filtre
        // PARAM $id : filtre ID
        
        $sql = "SELECT * FROM `tbl_filtres` WHERE `filtre_id`=?";
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute([$id]);
        $entry = $this->stmt->fetchAll();
        return count($entry)==0 ? false : $entry[0] ;
    }
    
    function getByInstrument ($instrument) {
        // get() : retourne filtre pour l'instrument
        // PARAM $instrument : filtre instrument
        
        $sql = "SELECT * FROM `tbl_filtres` WHERE `filtres`=?";
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute([$instrument]);
        $entry = $this->stmt->fetchAll();
        return count($entry)==0 ? false : $entry[0] ;
    }
    
    function getAll () {
        // getAll() : get tous les filtres
        
        $sql = "SELECT * FROM `tbl_filtres`";
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute();
        $entry = $this->stmt->fetchAll();
        return count($entry)==0 ? false : $entry ;
    }
    
    function add ($instrument, $filtres, $filtername_inst, $plage) {
        // add() : ajoute un nouveau filtre
        // PARAM $instrument - Instrument auquel le filtre appartient
        //       $filtres - Nom du filtre qui apparaitra dans la liste des logs, on inclu longueur d'onde
        //       $filtername_inst - Nom du filtre de headers
        //       $plage - plage spectrale du filtre
        
        $sql = "INSERT INTO `tbl_filtres` (`instrument`, `filtres`, `filtername_inst`, `plage` ) VALUES (?, ?, ?, ?)";
        $cond = [$instrument, $filtres, $filtername_inst, $plage];
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }
    
    function edit ($instrument, $filtres, $filtername_inst, $plage, $id) {
        // edit() : update un filtre
        // PARAM $instrument - Instrument auquel le filtre appartient
        //       $filtres - Nom du filtre qui apparaitra dans la liste des logs, on inclu longueur d'onde
        //       $filtername_inst - Nom du filtre de headers
        //       $plage - plage spectrale du filtre
        //       $id - filtre ID
        
        $sql = "UPDATE `tbl_filtres` SET `instrument`=?, `filtres`=?, `filtername_inst`=?, `plage`=? WHERE `filtre_id`=?";
        $cond = [$instrument, $filtres, $filtername_inst,$plage, $id];
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }
    
    function del ($id) {
        // del() : delete filtre
        // PARAM $id - filtre ID
        
        $sql = "DELETE FROM `tbl_filtres` WHERE `filtre_id`=?";
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute([$id]);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }
}
?>