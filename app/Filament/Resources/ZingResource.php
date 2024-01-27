<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZingResource\Pages;
use App\Filament\Resources\ZingResource\RelationManagers;
use App\Models\Image;
use App\Models\Zing;
use App\Models\User; // Import the missing User class
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Role; 


class ZingResource extends Resource
{
    protected static ?string $model = Zing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    public static function form(Form $form): Form
    {
        $makers = User::all()->pluck('name', 'id')->toArray();

        return $form
            ->schema([
                Forms\Components\Select::make('maker.name')
                    ->required()
                    // ->disabled(fn () => auth()->user()->hasRole('Maker') || ! auth()->user()->hasRoles())
                    ->options($makers),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('maker.name')
                ->label('Maker'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
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
            'index' => Pages\ListZings::route('/'),
            'create' => Pages\CreateZing::route('/create'),
            'edit' => Pages\EditZing::route('/{record}/edit'),
        ];
    }
}
