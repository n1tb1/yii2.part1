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
        $this->createIndex('activity_user_index', '{{%activity}}', ['id_user']);
        $this->addForeignKey('fk_id_user', '{{%activity}}', ['id_user'], '{{%users}}', ['id'], 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('activity_user_index', '{{%activity}}');
        $this->dropForeignKey('fk_id_user', '{{%activity}}');
    }
}
