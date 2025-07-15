<?php

namespace App\Filament\Panel\Admin\Resources\Projects\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('client_id')
                    ->relationship('client', 'name')
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                RichEditor::make('problems')
                    ->columnSpanFull(),
                RichEditor::make('solutions')
                    ->columnSpanFull(),
                RichEditor::make('descriptions')
                    ->columnSpanFull(),
            ]);
    }
}
