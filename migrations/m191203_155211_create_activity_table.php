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
            'priority' => $this->integer(),
            'is_repeatable' => $this->tinyInteger(1),
            'title' => $this->string(255)->notNull(),
            'start' => $this->timestamp()->defaultExpression("now()"),
            'end' => $this->timestamp()->defaultExpression("now()"),
            'id_user' => $this->integer(),
            'status' => $this->tinyInteger(1),
            'body' => $this->text(),
            'files' => $this->text(),
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
