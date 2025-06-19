<?php

namespace Joinbiz\BizApp\Resources\FinAccountTypeResource\Pages;

use Joinbiz\BizApp\Resources\FinAccountTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

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
