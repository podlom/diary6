<?php

use yii\db\Migration;
use Carbon\Carbon;


/**
 * Class m231113_150646_fill_in_virtue_table
 */
class m231113_150646_fill_in_virtue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $nowDateTime = Carbon::now()->format('Y-m-d H:i:s');

        $this->batchInsert('{{%virtue}}', ['id', 'name', 'added_at', 'updated_at'], [
            ['1', 'Have you protected life today?', $nowDateTime, $nowDateTime],
            ['2', 'Respect for the property of others.', $nowDateTime, $nowDateTime],
            ['3', 'Sexual purity. Respect for the relationships of others.', $nowDateTime, $nowDateTime],
            ['4', 'Try to be absolutely truthful throughout the day. Do not lie.', $nowDateTime, $nowDateTime],
            ['5', 'Do you speak in such a way that your words bring people together?', $nowDateTime, $nowDateTime],
            ['6', 'Talk to people gently.', $nowDateTime, $nowDateTime],
            ['7', 'Try to speak in substance.', $nowDateTime, $nowDateTime],
            ['8', 'When you see someone getting something good: rejoice.', $nowDateTime, $nowDateTime],
            ['9', 'Try to sympathize with people who are going through unhappiness.', $nowDateTime, $nowDateTime],
            ['10', 'Maintain a Buddhist worldview.', $nowDateTime, $nowDateTime],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('{{%virtue}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231113_150646_fill_in_virtue_table cannot be reverted.\n";

        return false;
    }
    */
}
