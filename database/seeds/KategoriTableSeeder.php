<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Truncating Kategori tables');
        $this->truncateLaratrustTables();
        $config = config('kategori_seeder.kategorisStructure');
        foreach($config as $key){
            $kategori = \App\Kategori::create([
                'name' => $key
            ]);
        }
    }
    public function truncateLaratrustTables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('kategoris')->truncate();
        \App\Kategori::truncate();
        Schema::enableForeignKeyConstraints();
    }

}
