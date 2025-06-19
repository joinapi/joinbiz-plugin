<?php

namespace Joinbiz\BizApp\Resources\PartyTypeResource\Pages;

use Joinbiz\BizApp\Resources\PartyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartyType extends EditRecord
{
    protected static string $resource = PartyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
