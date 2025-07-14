<?php

namespace App\Filament\Core\Resources;

abstract class Resource extends \Filament\Resources\Resource
{
    protected static bool $isGloballySearchable = true;

    public static function getGlobalSearchResultUrl($record): string
    {
        return self::getUrl('view', ['record' => $record]);
    }
}
