<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
    public function up()
        {
                $this->forge->addField([
                        'post_id' => [
                            'type' => 'INT',
                            'constraint' => '11',
                            'unsigned' => true,
                            'auto_increment' => true,
                    ],
                    'judul' => [
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                    ],
                    'deskripsi' => [
                        'type' => 'TEXT',
                    ],
                    'gambar' => [
                        'type' => 'VARCHAR',
                        'constraint' => '150',
                        'null' => true,
                    ],
                    'author' => [
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                    ],
                    'kategori' => [
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                    ],
                    'slug' => [
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                        'unique' => true,
                    ],
                    'created_at' => [
                        'type' => 'VARCHAR',
                       
                    ],
                    'updated_at' => [
                        'type' => 'VARCHAR',
                        
                    ],

                ]);
                $this->forge->addKey('post_id', true);
                $this->forge->createTable('weblan');
        }

        public function down()
        {
                $this->forge->dropTable('post');
        }
}
