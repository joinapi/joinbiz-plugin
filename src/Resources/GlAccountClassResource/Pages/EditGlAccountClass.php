<?php

namespace Joinbiz\BizApp\Resources\GlAccountClassResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Joinbiz\BizApp\Resources\GlAccountClassResource;

class EditGlAccountClass extends EditRecord
{
    protected static string $resource = GlAccountClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
