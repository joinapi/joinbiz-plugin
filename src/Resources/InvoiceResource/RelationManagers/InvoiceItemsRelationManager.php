<?php

namespace Joinbiz\BizApp\Resources\InvoiceResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'invoiceItems';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('invoice_item_seq_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }
    public function getTableRecordKey(Model $record): string
    {
        return $record->invoice_item_seq_id;
    }
    public function table(Table $table): Table
    {
        return $table
            ->searchable(false)
            ->allowDuplicates(true)
            ->recordTitleAttribute('invoice_item_seq_id')
            ->recordUrl(null)
            ->columns([
                Tables\Columns\TextColumn::make('invoice_item_seq_id'),
                Tables\Columns\TextColumn::make('invoice_item_type_id'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('amount')
                    ->alignRight()
                    ->money('BRL')
                    ->summarize(Sum::make()->money('BRL')),
            ])
            ->defaultSort('invoice_item_seq_id')
            ->actions([

            ])
            ->bulkActions([

            ]);
    }
}
