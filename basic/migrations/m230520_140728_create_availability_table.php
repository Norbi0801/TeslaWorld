<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%availability}}`.
 */
class m230520_140728_create_availability_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%availability}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%availability}}');
    }
}
