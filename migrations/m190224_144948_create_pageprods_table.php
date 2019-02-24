<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pageprods}}`.
 */
class m190224_144948_create_pageprods_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pageprods}}', [
            'id' => $this->integer(),
            'page_id' => $this->integer(),
            'product_id' => $this->integer(),
            'num' => $this->integer(),
        ]);
        $this->addPrimaryKey('pageprods-pk', 'pageprods', ['page_id', 'product_id']);
        Yii::$app->runAction("gii/model", ["tableName"=>"pageprods", "modelClass"=>"Pageprods", "ns"=>"\\app\\models"]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pageprods}}');
    }
}
