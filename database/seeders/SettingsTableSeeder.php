<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = DB::table('settings')->insert([
            'logo' => '/link',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem autem nam repellendus iure cupiditate, temporibus molestias nostrum consequuntur, numquam, soluta amet? Ex alias unde exercitationem, reiciendis ea maxime perferendis recusandae!'
        ]);
    }
}
