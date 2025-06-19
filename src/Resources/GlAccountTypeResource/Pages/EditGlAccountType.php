<?php

namespace Joinbiz\BizApp\Resources\GlAccountTypeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Joinbiz\BizApp\Resources\GlAccountTypeResource;

class EditGlAccountType extends EditRecord
{
    protected static string $resource = GlAccountTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
