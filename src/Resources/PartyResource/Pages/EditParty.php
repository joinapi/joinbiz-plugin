<?php

namespace Joinbiz\BizApp\Resources\PartyResource\Pages;

use Joinbiz\BizApp\Resources\PartyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParty extends EditRecord
{
    protected static string $resource = PartyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
