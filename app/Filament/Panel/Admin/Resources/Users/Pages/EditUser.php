<?php

namespace App\Filament\Panel\Admin\Resources\Users\Pages;

use App\Filament\Core\Resources\Pages\EditRecord;
use App\Filament\Panel\Admin\Resources\Users\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
}
