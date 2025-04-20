<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PostalCodeResource\Pages;
use App\Filament\Admin\Resources\PostalCodeResource\RelationManagers;
use App\Models\PostalCode;
use Awcodes\PostalCodes\Models\PostalCode as ModelsPostalCode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostalCodeResource extends Resource
{
    protected static ?string $model = ModelsPostalCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('country_code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('postal_code')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('place_name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('state_name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('state')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('county_name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('county_code')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('community_name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('community_code')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('lat')
                    ->numeric()
                    ->label('Latitude'),
                    Forms\Components\TextInput::make('lng')
                    ->numeric()
                    ->label('Longitude'),
                    Forms\Components\TextInput::make('accuracy')
                    ->required()
                    ->integer()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country_code')
                    ->label('Country'),
                
                Tables\Columns\TextColumn::make('state_name')
                    ->searchable(isIndividual: true)->label('Distrito'),
                Tables\Columns\TextColumn::make('state')->hidden(),
                Tables\Columns\TextColumn::make('county_name')
                    ->searchable(isIndividual: true)->label('Concelho'),
                Tables\Columns\TextColumn::make('county_code')->hidden(),
                Tables\Columns\TextColumn::make('community_name')
                    ->searchable(isIndividual: true)->label('Freguesia'),
                Tables\Columns\TextColumn::make('community_code')->hidden(),
                Tables\Columns\TextColumn::make('place_name')
                    ->searchable(isIndividual: true)->label('Nome do local'),
                Tables\Columns\TextColumn::make('reference')
                    ->searchable(),
                Tables\Columns\TextColumn::make('postal_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lat'),
                Tables\Columns\TextColumn::make('lng'),
                Tables\Columns\TextColumn::make('accuracy'),

            ])
            ->filters([], layout: FiltersLayout::AboveContent)->filtersFormColumns(4)
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(true)->defaultSort('postal_code', 'asc')
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->paginated([10, 25, 50]);
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
            'index' => Pages\ListPostalCodes::route('/'),
            'create' => Pages\CreatePostalCode::route('/create'),
            'edit' => Pages\EditPostalCode::route('/{record}/edit'),
        ];
    }
}
