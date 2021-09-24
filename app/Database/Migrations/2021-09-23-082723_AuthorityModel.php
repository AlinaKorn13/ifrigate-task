<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthorityModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'title'       => [
                    'type'       => 'TEXT',
                    'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('authority');
    }

    public function down()
    {
        $this->forge->dropTable('authority');
    }
}
