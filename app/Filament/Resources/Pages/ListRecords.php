<?php

namespace App\Filament\Resources\Pages;

use Filament\Actions\CreateAction;

abstract class ListRecords extends \Filament\Resources\Pages\ListRecords
{
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
