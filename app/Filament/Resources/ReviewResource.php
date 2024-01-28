<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Transaction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use App\Models\User;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;


class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->when(
            ! auth()->user()->hasAnyRole(['Admin']),
            fn (Builder $query) => $query->where('user_id', auth()->user()->id)
        );
    }

    public static function form(Form $form): Form
    {
        if (auth()->user()->hasRole('Maker') && ! auth()->user()->hasRole('Admin')) {
            $users = User::where('id', auth()->user()->id)->pluck('name', 'id')->toArray();
        } else {
            $users = User::all()->pluck('name', 'id')->toArray();
        }

        return $form
            ->schema([
                Select::make('transaction_id')
                    ->label('Transaccion')
                    ->options(Transaction::all()->pluck('id', 'id'))
                    ->reactive()
                    ->required()
                    ->afterStateUpdated(
                        fn (string $operation, $state, Forms\Set $set) =>
                            $operation === 'create' ? 
                                $set('user_info', optional(Transaction::find($state)->maker)->name) : null
                    ),
                Forms\Components\TextInput::make('user_info')
                        ->disabled(),
                Textarea::make('review')
                    ->label('Reseña')
                    ->required()
                    ->maxLength(255),
                Select::make('delivery_time')
                    ->required()
                    ->label('Valoracion del Tiempo de entrega')
                    ->default(5)
                    ->options([
                        5 => '5',
                        4 => '4',
                        3 => '3',
                        2 => '2',
                        1 => '1'
                    ]),
                Select::make('print_quality')
                    ->required()
                    ->label('Valoracion de ls Calidad de impresión')
                    ->default(5)
                    ->options([
                        5 => '5',
                        4 => '4',
                        3 => '3',
                        2 => '2',
                        1 => '1'
                    ]),
                Select::make('price')
                    ->required()
                    ->label('Valoracion del Precio')
                    ->default(5)
                    ->options([
                        5 => '5',
                        4 => '4',
                        3 => '3',
                        2 => '2',
                        1 => '1'
                    ]),
                Select::make('user_id')
                    ->required()
                    ->required()
                    // ->relationship('transaction', 'maker')
                    // ->disabled(fn () => ! auth()->user()->hasRole('Admin'))
                    ->default(fn()=>auth()->user()->id)
                    ->options($users)
                    ->label('Usuario'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('transaction_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->hidden(fn () => ! auth()->user()->hasRole('Admin'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('review')
                    ->searchable(),
                Tables\Columns\TextColumn::make('delivery_time')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('print_quality')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
