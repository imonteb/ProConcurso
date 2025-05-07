<?php

namespace App\Filament\Personal\Resources;

use App\Filament\Personal\Resources\UserResource\Pages;
use App\Filament\Personal\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;
use Ysfkaya\FilamentPhoneInput\Tables\PhoneColumn;
use Illuminate\Support\Facades\Hash;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Colaboradores';
    protected static ?string $navigationIcon = 'vaadin-user-card';
    protected static ?int $navigationSort = 2;
    protected static ?string $modelLabel = 'Colaboradores';
    protected static ?string $pluralModelLabel = 'Colaboradores';

    /* public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::user()->id);
    }
 */
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Colaboradores info')
                ->columns([
                    'sm' => 3,
                    'xl' => 3,
                    '2xl' => 3,
                ])
                ->schema([
                    
                    Forms\Components\TextInput::make('employee_code')
                        ->maxWidth('sm')
                        ->label('Nº pess.')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                    
                    Forms\Components\TextInput::make('name')
                        ->label('Nome')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('last_name')
                        ->label('Apelidos')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Select::make('sexo')
                        ->label('Sexo')
                        ->options([
                            'M' => 'Masculino',
                            'F' => 'Feminino',
                        ])
                        ->required(),
                        Forms\Components\Select::make('position_id')
                        ->relationship('position', 'position_name')
                        ->label('Denominação de cargo')
                        ->required()
                        ->preload()
                        ->searchable(),

                    Section::make()
                        ->columns([
                            'sm' => 3,
                            'xl' => 3,
                            '2xl' => 3,
                        ])
                        ->description('Contacto')
                        ->schema([
                            Forms\Components\TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->unique(ignoreRecord: true)
                                ->required()
                                ->maxLength(255),
                            Forms\Components\DateTimePicker::make('email_verified_at')
                                ->label('Email verificado'),

                            PhoneInput::make('phone')
                                ->validateFor('phone')
                                ->label('Telefone')
                                ->unique(ignoreRecord: true)
                                ->required(),
                        ]),


                    Section::make()
                        ->columns([
                            'sm' => 3,
                            'xl' => 3,
                            '2xl' => 3,
                        ])
                        ->description('Palavra-passe')
                        ->schema([
                            Forms\Components\TextInput::make('Palavra-passe')
                                ->password()
                                ->dehydrateStateUsing(fn($state) => Hash::make($state))
                                ->dehydrated(fn($state) => filled($state))
                                ->required(fn(string $context): bool => $context === 'create'),
                        ])
                ])

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('employee_code')
                ->label('Nº pess.')
                ->searchable(),
            Tables\Columns\TextColumn::make('name')
                ->label('Nome')
                ->searchable(),
            Tables\Columns\TextColumn::make('last_name')
                ->label('Apelido')
                ->searchable(),
            Tables\Columns\TextColumn::make('sexo')
                ->label('Sexo')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->searchable(),
            PhoneColumn::make('phone')->displayFormat(PhoneInputNumberType::INTERNATIONAL),
            Tables\Columns\TextColumn::make('position.position_name')
                ->label('Denominação de cargo')
                ->searchable(),
            Tables\Columns\TextColumn::make('email_verified_at')
                ->label('Email verificado')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Criado em')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Atualizado em')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
