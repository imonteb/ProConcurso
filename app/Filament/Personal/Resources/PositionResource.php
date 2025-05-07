<?php

namespace App\Filament\Personal\Resources;

use App\Filament\Personal\Resources\PositionResource\Pages;
use App\Filament\Personal\Resources\PositionResource\RelationManagers;
use App\Models\Position;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PositionResource extends Resource
{
    protected static ?string $model = Position::class;
    protected static ?string $navigationGroup = 'Gestão de Sistemas';
    protected static ?string $navigationIcon = 'hugeicons-hierarchy';
    protected static ?int $navigationSort = 5;
    protected static ?string $modelLabel = 'Cargo';
    protected static ?string $pluralModelLabel = 'Cargos';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Position info')
                    ->schema([
                        Forms\Components\TextInput::make('department_id')
                            ->required()
                            ->numeric(),
                        Forms\Components\Select::make('department_id')
                            ->relationship('department', 'department_name')
                            ->required()
                            ->label('Departamento')
                            ->searchable(),
                        Forms\Components\TextInput::make('position_name')
                        ->label('Denominação de cargo')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('position_description')
                        ->label('Descrição da função')
                            ->maxLength(255),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('department.department_name')
                    ->label('Departamento')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position_name')
                ->label('Denominação de cargo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position_description')
                ->label('Descrição da função')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPositions::route('/'),
            'create' => Pages\CreatePosition::route('/create'),
            'edit' => Pages\EditPosition::route('/{record}/edit'),
        ];
    }
}
