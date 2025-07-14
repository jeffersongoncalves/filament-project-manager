<?php

namespace App\Filament\Admin\Resources\Admins\Pages;

use App\Filament\Admin\Resources\Admins\AdminResource;
use App\Filament\Resources\Pages\Concerns\HasCombinedRelationManagerTabsWithContent;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAdmin extends ViewRecord
{
    use HasCombinedRelationManagerTabsWithContent;

    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
