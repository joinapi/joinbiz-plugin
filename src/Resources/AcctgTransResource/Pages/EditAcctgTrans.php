<?php

namespace Joinbiz\BizApp\Resources\AcctgTransResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Joinbiz\BizApp\Resources\AcctgTransResource;

class EditAcctgTrans extends EditRecord
{
    protected static string $resource = AcctgTransResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
