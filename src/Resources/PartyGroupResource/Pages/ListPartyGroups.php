<?php

namespace Joinbiz\BizApp\Resources\PartyGroupResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Joinbiz\BizApp\Resources\PartyGroupResource;

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
