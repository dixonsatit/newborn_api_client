<?php

use yii\db\Migration;

/**
 * Handles the creation of table `setting`.
 */
class m161117_072120_create_setting_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
            'key' => $this->string(),
            'value' => $this->text(),
            'hcode' => $this->string(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer()
        ],$tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('settings');
    }
}
