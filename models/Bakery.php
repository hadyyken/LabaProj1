<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Bakery".
 *
 * @property int $id
 * @property string $type
 * @property double $price
 * @property string $shelf_life
 *
 * @property Order[] $orders
 */
class Bakery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Bakery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'price', 'shelf_life'], 'required'],
            [['price'], 'number'],
            [['shelf_life'], 'safe'],
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
            'price' => 'Price',
            'shelf_life' => 'Shelf Life',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_bakery' => 'id']);
    }

    /**
     * Вывести всю выпечку дешевле 200р
     * @return array
     * @throws \yii\db\Exception
     */
    public function getBakery()
    {
        $sql = "select * from Bakery";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    /**
     * Вывести всю выпечку дешевле 200р
     * @return array
     * @throws \yii\db\Exception
     */
    public function createBakery($type, $price, $shelfLife)
    {
        Yii::$app->db->createCommand()
            ->insert('Bakery', array(
                'type' => $type,
                'price' => $price,
                'shelfLife' => $shelfLife,
            ));
    }

    public function deleteBakery($id)
    {
        $sql = "DELETE FROM Bakery WHERE id = $id";
        Yii::$app->db->createCommand($sql)->queryAll();
    }
}
