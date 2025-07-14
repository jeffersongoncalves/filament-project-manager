<?php

namespace App\Filament\Panel\Admin\Resources\Users\Pages;

use App\Filament\Panel\Admin\Resources\Users\UserResource;

class CreateUser extends \App\Filament\Core\Resources\Pages\CreateRecord
{
    protected static string $resource = UserResource::class;
}
