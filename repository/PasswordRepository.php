<?php
require_once '../lib/Repository.php';
/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class PasswordRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'password';
    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
     public function selectPassword($konto){
       $query = "SELECT 'konto' from $this->tableName where konto = ?";
       $statement = ConnectionHandler::getConnection()->prepare($query);
       $statement->bind_param('s',$task);
       return $statement->execute();
     }
    //  public function getAllPassword(){
    //    $tasks = [];
    //    $query = "SELECT konto from $this->tableName";
    //    $statement = ConnectionHandler::getConnection()->prepare($query);
    //    if ($statement->execute()){
    //         /* bind result variables */
    //         $statement->bind_result($beschreibung, $startdatum, $benutzername);
    //         // Datum umwandeln.
    //         /* fetch values */
    //         while ($statement->fetch()) {
    //           array_push($tasks, ["beschreibung"=>$beschreibung, "startdatum"=>$startdatum, "benutzername"=>$benutzername]);
    //         }
    //    }
    //    /* close statement */
    //    $statement->close();
    //    return $tasks;
    //  }
     public function create($konto, $username, $password, $commen){
       $query = "INSERT INTO $this->tableName (konto, username, password, comment) VALUES (?,?,?,?,?)";
       $statement = ConnectionHandler::getConnection()->prepare($query);
       $statement->bind_param('ssss',$konto, $username, $password, $comment);
       if (!$statement->execute()) {
           throw new Exception($statement->error);
       }
       return $statement->insert_id;
     }
}
