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
}
