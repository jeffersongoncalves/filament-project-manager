<?php

namespace App\Filament\Resources\Pages;

use App\Filament\Resources\Pages\Concerns\HasCombinedRelationManagerTabsWithContent;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;

abstract class EditRecord extends \Filament\Resources\Pages\EditRecord
{
    use HasCombinedRelationManagerTabsWithContent;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
