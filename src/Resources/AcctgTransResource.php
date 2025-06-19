<?php

namespace Joinbiz\BizApp\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\AcctgTransResource\Pages;
use Joinbiz\BizApp\Resources\AcctgTransResource\RelationManagers;
use Joinbiz\Data\Models\Accounting\AcctgTrans;

class AcctgTransResource extends Resource
{
    protected static ?string $model = AcctgTrans::class;

    use HasCustomLabel;

    protected static ?string $navigationGroup = 'ACCOUNTING';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('acctg_trans_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('transaction_date'),
                Forms\Components\TextInput::make('is_posted')
                    ->maxLength(1),
                Forms\Components\DateTimePicker::make('posted_date'),
                Forms\Components\DateTimePicker::make('scheduled_posting_date'),
                Forms\Components\TextInput::make('gl_journal_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('gl_fiscal_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('voucher_ref')
                    ->maxLength(60),
                Forms\Components\DateTimePicker::make('voucher_date'),
                Forms\Components\TextInput::make('group_status_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('fixed_asset_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('inventory_item_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('physical_inventory_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('party_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('role_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('invoice_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('payment_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('fin_account_trans_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('shipment_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('receipt_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('work_effort_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('their_acctg_trans_id')
                    ->maxLength(60),
                Forms\Components\DateTimePicker::make('created_date'),
                Forms\Components\TextInput::make('created_by_user_login')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('last_modified_date'),
                Forms\Components\TextInput::make('last_modified_by_user_login')
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
                Tables\Columns\TextColumn::make('acctg_trans_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('acctg_trans_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('transaction_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_posted')
                    ->searchable(),
                Tables\Columns\TextColumn::make('posted_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('scheduled_posting_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gl_journal_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gl_fiscal_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('voucher_ref')
                    ->searchable(),
                Tables\Columns\TextColumn::make('voucher_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('group_status_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fixed_asset_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('inventory_item_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('physical_inventory_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('party_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('invoice_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fin_account_trans_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipment_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receipt_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_effort_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('their_acctg_trans_id')
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
            RelationManagers\AcctgTransEntriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAcctgTrans::route('/'),
            'create' => Pages\CreateAcctgTrans::route('/create'),
            'edit' => Pages\EditAcctgTrans::route('/{record}/edit'),
        ];
    }
}
