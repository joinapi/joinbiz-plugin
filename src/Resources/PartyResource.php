<?php

namespace Joinbiz\BizApp\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\PartyResource\Pages;
use Joinbiz\Data\Models\Party\Party;

class PartyResource extends Resource
{
    use HasCustomLabel;

    protected static ?string $model = Party::class;

    protected static ?string $navigationGroup = 'PARTY';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('party_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('external_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('preferred_currency_uom_id')
                    ->maxLength(20),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('status_id')
                    ->maxLength(20),
                Forms\Components\DateTimePicker::make('created_date'),
                Forms\Components\TextInput::make('created_by_user_login')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('last_modified_date'),
                Forms\Components\TextInput::make('last_modified_by_user_login')
                    ->maxLength(255),
                Forms\Components\TextInput::make('data_source_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('is_unread')
                    ->maxLength(1),
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
                Tables\Columns\TextColumn::make('party_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('party_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('external_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preferred_currency_uom_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_by_user_login')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_modified_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_modified_by_user_login')
                    ->searchable(),
                Tables\Columns\TextColumn::make('data_source_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_unread')
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
            'index' => Pages\ListParties::route('/'),
            'create' => Pages\CreateParty::route('/create'),
            'edit' => Pages\EditParty::route('/{record}/edit'),
        ];
    }
}
