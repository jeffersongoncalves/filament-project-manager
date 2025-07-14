<?php

namespace App\Filament\Panel\Admin\Resources\Users\Pages;

use App\Filament\Panel\Admin\Resources\Users\UserResource;

class ListUsers extends \App\Filament\Core\Resources\Pages\ListRecords
{
    protected static string $resource = UserResource::class;
}
