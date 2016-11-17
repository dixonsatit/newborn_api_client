<?php

use yii\db\Migration;

class m161117_154233_add_default_user extends Migration
{
    public function up()
    {
        $this->insert('user', [
            'username' => 'admin',
            'email' => 'dixonsatit@gmail.com',
            'password_hash' => '$2y$10$jLqXzONpC.YIcJg4ucfs8OpWQrw8PDvXfdxi8kGVAa0Y/50soaE76',
            'auth_key' => 'hAJFnjkHpbf-J3gCqX2NdIzWMXIkw1Az',
            'confirmed_at' => '1470113301',
            'registration_ip' => '172.18.0.1',
            'created_at' => '1470113301',
            'updated_at' => '1470113301',
            'flags' => 0,
            'access_token' => '8M1jtifCZ8SkfnsZRdBSLSKr'.time()
        ]);

        $this->insert('profile', [
            'user_id' => '1'
        ]);
    }

    public function down()
    {
        echo "m161117_154233_add_default_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
