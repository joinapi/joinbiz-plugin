<?php

namespace Joinbiz\BizApp\Resources\AcctgTransResource\Pages;

use Joinbiz\BizApp\Resources\AcctgTransResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAcctgTrans extends ListRecords
{
    protected static string $resource = AcctgTransResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
