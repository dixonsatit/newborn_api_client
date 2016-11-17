<?php

use yii\db\Migration;

/**
 * Handles adding access_token to table `user`.
 */
class m161117_154139_add_access_token_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'access_token', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'access_token');
    }
}
