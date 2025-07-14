<?php

namespace App\Filament\Panel\Admin\Resources\Categories;

use App\Filament\Core\Resources\Resource;
use App\Filament\Panel\Admin\Resources\Categories\Pages\ManageCategories;
use App\Filament\Panel\Admin\Resources\Categories\Schemas\CategoryForm;
use App\Filament\Panel\Admin\Resources\Categories\Schemas\CategoryInfolist;
use App\Filament\Panel\Admin\Resources\Categories\Tables\CategoriesTable;
use App\Models\Category;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CategoriesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageCategories::route('/'),
        ];
    }
}
