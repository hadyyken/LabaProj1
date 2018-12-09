<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_bakery
 * @property int $id_jewelery
 * @property int $id_presents
 * @property int $id_trees
 * @property double $price
 * @property string $date
 * @property string $commentary
 *
 * @property Bakery $bakery
 * @property Jewelery $jewelery
 * @property Presents $presents
 * @property Trees $trees
 * @property Users $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'price', 'date'], 'required'],
            [['id_user', 'id_bakery', 'id_jewelery', 'id_presents', 'id_trees'], 'integer'],
            [['price'], 'number'],
            [['date'], 'safe'],
            [['commentary'], 'string', 'max' => 255],
            [['id_bakery'], 'exist', 'skipOnError' => true, 'targetClass' => Bakery::className(), 'targetAttribute' => ['id_bakery' => 'id']],
            [['id_jewelery'], 'exist', 'skipOnError' => true, 'targetClass' => Jewelery::className(), 'targetAttribute' => ['id_jewelery' => 'id']],
            [['id_presents'], 'exist', 'skipOnError' => true, 'targetClass' => Presents::className(), 'targetAttribute' => ['id_presents' => 'id']],
            [['id_trees'], 'exist', 'skipOnError' => true, 'targetClass' => Trees::className(), 'targetAttribute' => ['id_trees' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_bakery' => 'Id Bakery',
            'id_jewelery' => 'Id Jewelery',
            'id_presents' => 'Id Presents',
            'id_trees' => 'Id Trees',
            'price' => 'Price',
            'date' => 'Date',
            'commentary' => 'Commentary',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBakery()
    {
        return $this->hasOne(Bakery::className(), ['id' => 'id_bakery']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJewelery()
    {
        return $this->hasOne(Jewelery::className(), ['id' => 'id_jewelery']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPresents()
    {
        return $this->hasOne(Presents::className(), ['id' => 'id_presents']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrees()
    {
        return $this->hasOne(Trees::className(), ['id' => 'id_trees']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'id_user']);
    }
}
