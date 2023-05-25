<?php

namespace Database\Seeders;

use App\Models\Master;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init_masters = [
            [
                'master_name' => 'testMaster',
                'email' => 'test@master',
                'password' => 'test',
            ],
            // ここに追加
        ];
        foreach($init_masters as $init_master) {
            $master = new Master();
            $master->master_name = $init_master['master_name'];
            $master->email = $init_master['email'];
            $master->password = Hash::make($init_master['password']);
            $master->save();
        }
    }
}
