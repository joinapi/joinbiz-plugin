<?php

namespace Joinbiz\BizApp\Resources\GlAccountOrganizationResource\Pages;

use Joinbiz\BizApp\Resources\GlAccountOrganizationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

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
