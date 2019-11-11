<?php
  include_once "../../connection/connection.php";

  class InventarioPan {

    public static function insert($piezas, $pan_id, $fecha) {
      //$fecha = (new DateTime(null, new DateTimeZone('America/Mexico_City')))->format('Y-m-d');

      MongoDatabase::getInstance()->panaderia->inventariopan->insertOne([
        '_id' => self::getNextSequence('inventariopanid'),
        'piezas' => $piezas,
        'fecha' => $fecha,
        'pan_id' => $pan_id
      ]);
    }

    public static function getAll() {
      return MongoDatabase::getInstance()->panaderia->inventariopan->find([]);
    }

    public static function getById($id) {
      return MongoDatabase::getInstance()->panaderia->inventariopan->findOne(['_id' => (int) $id]);
    }

    public static function updateOne($id, $piezas, $fecha, $pan_id) {
      MongoDatabase::getInstance()->panaderia->inventariopan->updateOne(
        ['_id' => (int) $id],
        ['$set' => ['piezas' => $piezas, 'fecha' => $fecha, 'pan_id' => $pan_id]]
      );
    }

    public static function deleteOne($id) {
      MongoDatabase::getInstance()->panaderia->inventariopan->deleteOne(['_id' => (int) $id]);
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

  
 