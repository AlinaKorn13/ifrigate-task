<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Authority extends Seeder
{
    public function run()
    {
        $data = [
            ['title' => 'Роспотребнадзор'],
            ['title' => 'Природоохрана'],
            ['title' => 'Роскомнадзор'],
        ];

        foreach ($data as $row) {
            $this->db->table('authority')->insert($row);
        }
    }
}
