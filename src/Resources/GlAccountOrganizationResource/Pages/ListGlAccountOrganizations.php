<?php

namespace Joinbiz\BizApp\Resources\GlAccountOrganizationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;
use Joinbiz\BizApp\Resources\GlAccountOrganizationResource;

class ListGlAccountOrganizations extends ListRecords
{
    protected static string $resource = GlAccountOrganizationResource::class;

    public function getTableRecordKey(Model $record): string
    {
        return $record->gl_account_id;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
