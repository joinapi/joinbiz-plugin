<?php

namespace Joinbiz\BizApp\Resources\PartyGroupResource\Pages;

use Joinbiz\BizApp\Resources\PartyGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartyGroup extends EditRecord
{
    protected static string $resource = PartyGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
