<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%parameters_images}}`.
 */
class m240809_151951_create_parameters_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%parameters_images}}', [
            'id'           => $this->primaryKey(),
            'path'         => $this->string()->notNull(),
            'primary_name' => $this->string()->notNull(),
            'icon_type'    => $this->integer(1)->notNull(),
            'parameter_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%parameters_images}}');
    }
}
