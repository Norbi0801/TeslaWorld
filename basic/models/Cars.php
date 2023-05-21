<?php

namespace app\models;

use Yii;
use yii\db\Command;
use yii\db\Connection;
use yii\db\Query;

$db = require __DIR__ . '/../config/db.php';
class Cars
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_brand' => 'Id Brand',
            'model' => 'Model',
            'production_year' => 'Production Year',
            'mileage' => 'Mileage',
            'id_status' => 'Id Status',
        ];
    }

    /**
     * @param $numberPage
     * @param $countRows
     * @return array|false|string
     */
    public function getPage($numberPage, $countRows){

        $result = (new Query())->select('c.id, cb.brand, c.model, a.status')
            ->from('cars c')
            ->leftJoin('cars_brands cb', 'c.id_brand = cb.id')
            ->leftJoin('availability a', 'c.id_status = a.id')
            ->offset(($numberPage-1)*$countRows)
            ->limit($countRows)
            ->all();

        return json_encode($result);
    }

    public function getAll($numberPage, $countRows){

        $result = (new Query())->select('c.id, cb.brand, c.model, a.status')
            ->from('cars c')
            ->leftjoin('cars_brands cb', 'c.id_brand = cb.id')
            ->leftjoin('availability a', 'c.id_status = a.id')
            ->all();

        return json_encode($result);
    }

    public function getLenCars(){
        $result = (new Query())->select('COUNT(c.id) as n')
            ->from('cars c')
            ->all();
        return $result[0]['n'];
    }

    public function getRecord($id){

        $result = (new Query())->select('id, id_brand, model, production_year, mileage , id_status')
            ->from('cars')
            ->where(['id' => $id])
            ->all();

        return $result[0];
    }

    public function addRecord($record){
        Yii::$app->db->createCommand()->insert('cars', $record)->execute();

    }

    public function updateRecord($record){
        Yii::$app->db->createCommand()->update('cars', $record, ['id' => $record['id']])->execute();
    }

    public function getBrands(){
        $result = (new Query())->select('id, brand')
            ->from('cars_brands')
            ->all();

        return $result;
    }

    public function getStatus(){
        $result = (new Query())->select('id, status')
            ->from('availability')
            ->all();

        return $result;
    }
}
