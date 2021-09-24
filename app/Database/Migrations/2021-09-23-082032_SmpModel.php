<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SmpModel extends Migration
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
            'authority_id'          => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
            ],
            'title'       => [
                    'type'       => 'TEXT',
                    'null' => true,
            ],
            'date_from'       => [
                    'type'       => 'DATE',
                    'null' => true,
            ],
            'date_to' => [
                    'type' => 'DATE',
                    'null' => true,
            ],
            'duration' => [
                    'type' => 'INT',
                    'null' => true,
            ],
            'created_date datetime default current_timestamp',
            'updated_at' => array(
                 'type' => 'varchar',
                 'constraint' => 250,
                 'null' => true,
                 'on update' => 'NOW()'
            ) 
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('smp_list');
    }

    public function down()
    {
        $this->forge->dropTable('smp_list');
    }
}
