<?php

use yii\db\Migration;


/**
 * Class m201002_180731_table_seed
 */
class m201002_180731_table_seed extends Migration
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
        if (!in_array('seed', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%seed}}', [
                    'id' => 'INT NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'virtue_id' => 'INT NOT NULL',
                    'seed_time' => 'TIME NOT NULL',
                    'seed_date' => 'DATE NOT NULL',
                    'user_id' => 'INT NOT NULL',
                    'description' => 'TEXT NOT NULL',
                    'is_positive' => 'TINYINT(1) NOT NULL DEFAULT \'1\'',
                    'added_at' => 'TIMESTAMP NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        $this->createIndex('idx_virtue_id_1517_00','seed','virtue_id',0);
        $this->createIndex('idx_user_id_1518_01','seed','user_id',0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk__virtue_1477_00','{{%seed}}', 'virtue_id', '{{%virtue}}', 'id', 'NO ACTION', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `seed`');
        $this->execute('SET foreign_key_checks = 1;');
    }
}
