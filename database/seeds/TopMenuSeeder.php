<?php

use Illuminate\Database\Seeder;

class TopMenuSeeder extends Seeder
{

    private $top_menu = [
        [
            'id' => 1,
            'title' => 'Моя страница',
            'url'=> '/home',
            'drop_id' => null
        ],
        [
            'id' => 2,
            'title' => 'Сообщения',
            'url'=> '/messages',
            'drop_id' => null
        ],
        [
            'id' => 3,
            'title' => 'Читатели',
            'url'=> '/readers',
            'drop_id' => null
        ],
        [
            'id' => 4,
            'title' => 'Библиотека',
            'url'=> null,
            'drop_id' => null
        ],
//        [
//            'id' => 4,
//            'title' => 'Библиотека',
//            'url'=> null,
//            'drop_id' => 4
//        ],
//        [
//            'id' => 4,
//            'title' => 'Библиотека',
//            'url'=> null,
//            'drop_id' => 4
//        ],
        [
            'id' => 5,
            'title' => 'Подписки',
            'url'=> null,
            'drop_id' => null
        ],
        [
            'id' => 6,
            'title' => 'Личные страницы',
            'url'=> '/subscriptions/personal_page',
            'drop_id' => 5
        ],
        [
            'id' => 7,
            'title' => 'Сообщества',
            'url'=> '/subscriptions/groups',
            'drop_id' => 5
        ],

    ];

    public function run()
    {
        foreach ($this->top_menu as $menu) {
            DB::table('top_menu')->insert([
                'id' => $menu['id'],
                'title' => $menu['title'],
                'url'=> $menu['url'],
                'drop_id' => $menu['drop_id']
            ]);
        }

    }
}
