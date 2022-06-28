<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Silber\Bouncer\Bouncer;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::create()->role([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);
    }
}
