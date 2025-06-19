<?php

namespace Joinbiz\BizApp\Resources\GlAccountResource\Pages;

use Joinbiz\BizApp\Resources\GlAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGlAccount extends EditRecord
{
    protected static string $resource = GlAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
