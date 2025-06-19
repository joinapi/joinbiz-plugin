<?php

namespace Joinbiz\BizApp\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\GlAccountOrganizationResource\Pages;
use Joinbiz\Data\Models\Accounting\GlAccountOrganization;

class GlAccountOrganizationResource extends Resource
{
    use HasCustomLabel;

    protected static ?string $model = GlAccountOrganization::class;

    protected static ?string $navigationGroup = 'ACCOUNTING';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('gl_account_id')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('organization_party_id')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('role_type_id')
                    ->maxLength(20),
                Forms\Components\DateTimePicker::make('from_date'),
                Forms\Components\DateTimePicker::make('thru_date'),
                Forms\Components\DateTimePicker::make('last_updated_stamp'),
                Forms\Components\DateTimePicker::make('last_updated_tx_stamp'),
                Forms\Components\DateTimePicker::make('created_stamp'),
                Forms\Components\DateTimePicker::make('created_tx_stamp'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->searchable(false)
            ->allowDuplicates(true)
            ->recordTitleAttribute('gl_account_id')
            ->columns([
                Tables\Columns\TextColumn::make('glAccount.account_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('glAccount.account_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization_party_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('from_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('thru_date')
                    ->dateTime()
                    ->sortable(),
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
            ])->recordUrl(null)
            ->filters([
                //
            ])
            ->defaultSort('gl_account_id')
            ->actions([

            ])
            ->bulkActions([

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
            'index' => Pages\ListGlAccountOrganizations::route('/'),
            'create' => Pages\CreateGlAccountOrganization::route('/create'),
            'edit' => Pages\EditGlAccountOrganization::route('/{record}/edit'),
        ];
    }
}
