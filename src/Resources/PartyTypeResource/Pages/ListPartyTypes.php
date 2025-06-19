<?php

namespace Joinbiz\BizApp\Resources\PartyTypeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Joinbiz\BizApp\Resources\PartyTypeResource;

class ListPartyTypes extends ListRecords
{
    protected static string $resource = PartyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
