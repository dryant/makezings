<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User;
use Filament\Forms\Components\TextInput;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->when(
            ! auth()->user()->hasAnyRole(['Admin']),
            fn (Builder $query) => $query->where('customer_id', auth()->user()->id)
        );
    }

    public static function form(Form $form): Form
    {        
        $makers = User::all()->pluck('name', 'id')->toArray();

        // dd(auth()->user()->id);
        return $form
            ->schema([
                Select::make('maker_id')
                    ->required()
                    // ->disabled(fn () => auth()->user()->hasRole('Maker') && ! auth()->user()->hasRole('Admin'))
                    // ->default(fn () => auth()->user()->id)
                    ->relationship('maker', 'name')
                    ->options($makers)
                    ->searchable()
                    ->label('Maker'),
                Select::make('customer_id')
                    ->required()
                    ->disabled(fn () => ! auth()->user()->hasRole('Admin'))
                    ->default(fn()=>auth()->user()->id)
                    ->relationship('maker', 'id')
                    ->options($makers)
                    // ->searchable()
                    
                    ->label('Cliente'),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('maker.name')->label('Maker Name'),
                Tables\Columns\TextColumn::make('customer.name')->label('Customer Name'),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
