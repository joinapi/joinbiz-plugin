<?php

namespace Joinbiz\BizApp\Resources;

use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\FinAccountResource\Pages;
use Joinbiz\BizApp\Resources\FinAccountResource\RelationManagers;
use Joinbiz\BizApp\Resources\FinAccountResource\Widgets\FinAccountOverview;
use Illuminate\Support\Facades\Log;
use Joinbiz\Data\Models\Accounting\FinAccount;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use function Filament\Support\get_model_label;

class FinAccountResource extends Resource
{
    use HasCustomLabel;
    protected static ?string $navigationGroup = 'ACCOUNTING';
    protected static ?string $model = FinAccount::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('fin_account_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('status_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('fin_account_name')
                    ->maxLength(100),
                Forms\Components\TextInput::make('fin_account_code')
                    ->maxLength(255),
                Forms\Components\TextInput::make('fin_account_pin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('currency_uom_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('organization_party_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('owner_party_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('post_to_gl_account_id')
                    ->maxLength(20),
                Forms\Components\DateTimePicker::make('from_date'),
                Forms\Components\DateTimePicker::make('thru_date'),
                Forms\Components\TextInput::make('is_refundable')
                    ->maxLength(1),
                Forms\Components\TextInput::make('replenish_payment_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('replenish_level')
                    ->numeric(),
                Forms\Components\TextInput::make('actual_balance')
                    ->numeric(),
                Forms\Components\TextInput::make('available_balance')
                    ->numeric(),
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
                Tables\Columns\TextColumn::make('fin_account_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fin_account_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('organization_party_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('owner_party_id')
                    ->toggleable( isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('post_to_gl_account_id')
                    ->toggleable( isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('from_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('thru_date')
                    ->dateTime()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_refundable')
                    ->toggleable( isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('replenish_payment_id')
                    ->toggleable( isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('replenish_level')
                    ->toggleable( isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextInputColumn::make('actual_balance')
                    ->type('number')
                    ->beforeStateUpdated(function ($record, $state) {
                        Log::debug('beforeStateUpdated: ' . $state);;
                    })
                    ->afterStateUpdated(function ($record, $state) {
                        Log::debug('afterStateUpdated: ' . $state);;
                    }),
                Tables\Columns\TextColumn::make('available_balance')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_updated_stamp')
                    ->dateTime()
                    ->toggleable( isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_updated_tx_stamp')
                    ->dateTime()
                    ->toggleable( isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_stamp')
                    ->dateTime()
                    ->toggleable( isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_tx_stamp')
                    ->dateTime()
                    ->toggleable( isToggledHiddenByDefault: true)
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->groups([
                Tables\Grouping\Group::make('created_stamp')
                    ->label('DATA')
                    ->date()
                    ->collapsible(),
            ])
            ->searchable(false)
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
            RelationManagers\FinAccountTransRelationManager::class
        ];
    }
    public static function getWidgets(): array
    {
        return [
            FinAccountOverview::class,
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFinAccounts::route('/'),
            'create' => Pages\CreateFinAccount::route('/create'),
            'edit' => Pages\EditFinAccount::route('/{record}/edit'),
        ];
    }
}
