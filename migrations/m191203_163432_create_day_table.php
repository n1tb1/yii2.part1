<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%day}}`.
 */
class m191203_163432_create_day_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%day}}', [
            'id' => $this->primaryKey(),
            'type' => $this->tinyInteger(1),
            'date' => $this->timestamp()->notNull(),
            'activities' => $this->text(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%day}}');
    }
}
