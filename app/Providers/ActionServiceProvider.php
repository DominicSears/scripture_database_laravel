<?php

namespace App\Providers;

use App\Actions;
use App\Contracts;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        // Faiths
        Contracts\Faith\ValidatesFaith::class => Actions\Faith\ValidateFaith::class,
        Contracts\Faith\ValidatesNewFaith::class => Actions\Faith\ValidateNewFaith::class,
        Contracts\Faith\CreatesFaith::class => Actions\Faith\CreateFaith::class,
        Contracts\Faith\UpdatesFaith::class => Actions\Faith\UpdateFaith::class,
        // Users
        Contracts\User\CreatesUser::class => Actions\User\CreateUser::class,
        Contracts\User\UpdatesUser::class => Actions\User\UpdateUser::class,
        Contracts\User\ValidatesUser::class => Actions\User\ValidateUser::class,
        // Denominations
        Contracts\Denomination\CreatesDenomination::class => Actions\Denomination\CreateDenomination::class,
        Contracts\Denomination\UpdatesDenomination::class => Actions\Denomination\UpdateDenomination::class,
        Contracts\Denomination\ValidatesDenomination::class => Actions\Denomination\ValidateDenomination::class,
        // Religions
        Contracts\Religion\CreatesReligion::class => Actions\Religion\CreateReligion::class,
        Contracts\Religion\UpdatesReligion::class => Actions\Religion\UpdateReligion::class,
        Contracts\Religion\ValidatesReligion::class => Actions\Religion\ValidateReligion::class,
        // Doctrines
        Contracts\Doctrine\CreatesDoctrine::class => Actions\Doctrine\CreateDoctrine::class,
        Contracts\Doctrine\ValidatesDoctrine::class => Actions\Doctrine\ValidateDoctrine::class,
        // Doctriables
        Contracts\Doctrinable\CreatesDoctrinable::class => Actions\Doctrinable\CreateDoctrinable::class,
        Contracts\Doctrinable\ValidatesDoctrinable::class => Actions\Doctrinable\ValidateDoctrinable::class
    ];
}
