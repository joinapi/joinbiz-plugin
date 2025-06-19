<?php

namespace Joinbiz\BizApp\Resources\GlAccountTypeResource\Pages;

use Joinbiz\BizApp\Resources\GlAccountTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

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
