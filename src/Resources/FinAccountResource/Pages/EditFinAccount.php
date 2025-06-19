<?php

namespace Joinbiz\BizApp\Resources\FinAccountResource\Pages;

use Joinbiz\BizApp\Resources\FinAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFinAccount extends EditRecord
{
    protected static string $resource = FinAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
