<?php

namespace Joinbiz\BizApp\Resources\FinAccountTypeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Joinbiz\BizApp\Resources\FinAccountTypeResource;

class ListFinAccountTypes extends ListRecords
{
    protected static string $resource = FinAccountTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
