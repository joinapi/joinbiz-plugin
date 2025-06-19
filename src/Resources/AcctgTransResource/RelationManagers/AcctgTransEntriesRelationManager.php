<?php

namespace Joinbiz\BizApp\Resources\AcctgTransResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class AcctgTransEntriesRelationManager extends RelationManager
{
    protected static string $relationship = 'acctgTransEntries';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('acctg_trans_entry_seq_id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function getTableRecordKey(Model $record): string
    {
        return $record->acctg_trans_entry_seq_id;
    }

    public function table(Table $table): Table
    {
        return $table
            ->allowDuplicates(true)
            ->recordTitleAttribute('acctg_trans_entry_seq_id')
            ->recordUrl(null)
            ->searchable(false)
            ->columns([
                Tables\Columns\TextColumn::make('acctg_trans_entry_seq_id'),
                Tables\Columns\TextColumn::make('acctg_trans_entry_type_id'),
                Tables\Columns\TextColumn::make('gl_account_id'),
                Tables\Columns\TextColumn::make('glAccount.account_name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('debit_credit_flag'),
                Tables\Columns\TextColumn::make('amount'),
            ])
            ->filters([
                //
            ])
            ->defaultSort('acctg_trans_entry_seq_id')
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([

            ])
            ->bulkActions([

            ]);
    }
}
