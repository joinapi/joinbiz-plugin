<?php

namespace Joinbiz\BizApp\Resources;

use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\InvoiceResource\Pages;
use Joinbiz\BizApp\Resources\InvoiceResource\RelationManagers;
use Joinbiz\Data\Models\Accounting\Invoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvoiceResource extends Resource
{
    use HasCustomLabel;
    protected static ?string $navigationGroup = 'ACCOUNTING';

    protected static ?string $model = Invoice::class;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('invoice_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('party_id_from')
                    ->maxLength(20),
                Forms\Components\TextInput::make('party_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('role_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('status_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('billing_account_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('contact_mech_id')
                    ->maxLength(20),
                Forms\Components\DateTimePicker::make('invoice_date'),
                Forms\Components\DateTimePicker::make('due_date'),
                Forms\Components\DateTimePicker::make('paid_date'),
                Forms\Components\TextInput::make('invoice_message')
                    ->maxLength(255),
                Forms\Components\TextInput::make('reference_number')
                    ->maxLength(60),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('currency_uom_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('recurrence_info_id')
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
                Tables\Columns\TextColumn::make('invoice_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('invoice_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('party_id_from')
                    ->searchable(),
                Tables\Columns\TextColumn::make('party_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('billing_account_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_mech_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('invoice_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('paid_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('invoice_message')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reference_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency_uom_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('recurrence_info_id')
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
           RelationManagers\InvoiceItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }
}
