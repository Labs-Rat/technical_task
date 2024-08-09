<?php

use yii\db\Migration;

/**
 * Class m240809_135034_insert_parameters_table
 */
class m240809_135034_insert_parameters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            $this->insert('parameters', [
                'title' => $faker->word,
                'type'  => rand(1, 2)
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240809_135034_insert_parameters_table cannot be reverted.\n";

        return false;
    }
}
