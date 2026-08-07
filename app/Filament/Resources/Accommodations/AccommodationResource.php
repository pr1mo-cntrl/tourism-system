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
                \Filament\Forms\Components\Tabs::make('Accommodation Details')
                    ->tabs([
                        
                        // TAB 1: ESTABLISHMENT INFO
                        \Filament\Forms\Components\Tabs\Tab::make('Establishment Info')
                            ->schema([
                                Select::make('name') 
                                    ->label('Name of Establishment')
                                    ->searchable()
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $mapping = [
                                            'SUNRISE CABIN TRAVELLERS INN' => 'Atok',
                                            'ISAAC JORDAN TRANSIENT' => 'Atok',
                                        ];
                                        if (isset($mapping[$state])) {
                                            $set('municipality', $mapping[$state]);
                                        }
                                    })
                                    ->options([
                                        'SUNRISE CABIN TRAVELLERS INN' => 'SUNRISE CABIN TRAVELLERS INN',
                                        'ISAAC JORDAN TRANSIENT' => 'ISAAC JORDAN TRANSIENT',
                                    ])
                                    ->required(),    

                                TextInput::make('year')
                                    ->label('Year')
                                    ->numeric()
                                    ->default(2026)
                                    ->minValue(1900)
                                    ->maxValue(2100),

                                Select::make('month')
                                    ->label('Month')
                                    ->options([
                                        'JANUARY' => 'January', 'FEBRUARY' => 'February', 'MARCH' => 'March', 
                                        'APRIL' => 'April', 'MAY' => 'May', 'JUNE' => 'June', 
                                        'JULY' => 'July', 'AUGUST' => 'August', 'SEPTEMBER' => 'September', 
                                        'OCTOBER' => 'October', 'NOVEMBER' => 'November', 'DECEMBER' => 'December'
                                    ])
                                    ->searchable()
                                    ->required(),

                                TextInput::make('province')
                                    ->label('Province/HUC/ICC (*Region)')
                                    ->default('Benguet')
                                    ->required(),

                                Select::make('municipality')
                                    ->label('Municipality')
                                    ->options([
                                        'Atok' => 'Atok', 'Bakun' => 'Bakun', 'Bokod' => 'Bokod', 
                                        'Buguias' => 'Buguias', 'Itogon' => 'Itogon', 'Kabayan' => 'Kabayan', 
                                        'Kapangan' => 'Kapangan', 'Kibungan' => 'Kibungan', 'La Trinidad' => 'La Trinidad', 
                                        'Mankayan' => 'Mankayan', 'Sablan' => 'Sablan', 'Tuba' => 'Tuba', 'Tublay' => 'Tublay',
                                    ])
                                    ->searchable()
                                    ->required(),

                                Select::make('type')
                                    ->label('Accommodation Type')
                                    ->options([
                                        'HTL' => 'HTL - Hotel', 'RES' => 'RES - Resort', 'TIN' => 'TIN - Tourist Inn', 
                                        'APA' => 'APA - Apartel', 'PEN' => 'PEN - Pension House', 'HSS' => 'HSS - Homestay', 'OTH' => 'OTH - Others',
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
                            ]),

                        // TAB 2: GUEST DEMOGRAPHICS & METRICS
                        \Filament\Forms\Components\Tabs\Tab::make('Guest Demographics & Metrics')
                            ->schema([
                                TextInput::make('ga_ph_province')
                                    ->label('Guest Arrival (GA) - Philippine Residents (What Province)')
                                    ->placeholder('e.g., Benguet, Cebu')
                                    ->maxLength(255),

                                TextInput::make('ga_non_fil_country')
                                    ->label('Guest Arrival (GA) - Non-Filipino Residents (What Country)')
                                    ->placeholder('e.g., South Korea, Japan')
                                    ->maxLength(255),

                                TextInput::make('ga_unspecified')
                                    ->label('Guest Arrival (GA) - Unspecified Resident')
                                    ->numeric()
                                    ->default(0),

                                TextInput::make('ga_overseas_filipinos')
                                    ->label('Guest Arrival (GA) - Overseas Filipinos')
                                    ->helperText('Filipinos born or raised in another country')
                                    ->numeric()
                                    ->default(0),

                                TextInput::make('gn_ph_province')
                                    ->label('Guest Night (GN) - Philippine Residents (Province)')
                                    ->placeholder('GA x No. of Nights')
                                    ->maxLength(255),

                                TextInput::make('gn_non_fil_country')
                                    ->label('Guest Night (GN) - Non-Filipino Residents (Country)')
                                    ->placeholder('GA x No. of Nights')
                                    ->maxLength(255),

                                TextInput::make('gn_unspecified')
                                    ->label('Guest Night (GN) - Unspecified Resident')
                                    ->numeric()
                                    ->default(0),

                                TextInput::make('gn_overseas_filipinos')
                                    ->label('Guest Night (GN) - Overseas Filipinos')
                                    ->numeric()
                                    ->default(0),

                                TextInput::make('rooms_occupied')
                                    ->label('No. of Rooms Occupied')
                                    ->numeric()
                                    ->default(0),
                            ]),

                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Accommodation | Municipality | Month')
                    ->weight('bold')
                    ->description(fn ($record) => $record->municipality . ' | ' . $record->month . ' ' . $record->year)
                    ->searchable(),

                TextColumn::make('employees_rooms')
                    ->label('Employees | Total Rooms')
                    ->getStateUsing(fn ($record) => 'Rooms: ' . $record->no_of_rooms)
                    ->description(fn ($record) => 'M: ' . $record->male_employees . ' | F: ' . $record->female_employees),

                TextColumn::make('rooms_occupied')
                    ->label('Rooms Occupied')
                    ->badge()
                    ->color('warning')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('municipality')
                    ->options([
                        'Atok' => 'Atok', 'Bakun' => 'Bakun', 'Bokod' => 'Bokod', 
                        'Buguias' => 'Buguias', 'Itogon' => 'Itogon', 'Kabayan' => 'Kabayan', 
                        'Kapangan' => 'Kapangan', 'Kibungan' => 'Kibungan', 'La Trinidad' => 'La Trinidad', 
                        'Mankayan' => 'Mankayan', 'Sablan' => 'Sablan', 'Tuba' => 'Tuba', 'Tublay' => 'Tublay',
                    ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
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