<?php

namespace Joinbiz\BizApp\Resources\PartyResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Joinbiz\BizApp\Resources\PartyResource;

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
