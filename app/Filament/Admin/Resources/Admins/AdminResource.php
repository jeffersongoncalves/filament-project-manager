<?php

namespace App\Filament\Admin\Resources\Admins;

use App\Filament\Admin\Resources\Admins\Pages\CreateAdmin;
use App\Filament\Admin\Resources\Admins\Pages\EditAdmin;
use App\Filament\Admin\Resources\Admins\Pages\ListAdmins;
use App\Filament\Admin\Resources\Admins\Pages\ViewAdmin;
use App\Filament\Admin\Resources\Admins\Schemas\AdminForm;
use App\Filament\Admin\Resources\Admins\Schemas\AdminInfolist;
use App\Filament\Admin\Resources\Admins\Tables\AdminsTable;
use App\Filament\Resources\Resource;
use App\Models\Admin;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;

use function __;

class AdminResource extends Resource
{
    protected static ?string $model = Admin::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserCircle;

    protected static bool $isGloballySearchable = true;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    public static function getModelLabel(): string
    {
        return __('Admin');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Admins');
    }

    public static function getNavigationLabel(): string
    {
        return __('Admins');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Management');
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Cache::rememberForever('admins_count', fn () => Admin::query()->count());
    }

    public static function form(Schema $schema): Schema
    {
        return AdminForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AdminInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdminsTable::configure($table);
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
            'index' => ListAdmins::route('/'),
            'create' => CreateAdmin::route('/create'),
            'view' => ViewAdmin::route('/{record}'),
            'edit' => EditAdmin::route('/{record}/edit'),
        ];
    }
}
