<?php

namespace App\Filament\Resources\Pages\Concerns;

trait HasCombinedRelationManagerTabsWithContent
{
    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return count(self::getResource()::getRelations()) > 0;
    }
}
