<?php

namespace Joinbiz\BizApp\Resources\GlAccountOrganizationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Joinbiz\BizApp\Resources\GlAccountOrganizationResource;

class EditGlAccountOrganization extends EditRecord
{
    protected static string $resource = GlAccountOrganizationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
