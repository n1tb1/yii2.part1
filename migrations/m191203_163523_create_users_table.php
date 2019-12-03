<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m191203_163523_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(30)->notNull(),
            'password' => $this->string(30)->notNull(),
            'auth_key' => $this->string(50)->notNull(),
            'access_token' => $this->string(50)->notNull(),
            'date_added' => $this->timestamp()->defaultExpression("now()"),
            'status' => $this->tinyInteger(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
