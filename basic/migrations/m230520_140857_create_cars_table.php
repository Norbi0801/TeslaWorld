<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cars}}`.
 */
class m230520_140857_create_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cars}}', [
            'id' => $this->primaryKey(),
            'id_brand' => $this->integer(11),
            'model' => $this->string()->notNull(),
            'production_year' => $this->integer(11),
            'mileage' => $this->integer()->notNull(),
            'id_status' => $this->integer(),
        ]);

        $this->addForeignKey('fk-cars-id_brand', '{{%cars}}', 'id_brand', '{{%cars_brands}}', 'id');

        $this->addForeignKey('fk-cars-id_status', '{{%cars}}', 'id_status', '{{%availability}}', 'id');
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cars}}');
    }
}
