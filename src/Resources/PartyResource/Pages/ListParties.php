<?php

namespace Joinbiz\BizApp\Resources\PartyResource\Pages;

use Joinbiz\BizApp\Resources\PartyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParties extends ListRecords
{
    protected static string $resource = PartyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
