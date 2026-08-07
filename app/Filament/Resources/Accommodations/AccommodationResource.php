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
                Select::make('name') 
                    ->label('Name of Establishment')
                    ->searchable()
                    ->options([
                        'SUNRISE CABIN TRAVELLERS INN' => 'SUNRISE CABIN TRAVELLERS INN',
                        'ISAAC JORDAN TRANSIENT' => 'ISAAC JORDAN TRANSIENT',
                        'CJ PEARL TRANSIENT' => 'CJ PEARL TRANSIENT',
                        'ALOS HOMESTAY' => 'ALOS HOMESTAY',
                        'BURTON\'S CABIN AND YARD' => 'BURTON\'S CABIN AND YARD',
                        'BUDA\'S TRANSIENT' => 'BUDA\'S TRANSIENT',
                        'HAIGHT\'S PLACE' => 'HAIGHT\'S PLACE',
                        'NORTHERN BLOSSOMS FARM LODGING' => 'NORTHERN BLOSSOMS FARM LODGING',
                        'LOYUNG\'S HOMESTAY' => 'LOYUNG\'S HOMESTAY',
                        'OUR NORTHERN HOME TRANSIENT HOUSE' => 'OUR NORTHERN HOME TRANSIENT HOUSE',
                        'CAMSOL INN formerly JACS HOMESTAY' => 'CAMSOL INN formerly JACS HOMESTAY',
                        'BONTIGI\'S TRANSIENT HOUSE' => 'BONTIGI\'S TRANSIENT HOUSE',
                        'AVIC\'S HOMESTAY' => 'AVIC\'S HOMESTAY',
                        'ATOK HAVEN TRANSIENT HOUSE' => 'ATOK HAVEN TRANSIENT HOUSE',
                        'CHERRY MAE\'S TRANSIENT' => 'CHERRY MAE\'S TRANSIENT',
                        'G4D\'S TRANSIENT HOUSE' => 'G4D\'S TRANSIENT HOUSE',
                        'HAIGHT\'S  COZY CHALET' => 'HAIGHT\'S  COZY CHALET',
                        'MILBUR HOMESTAY' => 'MILBUR HOMESTAY',
                        'THE PRIDE HOUSE HOMESTAY' => 'THE PRIDE HOUSE HOMESTAY',
                        'SALTNIGHT TRANSIENT' => 'SALTNIGHT TRANSIENT',
                        'ROUTE 49 TRANSIENT HOUSE' => 'ROUTE 49 TRANSIENT HOUSE',
                        'ED\'S HOMESTAY' => 'ED\'S HOMESTAY',
                        'LOLA\'S CASA RENTAL' => 'LOLA\'S CASA RENTAL',
                        'NEWMOON CHALET' => 'NEWMOON CHALET',
                        'BAKUN MUNICIPAL GUEST HOUSE' => 'BAKUN MUNICIPAL GUEST HOUSE',
                        'SINACBAT BARANGAY HALL' => 'SINACBAT BARANGAY HALL',
                        'POBLACION EVACUATION CENTER' => 'POBLACION EVACUATION CENTER',
                        'MUNICIPAL BUILDING' => 'MUNICIPAL BUILDING',
                        'TABBAK MULTIPURPOSE BUILDING' => 'TABBAK MULTIPURPOSE BUILDING',
                        'TENGLAWAN MULTIPURPOSE COOPERATIVE BUILDING' => 'TENGLAWAN MULTIPURPOSE COOPERATIVE BUILDING',
                        'BAKUN CENTRAL SCHOOL H.E. BUILDING' => 'BAKUN CENTRAL SCHOOL H.E. BUILDING',
                        'LUPONAN MULTIPURPOSE BUILDING' => 'LUPONAN MULTIPURPOSE BUILDING',
                        'SLAB HOUSE' => 'SLAB HOUSE',
                        'BALEY NEN KAMORA' => 'BALEY NEN KAMORA',
                        'LOLO CANCIO\'S TRAVELODGE' => 'LOLO CANCIO\'S TRAVELODGE',
                        'MUNICIPAL TOURISM GUESTROOM' => 'MUNICIPAL TOURISM GUESTROOM',
                        'ELENA\'S RESORT' => 'ELENA\'S RESORT',
                        'ABONG NEN JUAN TAN TENIA' => 'ABONG NEN JUAN TAN TENIA',
                        'MARK\'S TRAVELLERS VIEW DECK INN' => 'MARK\'S TRAVELLERS VIEW DECK INN',
                        'ALPINE G\'S LODGE AND RESTAURANT' => 'ALPINE G\'S LODGE AND RESTAURANT',
                        'RK\'S GARDEN BREEZE HOTEL AND RESTAURANT' => 'RK\'S GARDEN BREEZE HOTEL AND RESTAURANT',
                        'BSU-BUGUIAS GUEST HOUSE' => 'BSU-BUGUIAS GUEST HOUSE',
                        'BOTEL RESORT' => 'BOTEL RESORT',
                        'ABBAO RESORT' => 'ABBAO RESORT',
                        'CASA YSABELLE' => 'CASA YSABELLE',
                        'CITYSIDE BED NAD BREAKFAST (MANAGED BY BIG BELLY BUFFET)' => 'CITYSIDE BED NAD BREAKFAST (MANAGED BY BIG BELLY BUFFET)',
                        'ALPHALAND BAGUIO MOUNTAIN LODGES' => 'ALPHALAND BAGUIO MOUNTAIN LODGES',
                        'GOOD MORNING POTTINGSHED' => 'GOOD MORNING POTTINGSHED',
                        'BALAY NA KAHOY' => 'BALAY NA KAHOY',
                        'MAGIC LODGE' => 'MAGIC LODGE',
                        'TINONGDAN GYMNASIUM WING' => 'TINONGDAN GYMNASIUM WING',
                        '3RD FLOOR MULTI-PURPOSE BUILDING, TINONGDAN' => '3RD FLOOR MULTI-PURPOSE BUILDING, TINONGDAN',
                        'LOLA\'S GRAND HOMESTAY' => 'LOLA\'S GRAND HOMESTAY',
                        'RIVERFRONT HOMESTAY' => 'RIVERFRONT HOMESTAY',
                        'M-LLANA\'S TRANSIENT HOUSE' => 'M-LLANA\'S TRANSIENT HOUSE',
                        'BALLAY TRANSIENT HOUSE' => 'BALLAY TRANSIENT HOUSE',
                        'BEYONDBAGUIO CAFÉ' => 'BEYONDBAGUIO CAFÉ',
                        'ME-AN HOMESTAY' => 'ME-AN HOMESTAY',
                        'MT. PULAG FOREVER' => 'MT. PULAG FOREVER',
                        'ORLENES HOMESTAY' => 'ORLENES HOMESTAY',
                        'PINE CONE LODGE' => 'PINE CONE LODGE',
                        'SUMMITVIEW BABAN\'S HOMESTAY-ELLEN (01)' => 'SUMMITVIEW BABAN\'S HOMESTAY-ELLEN (01)',
                        '5J\'S CAMPSITE AND HOMESTAY' => '5J\'S CAMPSITE AND HOMESTAY',
                        'BREEZY HOMESTAY' => 'BREEZY HOMESTAY',
                        'DENCIO\'S HOMESTAY' => 'DENCIO\'S HOMESTAY',
                        'SMR HOMESTAY' => 'SMR HOMESTAY',
                        'ESAY HOMESTAY' => 'ESAY HOMESTAY',
                        'NORTHERN BLOSSOM TRANSIENT' => 'NORTHERN BLOSSOM TRANSIENT',
                        'PULTAK LODGE' => 'PULTAK LODGE',
                        'WANARA HOMESTAY' => 'WANARA HOMESTAY',
                        'LA-FE HOMESTAY' => 'LA-FE HOMESTAY',
                        'KALAHAN HOMESTAY' => 'KALAHAN HOMESTAY',
                        'BATAKAGAN HOMESTAY' => 'BATAKAGAN HOMESTAY',
                        'BENITOS HOMESTAY' => 'BENITOS HOMESTAY',
                        'AMIGO HOMESTAY' => 'AMIGO HOMESTAY',
                        'BRUCELENESS HOMESTAY' => 'BRUCELENESS HOMESTAY',
                        'SHIELDONS HOMESTAY' => 'SHIELDONS HOMESTAY',
                        'CLOUDGAZER HOMESTAY' => 'CLOUDGAZER HOMESTAY',
                        'NIVERA HOMESTAY' => 'NIVERA HOMESTAY',
                        'AKIKI TOURIST INN' => 'AKIKI TOURIST INN',
                        'BRGY. TINONGDAN HOMESTAY' => 'BRGY. TINONGDAN HOMESTAY',
                        'DITAS HOMESTAY' => 'DITAS HOMESTAY',
                        'FRED AGUINSE HOMESTAY' => 'FRED AGUINSE HOMESTAY',
                        'ROMEO HOMESTAY' => 'ROMEO HOMESTAY',
                        'MANUEL HOMESTAY' => 'MANUEL HOMESTAY',
                        'WAKIT HOMESTAY' => 'WAKIT HOMESTAY',
                        'BERNARD HOMESTAY' => 'BERNARD HOMESTAY',
                        'REGINE HOMESTAY' => 'REGINE HOMESTAY',
                        'FELICIANO HOMESTAY' => 'FELICIANO HOMESTAY',
                        'JUBAN HOMESTAY' => 'JUBAN HOMESTAY',
                        'GARCIA HOMESTAY' => 'GARCIA HOMESTAY',
                        'ARLENE HOMESTAY' => 'ARLENE HOMESTAY',
                        'EVA HOMESTAY' => 'EVA HOMESTAY',
                        'TREKKERS HOMESTAY' => 'TREKKERS HOMESTAY',
                        'JENELIN HOMESTAY' => 'JENELIN HOMESTAY',
                        'AMBROCIO HOMESTAY' => 'AMBROCIO HOMESTAY',
                        'BAHAY NI KUYA ROLI HOMESTAY' => 'BAHAY NI KUYA ROLI HOMESTAY',
                        'AVONG NEN SUVANI CULTURAL HERITAGE HOME' => 'AVONG NEN SUVANI CULTURAL HERITAGE HOME',
                        'MAYFLOR\'S FASTFOOD HAUS AND LODGING' => 'MAYFLOR\'S FASTFOOD HAUS AND LODGING',
                        'TEPEE HOUSE' => 'TEPEE HOUSE',
                        'MUNICIPAL GUEST HOUSE' => 'MUNICIPAL GUEST HOUSE',
                        'OUR LADY OF LOURDES PARISH GUEST HOUSE' => 'OUR LADY OF LOURDES PARISH GUEST HOUSE',
                        'BARANGAY GUEST ROOM' => 'BARANGAY GUEST ROOM',
                        'MAYOR\'S QAURTER' => 'MAYOR\'S QAURTER',
                        'OMAG-MUNICIPAL NURSERY GUEST HOUSE' => 'OMAG-MUNICIPAL NURSERY GUEST HOUSE',
                        'LOLA NILDA\'S AGRITOURISM PARK-HOMESTAY' => 'LOLA NILDA\'S AGRITOURISM PARK-HOMESTAY',
                        'LA TRINIDAD HOMESTAY' => 'LA TRINIDAD HOMESTAY',
                        'COSMIC FARM' => 'COSMIC FARM',
                        'BAPTC GUESTEL' => 'BAPTC GUESTEL',
                        'HELP ENGLISH LANGUAGE PROGRAM' => 'HELP ENGLISH LANGUAGE PROGRAM',
                        'HIGHLAND BLOSSOMS' => 'HIGHLAND BLOSSOMS',
                        'JS LODGE' => 'JS LODGE',
                        'BALI BEATA LODGING HOME' => 'BALI BEATA LODGING HOME',
                        'STRAWBERRY VALLEY HOTEL & RESTAURANT' => 'STRAWBERRY VALLEY HOTEL & RESTAURANT',
                        'WANAY\'S ROCKY MOUNTAIN HOMESTAY' => 'WANAY\'S ROCKY MOUNTAIN HOMESTAY',
                        'BSU GLADIOLA CENTER' => 'BSU GLADIOLA CENTER',
                        'GARDEN NEN INES' => 'GARDEN NEN INES',
                        'TANAW PRESA' => 'TANAW PRESA',
                        'NATURE TOWER HOTEL' => 'NATURE TOWER HOTEL',
                        'ADELLE\'S TRANSIENT' => 'ADELLE\'S TRANSIENT',
                        'KOMEDOR CAFÉ AND INN (CHERYL ANN A. CAJIGAN)' => 'KOMEDOR CAFÉ AND INN (CHERYL ANN A. CAJIGAN)',
                        'LAY-ODAN FARM (HECTOR D. DELA CRUZ)' => 'LAY-ODAN FARM (HECTOR D. DELA CRUZ)',
                        'MICHELLE P. MANGALLAY' => 'MICHELLE P. MANGALLAY',
                        'PRECIOUS TWINS LODGE (REYNALDO D. PALOMO)' => 'PRECIOUS TWINS LODGE (REYNALDO D. PALOMO)',
                        'ST. JOHN EVANGELIST GUEST HOUSE' => 'ST. JOHN EVANGELIST GUEST HOUSE',
                        'UPSIDE DOWN CAFÉ AND HOMESTAY' => 'UPSIDE DOWN CAFÉ AND HOMESTAY',
                        'HI-ACRES CAMP' => 'HI-ACRES CAMP',
                        'LEAVES & PETALS ECO-GARDEN RESORT' => 'LEAVES & PETALS ECO-GARDEN RESORT',
                        'SABLAN HILLS' => 'SABLAN HILLS',
                        'LUSTREA TRANSIENT HOUSE' => 'LUSTREA TRANSIENT HOUSE',
                        'RKK\'S TRANSIENT HOUSE' => 'RKK\'S TRANSIENT HOUSE',
                        'EVER LODGE' => 'EVER LODGE',
                        'PALM GROVE HOTSPRING AND MOUNTAIN RESORT' => 'PALM GROVE HOTSPRING AND MOUNTAIN RESORT',
                        'ASIN HOTSPRING POOTEN RESORT' => 'ASIN HOTSPRING POOTEN RESORT',
                        'RIVERVIEW WATERPARK' => 'RIVERVIEW WATERPARK',
                        'VALLEYPOINT CAMPSITE' => 'VALLEYPOINT CAMPSITE',
                        'BEZ AND OH LODGING HOME' => 'BEZ AND OH LODGING HOME',
                        'BALAI TAKO (BY NOBLE NEST REALTY AND SERVICES)' => 'BALAI TAKO (BY NOBLE NEST REALTY AND SERVICES)',
                        'WINACA ECO-CULTURAL VILLAGE' => 'WINACA ECO-CULTURAL VILLAGE',
                        'ANGLUBEN HOMESTAY' => 'ANGLUBEN HOMESTAY',
                        'FERNANDEZ HOMESTAY' => 'FERNANDEZ HOMESTAY',
                        'SAGUDAY BUILDING' => 'SAGUDAY BUILDING',
                        'BAGAYAO HOMESTAY' => 'BAGAYAO HOMESTAY',
                        'KINGS CABIN TRANSIENT HOUSE' => 'KINGS CABIN TRANSIENT HOUSE',
                        'LAZY BEAR' => 'LAZY BEAR',
                        'INA PURINGS TRANSIENT HOUSE' => 'INA PURINGS TRANSIENT HOUSE',
                        'HEARTSVILLE TRANSIENT HOUSE' => 'HEARTSVILLE TRANSIENT HOUSE',
                        'CLEOS TRANSIENT HOUSE' => 'CLEOS TRANSIENT HOUSE',
                        'BCV TRANSIENT HOUSE' => 'BCV TRANSIENT HOUSE',
                        'LOLA BEEZ TRANSIENT' => 'LOLA BEEZ TRANSIENT',
                        'JRL TRANSIENT HOUSE' => 'JRL TRANSIENT HOUSE',
                        'AMAPOLA CLIFF TRANSIENT HOUSE' => 'AMAPOLA CLIFF TRANSIENT HOUSE',
                        'BABAN BOY HOMESTAY' => 'BABAN BOY HOMESTAY',
                        'SUMMIT GEMS HOMESTAY' => 'SUMMIT GEMS HOMESTAY',
                        'ABONG NEN JUAN' => 'ABONG NEN JUAN',
                        'RYAN HOMESTAY' => 'RYAN HOMESTAY',
                        'BABAN\'S HOMESTAY- SUSAN  (02)' => 'BABAN\'S HOMESTAY- SUSAN  (02)',
                        'AGNES HOMESTAY' => 'AGNES HOMESTAY',
                        'BABAN HOMESTAY- NEDA (04)' => 'BABAN HOMESTAY- NEDA (04)',
                        'CORNELIA HOMESTAY' => 'CORNELIA HOMESTAY',
                        'BABAN\'S HOMESTAY- JALLEN  (05)' => 'BABAN\'S HOMESTAY- JALLEN  (05)',
                        'JONELIN HOMESTAY' => 'JONELIN HOMESTAY',
                        'CLOUDFIELD TRANSIENT HOUSE' => 'CLOUDFIELD TRANSIENT HOUSE',
                        'ERGIM TRANSIENT HOUSE' => 'ERGIM TRANSIENT HOUSE',
                        'HERITAGE FARM HOMESTAY' => 'HERITAGE FARM HOMESTAY',
                        'JEWEL IGOROT BUILDING' => 'JEWEL IGOROT BUILDING',
                        'TAMID-AY HOMESTAY' => 'TAMID-AY HOMESTAY',
                        'ITOGON MOUNTAIN VILLAGE CABINS' => 'ITOGON MOUNTAIN VILLAGE CABINS',
                        'RIDDLEVIEW TRANSIENT HOUSE' => 'RIDDLEVIEW TRANSIENT HOUSE',
                        'MAMITAS HOMESTAY' => 'MAMITAS HOMESTAY',
                        'Kabatuan I nn & Resort' => 'Kabatuan I nn & Resort',
                        'Imeelou Inn & Resort' => 'Imeelou Inn & Resort',
                        'Everest Lodge' => 'Everest Lodge',
                        'LEAVES & SPIKES TRANSIENT HOUSE' => 'LEAVES & SPIKES TRANSIENT HOUSE',
                        'BABAN\'S HOMESTAY-SYLVIA (03)' => 'BABAN\'S HOMESTAY-SYLVIA (03)',
                        'OSDAWEN HOMESTAY' => 'OSDAWEN HOMESTAY',
                        'NANAY HONORIA' => 'NANAY HONORIA',
                        'RAG HOMESTAY' => 'RAG HOMESTAY',
                    ])
                    ->required(),    

                    Forms\Components\TextInput::make('year')
                    ->label('Year')
                    ->numeric()
                    ->placeholder('2024'),

                Forms\Components\TextInput::make('province')
                    ->label('Province / HUC/ICC (*Region)')
                    ->default('Benguet')
                    ->required(),

                Select::make('municipality')
                    ->label('Municipality')
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

                    Tables\Columns\TextColumn::make('year')
                        ->sortable(),

                    Tables\Columns\TextColumn::make('province')
                        ->label('Province / HUC/ICC')
                        ->searchable(),
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