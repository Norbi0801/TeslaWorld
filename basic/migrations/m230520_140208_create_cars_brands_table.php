<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cars_brands}}`.
 */
class m230520_140208_create_cars_brands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cars_brands}}', [
            'id' => $this->primaryKey(),
            'brand' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cars_brands}}');
    }
}
