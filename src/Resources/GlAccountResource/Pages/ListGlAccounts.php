<?php

namespace Joinbiz\BizApp\Resources\GlAccountResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Joinbiz\BizApp\Resources\GlAccountResource;

class ListGlAccounts extends ListRecords
{
    protected static string $resource = GlAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
