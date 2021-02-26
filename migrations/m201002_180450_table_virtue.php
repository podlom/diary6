<?php

use yii\db\Migration;


/**
 * Class m201002_180450_table_virtue
 */
class m201002_180450_table_virtue extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('virtue', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%virtue}}', [
                    'id' => 'INT NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'added_at' => 'TIMESTAMP NOT NULL',
                    'updated_at' => 'TIMESTAMP NULL',
                ], $tableOptions_mysql);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `virtue`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
