<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrinterResource\Pages;
use App\Filament\Resources\PrinterResource\RelationManagers;
use App\Models\Printer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrinterResource extends Resource
{
    protected static ?string $model = Printer::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('brand')
                ->options([
                    'Creality' => 'Creality',
                    'Artillery' => 'Artillery',
                    'Prusa' => 'Prusa',
                    'Anycubic' => 'Anycubic',
                    'Flashforge' => 'FlashForge',
                    'Ultimaker' => 'Ultimaker',
                ])
                ->required(),
                Forms\Components\TextInput::make('model')
                ->required()
                ->maxLength(255)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('model')
                ->searchable()
                ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('brand')
                ->options([
                    'Creality' => 'Creality',
                    'Artillery' => 'Artillery',
                    'Prusa' => 'Prusa',
                    'Anycubic' => 'Anycubic',
                    'Flashforge' => 'FlashForge',
                    'Ultimaker' => 'Ultimaker',
                ])
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
            'index' => Pages\ListPrinters::route('/'),
            'create' => Pages\CreatePrinter::route('/create'),
            'edit' => Pages\EditPrinter::route('/{record}/edit'),
        ];
    }
}
