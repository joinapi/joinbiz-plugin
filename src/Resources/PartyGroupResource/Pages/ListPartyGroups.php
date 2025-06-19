<?php

namespace Joinbiz\BizApp\Resources\PartyGroupResource\Pages;

use Joinbiz\BizApp\Resources\PartyGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartyGroups extends ListRecords
{
    protected static string $resource = PartyGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
