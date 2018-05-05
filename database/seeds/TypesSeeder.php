<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
			[ 'name' => 'Аксесуары' ],
			[ 'name' => 'Джинсы' ],
			[ 'name' => 'Рубашки' ],
			[ 'name' => 'Куртки' ],
			[ 'name' => 'Платья' ],
			[ 'name' => 'Майки' ],
			[ 'name' => 'Юбки' ],
			[ 'name' => 'Шорты' ],
			[ 'name' => 'Штаны' ],
		]);
    }
}
