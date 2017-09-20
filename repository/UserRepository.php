<?php
require_once '../lib/Repository.php';
/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';
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
    public function create($firstname, $surname, $username, $password)
    {
        $password = sha1($password);
        $query = "INSERT INTO $this->tableName (firstname, lastname, username, password) VALUES (?,?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss',$firstname, $surname, $username, $password);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        return $statement->insert_id;
    }
     public function getAllUsers(){
       $users = [];
       $query = "SELECT username from $this->tableName";
       $statement = ConnectionHandler::getConnection()->prepare($query);
       if ($statement->execute()){
         while ($row = $statement->fetch()) {
           array_push($users, $row['username']);
         }
       }
       return $users;
     }




    public function selectUser($username)
        {
          $query = "SELECT * FROM {$this->tableName} WHERE mail=?";
          $statement = ConnectionHandler::getConnection()->prepare($query);
          $statement->bind_param('s', $username);
          $statement->execute();
          // Resultat der Abfrage holen
          $result = $statement->get_result();
          if (!$result) {
              throw new Exception($statement->error);
          }
          // Ersten Datensatz aus dem Reultat holen
          $row = $result->fetch_object();
          // Datenbankressourcen wieder freigeben
          $result->close();
          // Den gefundenen Datensatz zurückgeben
          return $row->name;
        }





    public function delete(){
        $query = "INSERT INTO $this->tableName (firstname, lastname, username, password) VALUES (?,?,?,?)";
    }
    public function update(){
    }
}
