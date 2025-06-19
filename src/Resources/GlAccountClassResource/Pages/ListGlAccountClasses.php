<?php

namespace Joinbiz\BizApp\Resources\GlAccountClassResource\Pages;

use Joinbiz\BizApp\Resources\GlAccountClassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGlAccountClasses extends ListRecords
{
    protected static string $resource = GlAccountClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
