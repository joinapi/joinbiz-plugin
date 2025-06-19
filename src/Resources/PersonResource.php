<?php

namespace Joinbiz\BizApp\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Joinbiz\BizApp\Concerns\HasCustomLabel;
use Joinbiz\BizApp\Resources\PersonResource\Pages;
use Joinbiz\Data\Models\Party\Person;

class PersonResource extends Resource
{
    use HasCustomLabel;

    protected static ?string $model = Person::class;

    protected static ?string $navigationGroup = 'PARTY';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('salutation')
                    ->maxLength(100),
                Forms\Components\TextInput::make('first_name')
                    ->maxLength(100),
                Forms\Components\TextInput::make('middle_name')
                    ->maxLength(100),
                Forms\Components\TextInput::make('last_name')
                    ->maxLength(100),
                Forms\Components\TextInput::make('personal_title')
                    ->maxLength(100),
                Forms\Components\TextInput::make('suffix')
                    ->maxLength(100),
                Forms\Components\TextInput::make('nickname')
                    ->maxLength(100),
                Forms\Components\TextInput::make('first_name_local')
                    ->maxLength(100),
                Forms\Components\TextInput::make('middle_name_local')
                    ->maxLength(100),
                Forms\Components\TextInput::make('last_name_local')
                    ->maxLength(100),
                Forms\Components\TextInput::make('other_local')
                    ->maxLength(100),
                Forms\Components\TextInput::make('member_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('gender')
                    ->maxLength(1),
                Forms\Components\DatePicker::make('birth_date'),
                Forms\Components\DatePicker::make('deceased_date'),
                Forms\Components\TextInput::make('height')
                    ->numeric(),
                Forms\Components\TextInput::make('weight')
                    ->numeric(),
                Forms\Components\TextInput::make('mothers_maiden_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('marital_status')
                    ->maxLength(1),
                Forms\Components\TextInput::make('social_security_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('passport_number')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('passport_expire_date'),
                Forms\Components\TextInput::make('total_years_work_experience')
                    ->numeric(),
                Forms\Components\TextInput::make('comments')
                    ->maxLength(255),
                Forms\Components\TextInput::make('employment_status_enum_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('residence_status_enum_id')
                    ->maxLength(20),
                Forms\Components\TextInput::make('occupation')
                    ->maxLength(100),
                Forms\Components\TextInput::make('years_with_employer')
                    ->numeric(),
                Forms\Components\TextInput::make('months_with_employer')
                    ->numeric(),
                Forms\Components\TextInput::make('existing_customer')
                    ->maxLength(1),
                Forms\Components\TextInput::make('card_id')
                    ->maxLength(60),
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
                Tables\Columns\TextColumn::make('salutation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('personal_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('suffix')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nickname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name_local')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name_local')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name_local')
                    ->searchable(),
                Tables\Columns\TextColumn::make('other_local')
                    ->searchable(),
                Tables\Columns\TextColumn::make('member_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deceased_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('height')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('weight')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mothers_maiden_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('marital_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('social_security_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('passport_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('passport_expire_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_years_work_experience')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comments')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employment_status_enum_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('residence_status_enum_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('occupation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('years_with_employer')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('months_with_employer')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('existing_customer')
                    ->searchable(),
                Tables\Columns\TextColumn::make('card_id')
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
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePerson::route('/create'),
            'edit' => Pages\EditPerson::route('/{record}/edit'),
        ];
    }
}
