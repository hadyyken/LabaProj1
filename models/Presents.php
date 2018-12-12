<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Presents".
 *
 * @property int $id
 * @property string $type
 * @property string $size
 * @property double $price
 * @property int $fragility
 *
 * @property Order[] $orders
 */
class Presents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Presents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'size', 'price', 'fragility'], 'required'],
            [['price'], 'number'],
            [['fragility'], 'integer'],
            [['type', 'size'], 'string', 'max' => 255],
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
            'size' => 'Size',
            'price' => 'Price',
            'fragility' => 'Fragility',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_presents' => 'id']);
    }

    public function getPresents()
    {
        $sql = "select * from Presents";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    /**
     * Вывести всю выпечку дешевле 200р
     * @return array
     * @throws \yii\db\Exception
     */
    public function createPresents($type, $size, $price, $fragility)
    {
        Yii::$app->db->createCommand()
            ->insert('Presents', array(
                'type' => $type,
                'size' => $size,
                'price' => $price,
                'fragility' => $fragility,
            ));
    }

    /**
     * @param $type
     * @param $size
     * @param $price
     * @param $fragility
     * @throws \yii\db\Exception



    /**
     * @param $id
     * @throws \yii\db\Exception
     */

    /**
     * @param $id
     * @throws \yii\db\Exception
     */
    public function deletePresents($id)
    {
        $sql = "DELETE FROM Presents WHERE id = $id";
        Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function updatePresents($id, $type, $size, $price, $fragility)
    {
        Yii::$app->db->createCommand()->update('Presents', array(
            'type' => $type,
            'size' => $size,
            'price' => $price,
            'fragility' => $fragility,
        ), 'id=:id', array(':id' => $id));
    }
}
