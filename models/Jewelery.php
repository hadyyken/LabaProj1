<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Jewelery".
 *
 * @property int $id
 * @property string $type
 * @property string $material
 * @property int $edibility
 * @property double $price
 * @property double $size
 *
 * @property Order[] $orders
 */
class Jewelery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Jewelery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'material', 'edibility', 'price', 'size'], 'required'],
            [['material'], 'string'],
            [['edibility'], 'integer'],
            [['price', 'size'], 'number'],
            [['type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'material' => 'Material',
            'edibility' => 'Edibility',
            'price' => 'Price',
            'size' => 'Size',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_jewelery' => 'id']);
    }

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function getJewelery()
    {
        $sql = "select * from Jewelery";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    /**
     * Вывести всю выпечку дешевле 200р
     * @return array
     * @throws \yii\db\Exception
     */
    public function createJewelery($type, $material, $edibility, $price, $size)
    {
        Yii::$app->db->createCommand()
            ->insert('Bakery', array(
                'type' => $type,
                'material' => $material,
                'edibility' => $edibility,
                'price' => $price,
                'size' => $size,
            ));
    }


    /**
     * @param $id
     * @throws \yii\db\Exception
     */


    public function deleteJewelery($id)
    {
        $sql = "DELETE FROM Jewelery WHERE id = $id";
        Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function updateJewelery($id, $type, $material, $edibility, $price, $size)
    {
        Yii::$app->db->createCommand()->update('Bakery', array(
            'type' => $type,
            'material' => $material,
            'edibility' => $edibility,
            'price' => $price,
            'size' => $size,
        ), 'id=:id', array(':id' => $id));
    }
}
