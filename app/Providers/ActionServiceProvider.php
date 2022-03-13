<?php

namespace App\Providers;

use App\Actions;
use App\Contracts;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        Contracts\Faith\ValidatesFaith::class => Actions\Faith\ValidateFaith::class,
        Contracts\Faith\ValidatesNewFaith::class => Actions\Faith\ValidateNewFaith::class,
        Contracts\Faith\CreatesFaith::class => Actions\Faith\CreateFaith::class,
        Contracts\Faith\UpdatesFaith::class => Actions\Faith\UpdateFaith::class,
        Contracts\User\CreatesUser::class => Actions\User\CreateUser::class,
        Contracts\User\UpdatesUser::class => Actions\User\UpdateUser::class,
        Contracts\User\ValidatesUser::class => Actions\User\ValidateUser::class,
        Contracts\Denomination\CreatesDenomination::class => Actions\Denomination\CreateDenomination::class,
        Contracts\Denomination\UpdatesDenomination::class => Actions\Denomination\UpdateDenomination::class,
        Contracts\Denomination\ValidatesDenomination::class => Actions\Denomination\ValidateDenomination::class,
        Contracts\Religion\CreatesReligion::class => Actions\Religion\CreateReligion::class,
        Contracts\Religion\UpdatesReligion::class => Actions\Religion\UpdateReligion::class,
        Contracts\Religion\ValidatesReligion::class => Actions\Religion\ValidateReligion::class
    ];
}