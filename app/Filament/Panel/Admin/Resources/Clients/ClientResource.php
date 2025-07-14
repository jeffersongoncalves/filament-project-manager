<?php

namespace App\Filament\Panel\Admin\Resources\Clients;

use App\Filament\Core\Resources\Resource;
use App\Filament\Panel\Admin\Resources\Clients\Pages\CreateClient;
use App\Filament\Panel\Admin\Resources\Clients\Pages\EditClient;
use App\Filament\Panel\Admin\Resources\Clients\Pages\ListClients;
use App\Filament\Panel\Admin\Resources\Clients\Pages\ViewClient;
use App\Filament\Panel\Admin\Resources\Clients\RelationManagers\UsersRelationManager;
use App\Filament\Panel\Admin\Resources\Clients\Schemas\ClientForm;
use App\Filament\Panel\Admin\Resources\Clients\Schemas\ClientInfolist;
use App\Filament\Panel\Admin\Resources\Clients\Tables\ClientsTable;
use App\Models\Client;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    public static function getModelLabel(): string
    {
        return __('Client');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Clients');
    }

    public static function getNavigationLabel(): string
    {
        return __('Clients');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Client');
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Cache::rememberForever('clients_count', fn () => Client::query()->count());
    }

    public static function form(Schema $schema): Schema
    {
        return ClientForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClientInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClientsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClients::route('/'),
            'create' => CreateClient::route('/create'),
            'view' => ViewClient::route('/{record}'),
            'edit' => EditClient::route('/{record}/edit'),
        ];
    }
}
