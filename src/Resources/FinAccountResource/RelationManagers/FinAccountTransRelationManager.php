<?php

namespace Joinbiz\BizApp\Resources\FinAccountResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class FinAccountTransRelationManager extends RelationManager
{
    protected static string $relationship = 'finAccountTrans';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('fin_account_trans_type_id')
                    ->relationship('finAccountTransType', 'fin_account_trans_type_id')
                    ->required(),
                Forms\Components\Select::make('status_id')
                    ->relationship('statusItem', 'status_id', modifyQueryUsing: fn (Builder $query) => $query->where('status_type_id', 'FINACT_TRNS_STATUS'))
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('fin_account_trans_id')
            ->columns([
                Tables\Columns\TextColumn::make('fin_account_trans_id'),
                Tables\Columns\TextColumn::make('fin_account_trans_type_id'),
                Tables\Columns\TextColumn::make('transaction_date')->date('d/m/Y'),
                Tables\Columns\TextColumn::make('payment_id'),
                Tables\Columns\TextColumn::make('amount')->money('BRL'),
                Tables\Columns\TextColumn::make('status_id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
