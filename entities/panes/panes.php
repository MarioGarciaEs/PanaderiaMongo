<?php
  include_once "../../connection/connection.php";

  class Panes {

    public static function insert($receta_id, $producto_id) {
      MongoDatabase::getInstance()->panaderia->panes->insertOne([
        '_id' => self::getNextSequence('panesid'),
        'receta_id' => $receta_id,
        'producto_id' => $producto_id
      ]);
    }

    public static function getAll() {
      return MongoDatabase::getInstance()->panaderia->panes->find([]);
    }

    public static function getById($id) {
      return MongoDatabase::getInstance()->panaderia->panes->findOne(['_id' => (int) $id]);
    }

    public static function updateOne($id, $receta_id, $producto_id) {
      MongoDatabase::getInstance()->panaderia->panes->updateOne(
        ['_id' => (int) $id],
        ['$set' => ['receta_id' => $receta_id, 'producto_id' => $producto_id]]
      );
    }

    public static function deleteOne($id) {
      MongoDatabase::getInstance()->panaderia->panes->deleteOne(['_id' => (int) $id]);
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

  
 