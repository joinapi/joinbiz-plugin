<?php

namespace Joinbiz\BizApp\Resources\PaymentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Joinbiz\BizApp\Resources\PaymentResource;

class ListPayments extends ListRecords
{
    protected static string $resource = PaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
