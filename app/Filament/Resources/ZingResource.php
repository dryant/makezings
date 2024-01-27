<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZingResource\Pages;
use App\Models\Zing;
use App\Models\User; // Import the missing User class
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Spatie\Permission\Traits\HasRoles;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\Action;

class ZingResource extends Resource
{
    use HasRoles;
    
    protected static ?string $model = Zing::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->when(
            ! auth()->user()->hasAnyRole(['Admin']),
            fn (Builder $query) => $query->where('user_id', auth()->user()->id)
        );
    }
    
    public static function form(Form $form): Form
    {
        $makers = User::all()->pluck('name', 'id')->toArray();
        
        return $form
        ->schema([
            Forms\Components\Group::make()
            ->columns(3)
            ->schema([
                Forms\Components\Section::make()
                    ->columnSpan(2)
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->required()
                            ->disabled(fn () => auth()->user()->hasRole('Maker') && ! auth()->user()->hasRole('Admin'))
                            ->default(fn () => auth()->user()->id)
                            ->relationship('maker', 'name')
                            ->searchable()
                            ->required()
                            ->options($makers)
                            ->label('Maker'),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('description')
                            ->required()
                            ->maxLength(255),
                ]),
                Forms\Components\Section::make()
                    ->columnSpan(1)
                    ->schema ([                    
                        FileUpload::make('image_url')
                            ->directory('images/zings')
                            ->image(),
                    ]),  
            ])->columnSpanFull(),
        ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('image_url')
            ->label('Image'),
            TextColumn::make('maker.name')
            ->hidden(fn () => auth()->user()->hasRole('Maker') && ! auth()->user()->hasRole('Admin'))
            ->searchable()
            ->label('Maker'),
            TextColumn::make('title')
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
                SelectFilter::make('maker_id')
                ->relationship('maker', 'name')
                ->searchable()
                ->hidden(fn () => auth()->user()->hasRole('Maker') && ! auth()->user()->hasRole('Admin'))
                ->label('Maker'),
                ])
                ->actions([
                    EditAction::make(),
                    Action::make('delete')
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->action(fn (Zing $record) => $record->delete())
                    ])
                    ->bulkActions([
                        BulkActionGroup::make([
                            DeleteBulkAction::make(),
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
            