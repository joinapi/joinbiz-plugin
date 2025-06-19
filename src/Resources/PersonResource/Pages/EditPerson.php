<?php

namespace Joinbiz\BizApp\Resources\PersonResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Joinbiz\BizApp\Resources\PersonResource;

class EditPerson extends EditRecord
{
    protected static string $resource = PersonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
