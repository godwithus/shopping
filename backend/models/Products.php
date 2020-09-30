<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $user_email
 * @property string $name
 * @property string $description
 * @property string $ikey
 * @property string $amount
 * @property int $quantity
 * @property string $avalability
 * @property string $prod_condition
 * @property string $brand
 * @property int $stock
 * @property string $image
 * @property int $status
 * @property string $created_at
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name', 'description', 'amount', 'quantity', 'avalability', 'prod_condition', 'category_id', 'brand', 'stock', 'image', 'status'], 'required'],
            [['description'], 'string'],
            [['quantity', 'stock', 'status'], 'integer'],
            [['user_email', 'ikey', 'created_at'], 'safe'],
            [['user_email', 'name', 'image'], 'string', 'max' => 255],
            [['ikey', 'amount', 'avalability'], 'string', 'max' => 50],
            [['prod_condition', 'brand'], 'string', 'max' => 100],
            [['image'], 'file', 'extensions'=>'jpg,jpeg,gif,png', 'skipOnEmpty'=>false]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_email' => 'User Email',
            'name' => 'Name',
            'description' => 'Description',
            'ikey' => 'Ikey',
            'amount' => 'Amount',
            'quantity' => 'Quantity',
            'avalability' => 'Avalability',
            'prod_condition' => 'Prod Condition',
            'category_id' => 'Category',
            'brand' => 'Brand',
            'stock' => 'Stock',
            'image' => 'Image',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public function getPictures()
    {
        return $this->hasMany(Picture::className(), ['product_id'=>'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id'=>'id']);
    }
}
