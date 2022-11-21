<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //以下を追加
    DB::table('users')->insert([
      'username' => 'UserName',
      'mail' => 'User@mail',
      'password' => Hash::make('secret'),
    ]);
  }
}
