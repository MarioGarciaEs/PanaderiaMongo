<?php
  include_once "../../connection/connection.php";

  class Recetas {

    public static function insert($nombre, $descripcion, $preparacion) {
      MongoDatabase::getInstance()->panaderia->recetas->insertOne([
        '_id' => self::getNextSequence('recetasid'),
        'nombre' => $nombre,
        'descripcion' => $descripcion,
        'preparacion' => $preparacion
      ]);
    }

    public static function getAll() {
      return MongoDatabase::getInstance()->panaderia->recetas->find([]);
    }

    public static function getById($id) {
      return MongoDatabase::getInstance()->panaderia->recetas->findOne(['_id' => (int) $id]);
    }

    public static function updateOne($id, $nombre, $descripcion, $preparacion) {
      MongoDatabase::getInstance()->panaderia->recetas->updateOne(
        ['_id' => (int) $id],
        ['$set' => ['nombre' => $nombre, 'descripcion' => $descripcion, 'preparacion' => $preparacion]]
      );
    }

    public static function deleteOne($id) {
      MongoDatabase::getInstance()->panaderia->recetas->deleteOne(['_id' => (int) $id]);
    }

    public static function getNextSequence($name) {

        $counter = MongoDatabase::getInstance()->panaderia->counters->findOne(["_id" => $name]);
        MongoDatabase::getInstance()->panaderia->counters->updateOne(
          ['_id' => $name],
          ['$set' => ['seq' => $counter->seq + 1]]
        );

        return $counter->seq;
    }

  }

  
 