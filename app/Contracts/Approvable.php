<?php

namespace App\Contracts;

interface Approvable
{
    public function approve();

    public function deny();
}
