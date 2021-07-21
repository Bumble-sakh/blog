<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'name' => 'Тачки',
                'description' => 'Блог про мои тачки. Как они мне нравятся и как я на них заработал.',
                'user_id' => 1,
            ],
            [
                'name' => 'Дома',
                'description' => 'Блог про мои дома. Как делал в них ремонт и ка они мне дороги.',
                'user_id' => 1,
            ],
            [
                'name' => 'Биткоин',
                'description' => 'Новая валюта или нова пирамида. Как я майнил и продавал.',
                'user_id' => 2,
            ],
        ]);
    }
}
