<?php

namespace App\Filament\Core\Resources\Pages;

use App\Filament\Core\Resources\Pages\Concerns\HasCombinedRelationManagerTabsWithContent;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;

abstract class ViewRecord extends \Filament\Resources\Pages\ViewRecord
{
    use HasCombinedRelationManagerTabsWithContent;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
