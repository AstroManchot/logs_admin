<?php
class Instruments {
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
        // get() : get user
        // PARAM $id : user ID
        
        $sql = "SELECT * FROM `tbl_instruments` WHERE `instrument_id`=?";
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute([$id]);
        $entry = $this->stmt->fetchAll();
        return count($entry)==0 ? false : $entry[0] ;
    }
    
    function getByEmail ($nom) {
        // get() : get user par email
        // PARAM $email : user email
        
        $sql = "SELECT * FROM `tbl_instruments` WHERE `instrument_name`=?";
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute([$nom]);
        $entry = $this->stmt->fetchAll();
        return count($entry)==0 ? false : $entry[0] ;
    }
    
    function getAll () {
        // getAll() : get tous les users
        
        $sql = "SELECT * FROM `tbl_instruments`";
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute();
        $entry = $this->stmt->fetchAll();
        return count($entry)==0 ? false : $entry ;
    }
    
    function add ($name, $statut, $date) {
        // add() : ajoute un nouvel utilisateur
        // PARAM $email - email
        //       $name - nom
        //       $password - password (clear text)
        
        $sql = "INSERT INTO `tbl_instruments` (`instrument_name`, `instrument_statut`, `instrument_date`) VALUES (?, ?, ?)";
        $cond = [$name, $statut, $date];
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }
    
    function edit ($name, $statut, $date, $id) {
        // edit() : update user
        // PARAM $email - email
        //       $name - nom
        //       $password - password (clear text)
        //       $id - user ID
        
        $sql = "UPDATE `tbl_instruments` SET `instrument_name`=?, `instrument_statut`=?, `instrument_date`=? WHERE `instrument_id`=?";
        $cond = [$name, $statut, $date, $id];
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }
    
    function del ($id) {
        // del() : delete user
        // PARAM $id - user ID
        
        $sql = "DELETE FROM `tbl_instruments` WHERE `instrument_id`=?";
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