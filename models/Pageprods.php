<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "pageprods".
 *
 * @property int $id
 * @property int $page_id
 * @property int $product_id
 * @property int $num
 *
 * @property Pages $page
 * @property Products $product
 */
class Pageprods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pageprods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'product_id'], 'required'],
            [['page_id', 'product_id', 'num'], 'default', 'value' => null],
            [['page_id', 'product_id', 'num'], 'integer'],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pages::className(), 'targetAttribute' => ['page_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'product_id' => 'Product ID',
            'num' => 'Num',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Pages::className(), ['id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    public static function shuffleByColumn() {
        return Pageprods::updateAll(['num' => new Expression("(RANDOM() * 20) + 1")]);
    }

}
