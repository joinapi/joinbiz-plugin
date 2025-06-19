<?php

namespace Joinbiz\BizApp\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\PartyGroupResource\Pages;
use Joinbiz\Data\Models\Party\PartyGroup;

class PartyGroupResource extends Resource
{
    use HasCustomLabel;

    protected static ?string $model = PartyGroup::class;

    protected static ?string $navigationGroup = 'PARTY';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('group_name')
                    ->maxLength(100),
                Forms\Components\TextInput::make('group_name_local')
                    ->maxLength(100),
                Forms\Components\TextInput::make('office_site_name')
                    ->maxLength(100),
                Forms\Components\TextInput::make('annual_revenue')
                    ->numeric(),
                Forms\Components\TextInput::make('num_employees')
                    ->numeric(),
                Forms\Components\TextInput::make('ticker_symbol')
                    ->maxLength(10),
                Forms\Components\TextInput::make('comments')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('logo_image_url')
                    ->image(),
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
                Tables\Columns\TextColumn::make('group_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('group_name_local')
                    ->searchable(),
                Tables\Columns\TextColumn::make('office_site_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('annual_revenue')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('num_employees')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ticker_symbol')
                    ->searchable(),
                Tables\Columns\TextColumn::make('comments')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('logo_image_url'),
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
            'index' => Pages\ListPartyGroups::route('/'),
            'create' => Pages\CreatePartyGroup::route('/create'),
            'edit' => Pages\EditPartyGroup::route('/{record}/edit'),
        ];
    }
}
