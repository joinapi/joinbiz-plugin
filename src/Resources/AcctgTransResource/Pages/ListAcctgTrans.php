<?php

namespace Joinbiz\BizApp\Resources\AcctgTransResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Joinbiz\BizApp\Resources\AcctgTransResource;

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
