<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%parameters}}`.
 */
class m240809_133955_create_parameters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%parameters}}', [
            'id'    => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'type'  => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%parameters}}');
    }
}
