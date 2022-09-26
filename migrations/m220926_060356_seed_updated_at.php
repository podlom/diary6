<?php

use yii\db\Migration;

/**
 * Class m220926_060356_seed_updated_at
 */
class m220926_060356_seed_updated_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%seed}}', 'updated_at', $this->timestamp()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%seed}}', 'updated_at');
    }
}
