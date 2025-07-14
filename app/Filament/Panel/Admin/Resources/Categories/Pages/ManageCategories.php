<?php

namespace App\Filament\Panel\Admin\Resources\Categories\Pages;

use App\Filament\Panel\Admin\Resources\Categories\CategoryResource;
use Filament\Actions\CreateAction;
use App\Filament\Core\Resources\Pages\ManageRecords;

class ManageCategories extends ManageRecords
{
    protected static string $resource = CategoryResource::class;
}
