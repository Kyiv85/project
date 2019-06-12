<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0;$i<5;$i++){
        DB::table('clients')->insert([
          'nombre' => Str::random(20),
          'apellido' => Str::random(20),
          'email' => Str::random(10).'@gmail.com',
          'created_at' => date("Y-m-d H:i:s"),
        ]);
      }
    }
}
