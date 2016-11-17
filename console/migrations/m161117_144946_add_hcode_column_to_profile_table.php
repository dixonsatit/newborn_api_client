<?php

use yii\db\Migration;

/**
 * Handles adding hcode to table `profile`.
 */
class m161117_144946_add_hcode_column_to_profile_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('profile', 'hcode', $this->string(6));
        $this->addColumn('profile', 'province_code', $this->string(6));
        $this->addColumn('profile', 'title', $this->string(50));
        $this->addColumn('profile', 'fname', $this->string());
        $this->addColumn('profile', 'lname', $this->string());
        $this->addColumn('profile', 'position', $this->string());
        $this->addColumn('profile', 'position_level', $this->string(150));
        $this->addColumn('profile', 'position_type', $this->integer());
        $this->addColumn('profile', 'tel', $this->string(20));
        $this->addColumn('profile', 'mobile', $this->string(20));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('profile', 'hcode');
    }
}
