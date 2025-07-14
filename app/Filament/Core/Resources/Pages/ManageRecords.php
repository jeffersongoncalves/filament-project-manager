<?php

namespace App\Filament\Core\Resources\Pages;

use Filament\Actions\CreateAction;

abstract class ManageRecords extends \Filament\Resources\Pages\ManageRecords
{
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
