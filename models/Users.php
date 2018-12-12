<?php

namespace app\models;

use Yii;
use yii\db\SqlToken;
use yii\debug\models\search\Db;

/**
 * This is the model class for table "Users".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property int $phone
 * @property string $address
 *
 * @property Order[] $orders
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email', 'phone', 'address'], 'required'],
            [['name', 'surname'], 'string'],
            [['phone'], 'integer'],
            [['email', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_user' => 'id']);
    }

    public function getUsers()
    {
        $sql = "select * from Users";

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function createUsers($name, $surname, $email, $phone, $address)
    {
        Yii::$app->db->createCommand()
            ->insert('Users', array(
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
            ));
    }


    /**
     * @param $id
     * @throws \yii\db\Exception
     */


    public function deleteUsers($id)
    {
        $sql = "DELETE FROM Users WHERE id = $id";
        Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function updateUsers($id, $name, $surname, $email, $phone, $address)
    {
        Yii::$app->db->createCommand()->update('Users', array(
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
        ), 'id=:id', array(':id' => $id));
    }

    /**
     * @param $phone
     * @param $email
     */
    public function UserLogin($phone, $email)
    {
        $sql = "SELECT FROM Users WHERE ('phone' =$phone, 'email'=$email) ";
        Yii::$app->db->createCommand($sql)->queryAll();
    }
}
