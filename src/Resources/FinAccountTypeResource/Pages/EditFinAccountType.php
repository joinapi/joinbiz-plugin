<?php

namespace Joinbiz\BizApp\Resources\FinAccountTypeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Joinbiz\BizApp\Resources\FinAccountTypeResource;

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
