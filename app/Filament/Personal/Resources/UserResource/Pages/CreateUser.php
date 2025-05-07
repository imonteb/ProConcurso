<?php

namespace App\Filament\Personal\Resources\UserResource\Pages;

use App\Filament\Personal\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
