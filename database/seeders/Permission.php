<?php

namespace Database\Seeders;

use Silber\Bouncer\Bouncer;
use Illuminate\Database\Seeder;

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
