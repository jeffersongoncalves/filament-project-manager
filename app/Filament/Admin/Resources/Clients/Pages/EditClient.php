<?php

namespace App\Filament\Admin\Resources\Clients\Pages;

use App\Filament\Admin\Resources\Clients\ClientResource;
use App\Filament\Resources\Pages\Concerns\HasCombinedRelationManagerTabsWithContent;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use App\Filament\Resources\Pages\EditRecord;

class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;
}
