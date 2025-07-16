<?php

namespace App\Filament\Panel\Admin\Resources\Projects;

use App\Filament\Core\Resources\Resource;
use App\Filament\Panel\Admin\Resources\Projects\Pages\CreateProject;
use App\Filament\Panel\Admin\Resources\Projects\Pages\EditProject;
use App\Filament\Panel\Admin\Resources\Projects\Pages\ListProjects;
use App\Filament\Panel\Admin\Resources\Projects\Pages\ViewProject;
use App\Filament\Panel\Admin\Resources\Projects\Schemas\ProjectForm;
use App\Filament\Panel\Admin\Resources\Projects\Schemas\ProjectInfolist;
use App\Filament\Panel\Admin\Resources\Projects\Tables\ProjectsTable;
use App\Models\Project;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    public static function getModelLabel(): string
    {
        return __('Project');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Projects');
    }

    public static function getNavigationLabel(): string
    {
        return __('Projects');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Project');
    }

    public static function getNavigationBadge(): ?string
    {
        return (string)Cache::rememberForever('projects_count', fn() => Project::query()->count());
    }

    public static function form(Schema $schema): Schema
    {
        return ProjectForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProjectInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProjects::route('/'),
            'create' => CreateProject::route('/create'),
            'view' => ViewProject::route('/{record}'),
            'edit' => EditProject::route('/{record}/edit'),
        ];
    }
}
