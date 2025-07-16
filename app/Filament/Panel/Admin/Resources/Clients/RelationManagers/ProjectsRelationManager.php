<?php

namespace App\Filament\Panel\Admin\Resources\Clients\RelationManagers;

use App\Filament\Core\Resources\RelationManagers\RelationManager;
use App\Filament\Panel\Admin\Resources\Projects\ProjectResource;
use App\Filament\Panel\Admin\Resources\Projects\Tables\ProjectsTable;
use Filament\Tables\Table;

class ProjectsRelationManager extends RelationManager
{
    protected static string $relationship = 'projects';

    protected static ?string $relatedResource = ProjectResource::class;

    protected static ?string $recordTitleAttribute = 'name';

    public function table(Table $table): Table
    {
        return ProjectsTable::configure($table);
    }
}
