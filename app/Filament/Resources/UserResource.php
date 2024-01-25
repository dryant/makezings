<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Http\UploadedFile;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Filament\Forms\Components\FileUpload\store;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Hash;
use Filament\Infolists\Components\Grid;
use Filament\Tables\Filters\SelectFilter;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                FileUpload::make('avatar_url')
                    ->directory('images/avatars')
                    ->avatar(),
                TextInput::make('name')

                    ->label(__('Nombre'))
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(
                        fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->unique('users', 'slug', ignoreRecord: true),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                DateTimePicker::make('email_verified_at')
                    ->hidden(),
                TextInput::make('password')
                    ->confirmed()
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->hiddenOn('edit')
                    ->minLength(8)
                    ->maxLength(255)
                    ->label(__('Contraseña')),
                TextInput::make('password_confirmation')
                    ->password()
                    ->required()
                    ->hiddenOn('edit')
                    ->maxLength(255)
                    ->label(__('Confirmar contraseña')),
                Select::make('role')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->label(__('Roles'))
                    ->default('Usuario'),
                Select::make('permissions')
                    ->relationship('permissions', 'name')
                    ->multiple()
                    ->label(__('Permisos')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar_url'),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('roles.name')
                    ->label(__('Roles'))
                    ->badge()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('permissions.name')
                    ->label(__('Permisos'))
                    ->badge()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('two_factor_confirmed_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('roles')
                    ->relationship('roles', 'name')
                    ->placeholder(__('Todos')),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(__('Editar')),
                Tables\Actions\DeleteAction::make()
                    ->label(__('Eliminar')),
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
