<?php

use yii\db\Migration;

/**
 * Class m191205_121509_ctreate_calendar_table
 */
class m191205_121509_ctreate_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('calendar', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer()->notNull(),
            'activity_id'=>$this->integer()->notNull(),
            'created_at'=>$this->bigInteger(),
            'updated_at'=>$this->bigInteger(),
        ]);
        $this->addForeignKey('fk-activity_id-calendar', 'calendar', 'activity_id', 'activity', 'id');
        $this->addForeignKey('fk-user_id-calendar', 'calendar', 'user_id', 'user', 'id');
        $this->renameColumn('activity', 'user_id', 'author_id');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('activity', 'author_id', 'user_id');
        $this->dropForeignKey('fk-activity_id-calendar', 'calendar');
        $this->dropForeignKey('fk-user_id-calendar', 'calendar');
        $this->dropTable('calendar');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191205_121509_ctreate_calendar_table cannot be reverted.\n";

        return false;
    }
    */
}
