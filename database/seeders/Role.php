<?php

namespace Database\Seeders;

use Silber\Bouncer\Bouncer;
use Illuminate\Database\Seeder;

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
