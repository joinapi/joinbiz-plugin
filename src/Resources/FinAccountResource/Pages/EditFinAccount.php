<?php

namespace Joinbiz\BizApp\Resources\FinAccountResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Joinbiz\BizApp\Resources\FinAccountResource;

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
