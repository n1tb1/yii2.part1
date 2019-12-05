<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%idx_fk_for_activity}}`.
 */
class m191203_203558_create_idx_fk_for_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('activity_user_index', '{{%activity}}', ['user_id']);
        $this->addForeignKey('fk_user_id', '{{%activity}}', ['user_id'], '{{%user}}', ['id'], 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_id', '{{%activity}}');
        $this->dropIndex('activity_user_index', '{{%activity}}');
    }
}
