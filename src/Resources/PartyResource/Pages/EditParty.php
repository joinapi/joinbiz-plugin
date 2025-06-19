<?php

namespace Joinbiz\BizApp\Resources\PartyResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Joinbiz\BizApp\Resources\PartyResource;

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
