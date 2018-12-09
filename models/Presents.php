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
}
