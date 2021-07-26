<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'name' => 'Моя ферари',
                'text' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum nemo, blanditiis placeat, ad officiis culpa sed perferendis hic molestiae fugiat corrupti quo neque. Distinctio repellat sed vel exercitationem quae quis!',
                'blog_id' => 1,
            ],
            [
                'name' => 'Ламба мечты',
                'text' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum nemo, blanditiis placeat, ad officiis culpa sed perferendis hic molestiae fugiat corrupti quo neque. Distinctio repellat sed vel exercitationem quae quis!',
                'blog_id' => 1,
            ],
            [
                'name' => 'Видюхи или асик',
                'text' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum nemo, blanditiis placeat, ad officiis culpa sed perferendis hic molestiae fugiat corrupti quo neque. Distinctio repellat sed vel exercitationem quae quis!',
                'blog_id' => 3,
            ],
        ]);
    }
}
