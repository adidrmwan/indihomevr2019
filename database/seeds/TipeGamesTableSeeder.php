<?php

use Illuminate\Database\Seeder;

class TipeGamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipe_games')->delete();
        
        DB::table('tipe_games')->insert([
            'id' => '1',
            'nama' => 'Puzzle',
            'deskripsi' => 'Game Bergenre Puzzle',
        ]);

        DB::table('tipe_games')->insert([
            'id' => '2',
            'nama' => 'Arcade',
            'deskripsi' => 'Game Bergenre Arcade',
        ]);
    }
}
