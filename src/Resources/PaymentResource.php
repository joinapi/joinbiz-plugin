<?php

namespace Joinbiz\BizApp\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\PaymentResource\Pages;
use Joinbiz\Data\Models\Accounting\Payment;

class PaymentResource extends Resource
{
    use HasCustomLabel;

    protected static ?string $navigationGroup = 'ACCOUNTING';

    protected static ?string $model = Payment::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('payment_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('payment_method_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('payment_method_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('payment_gateway_response_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('payment_preference_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('party_id_from')
                    ->maxLength(20),
                Forms\Components\TextInput::make('party_id_to')
                    ->maxLength(20),
                Forms\Components\TextInput::make('role_type_id_to')
                    ->maxLength(20),
                Forms\Components\TextInput::make('status_id')
                    ->maxLength(20),
                Forms\Components\DateTimePicker::make('effective_date'),
                Forms\Components\TextInput::make('payment_ref_num')
                    ->maxLength(60),
                Forms\Components\TextInput::make('amount')
                    ->numeric(),
                Forms\Components\TextInput::make('currency_uom_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('comments')
                    ->maxLength(255),
                Forms\Components\TextInput::make('fin_account_trans_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('override_gl_account_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('actual_currency_amount')
                    ->numeric(),
                Forms\Components\TextInput::make('actual_currency_uom_id')
                    ->maxLength(20),
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
                Tables\Columns\TextColumn::make('payment_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_method_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_method_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_gateway_response_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_preference_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('party_id_from')
                    ->searchable(),
                Tables\Columns\TextColumn::make('party_id_to')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role_type_id_to')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('effective_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_ref_num')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('currency_uom_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('comments')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fin_account_trans_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('override_gl_account_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('actual_currency_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('actual_currency_uom_id')
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
