<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Trees".
 *
 * @property int $id
 * @property string $variety
 * @property double $size
 * @property string $age
 * @property double $price
 *
 * @property Order[] $orders
 */
class Trees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Trees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['variety', 'size', 'age', 'price'], 'required'],
            [['size', 'price'], 'number'],
            [['age'], 'safe'],
            [['variety'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'variety' => 'Variety',
            'size' => 'Size',
            'age' => 'Age',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_trees' => 'id']);
    }
}
