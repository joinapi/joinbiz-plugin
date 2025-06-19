<?php

namespace Joinbiz\BizApp\Resources;

use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\GlAccountClassResource\Pages;
use Joinbiz\BizApp\Resources\GlAccountClassResource\RelationManagers;
use Joinbiz\Data\Models\Accounting\GlAccountClass;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GlAccountClassResource extends Resource
{
    protected static ?string $model = GlAccountClass::class;

    use HasCustomLabel;
    protected static ?string $navigationGroup = 'ACCOUNTING';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('parent_class_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\TextInput::make('is_asset_class')
                    ->maxLength(1),
                Forms\Components\TextInput::make('sequence_num')
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
                Tables\Columns\TextColumn::make('gl_account_class_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_class_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_asset_class')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sequence_num')
                    ->numeric()
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
            'index' => Pages\ListGlAccountClasses::route('/'),
            'create' => Pages\CreateGlAccountClass::route('/create'),
            'edit' => Pages\EditGlAccountClass::route('/{record}/edit'),
        ];
    }
}
