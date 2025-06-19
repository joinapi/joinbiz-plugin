<?php

namespace Joinbiz\BizApp\Resources;

use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\GlAccountResource\Pages;
use Joinbiz\BizApp\Resources\GlAccountResource\RelationManagers;
use Joinbiz\Data\Models\Accounting\GlAccount;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GlAccountResource extends Resource
{
    protected static ?string $model = GlAccount::class;
    use HasCustomLabel;
    protected static ?string $navigationGroup = 'ACCOUNTING';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('gl_account_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('gl_account_class_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('gl_resource_type_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('gl_xbrl_class_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('parent_gl_account_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('account_code')
                    ->maxLength(100),
                Forms\Components\TextInput::make('account_name')
                    ->maxLength(100),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('product_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('external_id')
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
                Tables\Columns\TextColumn::make('gl_account_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gl_account_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gl_account_class_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gl_resource_type_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gl_xbrl_class_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_gl_account_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('account_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('account_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('external_id')
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
            'index' => Pages\ListGlAccounts::route('/'),
            'create' => Pages\CreateGlAccount::route('/create'),
            'edit' => Pages\EditGlAccount::route('/{record}/edit'),
        ];
    }
}
