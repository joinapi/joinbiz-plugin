<?php

namespace Joinbiz\BizApp\Resources\PersonResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Joinbiz\BizApp\Resources\PersonResource;

class ListPeople extends ListRecords
{
    protected static string $resource = PersonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
