<?php

namespace Joinbiz\BizApp\Resources;

use Joinbiz\BizApp\Resources\PartyTypeResource\Pages;
use Joinbiz\BizApp\Resources\PartyTypeResource\RelationManagers;
use Joinbiz\Data\Models\Party\PartyType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Joinbiz\BizApp\Concerns\HasCustomLabel;

class PartyTypeResource extends Resource
{
    use HasCustomLabel;

    protected static ?string $model = PartyType::class;
    protected static ?string $navigationGroup = 'PARTY';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('parent_type_id')
                    ->maxLength(20),
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
                Tables\Columns\TextColumn::make('party_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_type_id')
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
            'index' => Pages\ListPartyTypes::route('/'),
            'create' => Pages\CreatePartyType::route('/create'),
            'edit' => Pages\EditPartyType::route('/{record}/edit'),
        ];
    }
}
