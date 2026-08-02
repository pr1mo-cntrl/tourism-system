<?php

namespace App\Filament\Resources\Accommodations;

use App\Filament\Resources\Accommodations\Pages;
use App\Models\Accommodation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class AccommodationResource extends Resource
{
    protected static ?string $model = Accommodation::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name of Establishment')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Select::make('municipality')
                    ->label('Municipality')
                    ->options([
                        'Baguio City' => 'Baguio City',
                        'Atok' => 'Atok',
                        'Bakun' => 'Bakun',
                        'Bokod' => 'Bokod',
                        'Buguias' => 'Buguias',
                        'Itogon' => 'Itogon',
                        'Kabayan' => 'Kabayan',
                        'Kapangan' => 'Kapangan',
                        'Kibungan' => 'Kibungan',
                        'La Trinidad' => 'La Trinidad',
                        'Mankayan' => 'Mankayan',
                        'Sablan' => 'Sablan',
                        'Tuba' => 'Tuba',
                        'Tublay' => 'Tublay',
                    ])
                    ->searchable()
                    ->required(),

                Select::make('type')
                    ->label('Accommodation Type')
                    ->options([
                        'HTL' => 'HTL - Hotel',
                        'RES' => 'RES - Resort',
                        'TIN' => 'TIN - Tourist Inn',
                        'APA' => 'APA - Apartel',
                        'PEN' => 'PEN - Pension House',
                        'HSS' => 'HSS - Homestay',
                        'OTH' => 'OTH - Others',
                    ])
                    ->searchable(),

                TextInput::make('no_of_rooms')
                    ->label('Number of Rooms')
                    ->numeric()
                    ->default(0),

                TextInput::make('male_employees')
                    ->label('Male Employees')
                    ->numeric()
                    ->default(0),

                TextInput::make('female_employees')
                    ->label('Female Employees')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Establishment Name')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('municipality')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                TextColumn::make('type')
                    ->label('Type')
                    ->sortable(),

                TextColumn::make('no_of_rooms')
                    ->label('Rooms')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('total_employees')
                    ->label('Total Employees')
                    ->getStateUsing(fn ($record) => $record->male_employees + $record->female_employees),
            ])
            ->filters([
                SelectFilter::make('municipality')
                    ->options([
                        'Atok' => 'Atok',
                        'Bakun' => 'Bakun',
                        'Bokod' => 'Bokod',
                        'Buguias' => 'Buguias',
                        'Itogon' => 'Itogon',
                        'Kabayan' => 'Kabayan',
                        'Kapangan' => 'Kapangan',
                        'Kibungan' => 'Kibungan',
                        'La Trinidad' => 'La Trinidad',
                        'Mankayan' => 'Mankayan',
                        'Sablan' => 'Sablan',
                        'Tuba' => 'Tuba',
                        'Tublay' => 'Tublay',
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
            'index' => Pages\ListAccommodations::route('/'),
            'create' => Pages\CreateAccommodation::route('/create'),
            'edit' => Pages\EditAccommodation::route('/{record}/edit'),
        ];
    }
}