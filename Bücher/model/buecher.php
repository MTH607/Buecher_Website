<?php

class buecher
{
  public $id;
  public $kurztitle;
  public $title;
  public $autor;
  public $verkauft;
  public $zustand;
  public $katalog;

  public function __construct($id, $kurztitle, $title, $autor, $verkauft, $zustand, $katalog)
  {
    $this->id = $id;
    $this->kurztitle = $kurztitle;
    $this->title = $title;
    $this->autor = $autor;
    $this->verkauft = $verkauft;
    $this->zustand = $zustand;
    $this->katalog = $katalog;
  }


  public function getAll()
  {

    try {
      $sqlGetAll = 'SELECT * FROM `buecher`';

      $dbInstance = Database::getInstance();

      $sqlRequest = $dbInstance->prepare($sqlGetAll);

      $sqlRequest->execute(array());

      $list = [];

      // var_dump($sqlRequest->fetchAll());

      foreach ($sqlRequest->fetchAll() as $buecher) {
        $list[] = new buecher(
          $buecher['id'],
          $buecher['kurztitle'],
          $buecher['title'],
          $buecher['autor'],
          $buecher['verkauft'],
          $buecher['zustand'],
          $buecher['katalog']
        );
      }
      return $list;
    } catch (PDOException $error) {
      echo "There was an error getting buecher: " . $error->getMessage();
    }
    $dbInstance = null;
  }


  public function getSingle($id)
  {

    try {
      $sqlGetSingle = 'SELECT * FROM `buecher` WHERE id= :id';

      $dbInstance = Database::getInstance();

      $sqlRequest = $dbInstance->prepare($sqlGetSingle);

      $sqlRequest->execute(array(':id' => $id));

      $buecher = $sqlRequest->fetch();


      $singlebuecher = new buecher(
        $buecher['id'],
        $buecher['kurztitle'],
        $buecher['title'],
        $buecher['autor'],
        $buecher['verkauft'],
        $buecher['zustand'],
        $buecher['katalog']
      );

      return $singlebuecher;
    } catch (PDOException $error) {
      echo "There was an error getting the book: " . $error->getMessage();
    }
    $dbInstance = null;
  }


  public function edit($originalid, $id, $kurztitle, $title, $autor, $verkauft, $zustand, $katalog)
  {

    try {
      $sqlEdit = 'UPDATE buecher SET id= :id, kurztitle= :kurztitle, title= :title, autor= :autor, verkauft= :verkauft, zustand= :zustand, katalog= :katalog WHERE id= :originalid';

      $dbInstance = Database::getInstance();

      $sqlRequest = $dbInstance->prepare($sqlEdit);

      $sqlRequest->execute(array(':id' => $id, ':kurztitle' => $kurztitle, ':title' => $title, ':autor' => $autor, ':verkauft' => $verkauft, ':zustand' => $zustand, ':katalog' => $katalog, ':originalid' => $originalid));


      return $sqlRequest;
    } catch (PDOException $error) {
      echo "There was an error editing the buecher: " . $error->getMessage();
    }
    $dbInstance = null;
  }


  public function create($id, $kurztitle, $title, $autor, $verkauft, $zustand, $katalog)
  {

    try {
      $sqlCreate = 'INSERT INTO buecher (id, kurztitle, title, autor, verkauft, zustand, katalog) VALUES (:id, :kurztitle, :title, :autor, :verkauft, :zustand, :katalog)';

      $dbInstance = Database::getInstance();

      $sqlRequest = $dbInstance->prepare($sqlCreate);

      $sqlRequest->execute(array(':id' => $id, ':kurztitle' => $kurztitle, ':title' => $title, ':autor' => $autor, ':verkauft' => $verkauft, ':zustand' => $zustand, ':katalog' => $katalog));

      return $sqlRequest;
    } catch (PDOException $error) {
      echo "There was an error creating the buecher: " . $error->getMessage();
    }
    $dbInstance = null;
  }


  public function delete($id)
  {

    try {
      $sqlGetSingle = 'DELETE FROM `buecher` WHERE id= :id';

      $dbInstance = Database::getInstance();

      $sqlRequest = $dbInstance->prepare($sqlGetSingle);

      $sqlRequest->execute(array(':id' => $id));

      echo "Book removed successfully";
    } catch (PDOException $error) {
      echo "There was an error deleteing the book: " . $error->getMessage();
    }
    $dbInstance = null;
  }
}
