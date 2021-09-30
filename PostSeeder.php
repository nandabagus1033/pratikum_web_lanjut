<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $model = model('UserModel');

        $kategori =['nature','programming', 'cat', 'sport','lifestyle,','food'];

        $model->insert([
                'judul'      => static::faker()->sentence(3),
                'slug' => static::faker()->unique() ->slug(3),
                'author' => static::faker()->name(),
                'kategori' => $kategori[0],
                'deskripsi' => static::faker()->exit(),
                

        ]);
    }
}
