<?php

namespace App\Filament\Panel\Admin\Resources\Categories\Schemas;

use App\Filament\Core\Schemas\Components\AdditionalInformation;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make()
                    ->schema([
                        TextEntry::make('id'),
                        TextEntry::make('name'),
                    ]),
                AdditionalInformation::make([
                    'created_at',
                    'updated_at',
                ]),
            ]);
    }
}
