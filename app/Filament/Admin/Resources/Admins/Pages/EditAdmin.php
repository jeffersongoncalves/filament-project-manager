<?php

namespace App\Filament\Admin\Resources\Admins\Pages;

use App\Filament\Admin\Resources\Admins\AdminResource;
use App\Filament\Resources\Pages\Concerns\HasCombinedRelationManagerTabsWithContent;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use App\Filament\Resources\Pages\EditRecord;

class EditAdmin extends EditRecord
{
    protected static string $resource = AdminResource::class;
}
