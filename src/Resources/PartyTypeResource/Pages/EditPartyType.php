<?php

namespace Joinbiz\BizApp\Resources\PartyTypeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Joinbiz\BizApp\Resources\PartyTypeResource;

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
