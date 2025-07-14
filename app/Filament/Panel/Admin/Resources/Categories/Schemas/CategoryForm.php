<?php

namespace App\Filament\Panel\Admin\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make()
                    ->columns()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->unique('categories', 'name', ignoreRecord: true)
                            ->string()
                            ->autofocus()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
