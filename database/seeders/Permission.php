<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Silber\Bouncer\Bouncer;

class Permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Silber\Bouncer\Database\Role $admin */
        $admin = Bouncer::create()->role()
            ->findOrCreateRoles(['admin'])
            ->first();
    }
}
