<?php

namespace Joinbiz\BizApp\Resources\GlAccountClassResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Joinbiz\BizApp\Resources\GlAccountClassResource;

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
