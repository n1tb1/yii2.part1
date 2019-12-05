<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activity}}`.
 */
class m191203_155211_create_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%activity}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'started_at' => $this->bigInteger(),
            'finished_at' => $this->bigInteger(),
            'user_id' => $this->integer(),
            'main' => $this->boolean(),
            'cycle' => $this->boolean(),
            'created_at' => $this->bigInteger(),
            'updated_at' => $this->bigInteger()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%activity}}');
    }
}
