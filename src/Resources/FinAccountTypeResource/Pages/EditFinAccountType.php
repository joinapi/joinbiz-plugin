<?php

namespace Joinbiz\BizApp\Resources\FinAccountTypeResource\Pages;

use Joinbiz\BizApp\Resources\FinAccountTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFinAccountType extends EditRecord
{
    protected static string $resource = FinAccountTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
