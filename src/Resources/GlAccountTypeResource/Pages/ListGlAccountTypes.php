<?php

namespace Joinbiz\BizApp\Resources\GlAccountTypeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Joinbiz\BizApp\Resources\GlAccountTypeResource;

class ListGlAccountTypes extends ListRecords
{
    protected static string $resource = GlAccountTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
