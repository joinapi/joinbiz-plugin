<?php

namespace Joinbiz\BizApp\Resources\PartyGroupResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Joinbiz\BizApp\Resources\PartyGroupResource;

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
