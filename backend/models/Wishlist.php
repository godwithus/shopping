<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "wishlist".
 *
 * @property int $id
 * @property int $category_id
 * @property string $created_at
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wishlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'user_id'], 'required'],
            [['category_id'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
            'category_id' => '',
            'created_at' => '',
        ];
    }
}
