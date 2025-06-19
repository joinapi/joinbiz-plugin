<?php

namespace Joinbiz\BizApp\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\FinAccountTypeResource\Pages;
use Joinbiz\Data\Models\Accounting\FinAccountType;

class FinAccountTypeResource extends Resource
{
    protected static ?string $model = FinAccountType::class;

    use HasCustomLabel;

    protected static ?string $navigationGroup = 'ACCOUNTING';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('parent_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('replenish_enum_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('is_refundable')
                    ->maxLength(1),
                Forms\Components\TextInput::make('has_table')
                    ->maxLength(1),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('last_updated_stamp'),
                Forms\Components\DateTimePicker::make('last_updated_tx_stamp'),
                Forms\Components\DateTimePicker::make('created_stamp'),
                Forms\Components\DateTimePicker::make('created_tx_stamp'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fin_account_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('replenish_enum_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_refundable')
                    ->searchable(),
                Tables\Columns\TextColumn::make('has_table')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_updated_stamp')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_updated_tx_stamp')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_stamp')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_tx_stamp')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFinAccountTypes::route('/'),
            'create' => Pages\CreateFinAccountType::route('/create'),
            'edit' => Pages\EditFinAccountType::route('/{record}/edit'),
        ];
    }
}
