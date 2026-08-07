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
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        
                        // FIXED: Removed the extra closing bracket here
                        $mapping = [
                            'SUNRISE CABIN TRAVELLERS INN' => 'Atok',
                            'ISAAC JORDAN TRANSIENT' => 'Atok',
                            'CJ PEARL TRANSIENT' => 'Atok',
                            'ALOS HOMESTAY' => 'Atok',
                            'BURTON\'S CABIN AND YARD' => 'Atok',
                            'BUDA\'S TRANSIENT' => 'Atok',
                            'HAIGHT\'S PLACE' => 'Atok',
                            'NORTHERN BLOSSOMS FARM LODGING' => 'Atok',
                            'LOYUNG\'S HOMESTAY' => 'Atok',
                            'OUR NORTHERN HOME TRANSIENT HOUSE' => 'Atok',
                            'CAMSOL INN formerly JACS HOMESTAY' => 'Atok',
                            'BONTIGI\'S TRANSIENT HOUSE' => 'Atok',
                            'AVIC\'S HOMESTAY' => 'Atok',
                            'ATOK HAVEN TRANSIENT HOUSE' => 'Atok',
                            'CHERRY MAE\'S TRANSIENT' => 'Atok',
                            'G4D\'S TRANSIENT HOUSE' => 'Atok',
                            'HAIGHT\'S  COZY CHALET' => 'Atok',
                            'MILBUR HOMESTAY' => 'Atok',
                            'THE PRIDE HOUSE HOMESTAY' => 'Atok',
                            'SALTNIGHT TRANSIENT' => 'Atok',
                            'ROUTE 49 TRANSIENT HOUSE' => 'Atok',
                            'ED\'S HOMESTAY' => 'Atok',
                            'LOLA\'S CASA RENTAL' => 'Atok',
                            'NEWMOON CHALET' => 'Atok',
                            'BAKUN MUNICIPAL GUEST HOUSE' => 'Bakun',
                            'SINACBAT BARANGAY HALL' => 'Bakun',
                            'POBLACION EVACUATION CENTER' => 'Bakun',
                            'MUNICIPAL BUILDING' => 'Bakun',
                            'TABBAK MULTIPURPOSE BUILDING' => 'Bakun',
                            'TENGLAWAN MULTIPURPOSE COOPERATIVE BUILDING' => 'Bakun',
                            'BAKUN CENTRAL SCHOOL H.E. BUILDING' => 'Bakun',
                            'LUPONAN MULTIPURPOSE BUILDING' => 'Bakun',
                            'SLAB HOUSE' => 'Bokod',
                            'BALEY NEN KAMORA' => 'Bokod',
                            'LOLO CANCIO\'S TRAVELODGE' => 'Bokod',
                            'MUNICIPAL TOURISM GUESTROOM' => 'Bokod',
                            'ELENA\'S RESORT' => 'Bokod',
                            'ABONG NEN JUAN TAN TENIA' => 'Bokod',
                            'MARK\'S TRAVELLERS VIEW DECK INN' => 'Buguias',
                            'ALPINE G\'S LODGE AND RESTAURANT' => 'Buguias',
                            'RK\'S GARDEN BREEZE HOTEL AND RESTAURANT' => 'Buguias',
                            'BSU-BUGUIAS GUEST HOUSE' => 'Buguias',
                            'BOTEL RESORT' => 'Buguias',
                            'ABBAO RESORT' => 'Buguias',
                            'CASA YSABELLE' => 'Buguias',
                            'CITYSIDE BED NAD BREAKFAST (MANAGED BY BIG BELLY BUFFET)' => 'Itogon',
                            'ALPHALAND BAGUIO MOUNTAIN LODGES' => 'Itogon',
                            'GOOD MORNING POTTINGSHED' => 'Itogon',
                            'BALAY NA KAHOY' => 'Itogon',
                            'MAGIC LODGE' => 'Itogon',
                            'TINONGDAN GYMNASIUM WING' => 'Itogon',
                            '3RD FLOOR MULTI-PURPOSE BUILDING, TINONGDAN' => 'Itogon',
                            'LOLA\'S GRAND HOMESTAY' => 'Itogon',
                            'RIVERFRONT HOMESTAY' => 'Itogon',
                            'M-LLANA\'S TRANSIENT HOUSE' => 'Itogon',
                            'BALLAY TRANSIENT HOUSE' => 'Itogon',
                            'BEYONDBAGUIO CAFÉ' => 'Itogon',
                            'ME-AN HOMESTAY' => 'Kabayan',
                            'MT. PULAG FOREVER' => 'Kabayan',
                            'ORLENES HOMESTAY' => 'Kabayan',
                            'PINE CONE LODGE' => 'Kabayan',
                            'SUMMITVIEW BABAN\'S HOMESTAY-ELLEN (01)' => 'Kabayan',
                            '5J\'S CAMPSITE AND HOMESTAY' => 'Kabayan',
                            'BREEZY HOMESTAY' => 'Kabayan',
                            'DENCIO\'S HOMESTAY' => 'Kabayan',
                            'SMR HOMESTAY' => 'Kabayan',
                            'ESAY HOMESTAY' => 'Kabayan',
                            'NORTHERN BLOSSOM TRANSIENT' => 'Kabayan',
                            'PULTAK LODGE' => 'Kabayan',
                            'WANARA HOMESTAY' => 'Kabayan',
                            'LA-FE HOMESTAY' => 'Kabayan',
                            'KALAHAN HOMESTAY' => 'Kabayan',
                            'BATAKAGAN HOMESTAY' => 'Kabayan',
                            'BENITOS HOMESTAY' => 'Kabayan',
                            'AMIGO HOMESTAY' => 'Kabayan',
                            'BRUCELENESS HOMESTAY' => 'Kabayan',
                            'SHIELDONS HOMESTAY' => 'Kabayan',
                            'CLOUDGAZER HOMESTAY' => 'Kabayan',
                            'NIVERA HOMESTAY' => 'Kabayan',
                            'AKIKI TOURIST INN' => 'Kabayan',
                            'BRGY. TINONGDAN HOMESTAY' => 'Kabayan',
                            'DITAS HOMESTAY' => 'Kabayan',
                            'FRED AGUINSE HOMESTAY' => 'Kabayan',
                            'ROMEO HOMESTAY' => 'Kabayan',
                            'MANUEL HOMESTAY' => 'Kabayan',
                            'WAKIT HOMESTAY' => 'Kabayan',
                            'BERNARD HOMESTAY' => 'Kabayan',
                            'REGINE HOMESTAY' => 'Kabayan',
                            'FELICIANO HOMESTAY' => 'Kabayan',
                            'JUBAN HOMESTAY' => 'Kabayan',
                            'GARCIA HOMESTAY' => 'Kabayan',
                            'ARLENE HOMESTAY' => 'Kabayan',
                            'EVA HOMESTAY' => 'Kabayan',
                            'TREKKERS HOMESTAY' => 'Kabayan',
                            'JENELIN HOMESTAY' => 'Kabayan',
                            'AMBROCIO HOMESTAY' => 'Kabayan',
                            'BAHAY NI KUYA ROLI HOMESTAY' => 'Kabayan',
                            'AVONG NEN SUVANI CULTURAL HERITAGE HOME' => 'Kapangan',
                            'MAYFLOR\'S FASTFOOD HAUS AND LODGING' => 'Kapangan',
                            'TEPEE HOUSE' => 'Kapangan',
                            'MUNICIPAL GUEST HOUSE' => 'Kibungan',
                            'OUR LADY OF LOURDES PARISH GUEST HOUSE' => 'Kibungan',
                            'BARANGAY GUEST ROOM' => 'Kibungan',
                            'MAYOR\'S QAURTER' => 'Kibungan',
                            'OMAG-MUNICIPAL NURSERY GUEST HOUSE' => 'Kibungan',
                            'LOLA NILDA\'S AGRITOURISM PARK-HOMESTAY' => 'La Trinidad',
                            'LA TRINIDAD HOMESTAY' => 'La Trinidad',
                            'COSMIC FARM' => 'La Trinidad',
                            'BAPTC GUESTEL' => 'La Trinidad',
                            'HELP ENGLISH LANGUAGE PROGRAM' => 'La Trinidad',
                            'HIGHLAND BLOSSOMS' => 'La Trinidad',
                            'JS LODGE' => 'La Trinidad',
                            'BALI BEATA LODGING HOME' => 'La Trinidad',
                            'STRAWBERRY VALLEY HOTEL & RESTAURANT' => 'La Trinidad',
                            'WANAY\'S ROCKY MOUNTAIN HOMESTAY' => 'La Trinidad',
                            'BSU GLADIOLA CENTER' => 'La Trinidad',
                            'GARDEN NEN INES' => 'La Trinidad',
                            'TANAW PRESA' => 'La Trinidad',
                            'NATURE TOWER HOTEL' => 'La Trinidad',
                            'ADELLE\'S TRANSIENT' => 'La Trinidad',
                            'KOMEDOR CAFÉ AND INN (CHERYL ANN A. CAJIGAN)' => 'Mankayan',
                            'LAY-ODAN FARM (HECTOR D. DELA CRUZ)' => 'Mankayan',
                            'MICHELLE P. MANGALLAY' => 'Mankayan',
                            'PRECIOUS TWINS LODGE (REYNALDO D. PALOMO)' => 'Mankayan',
                            'ST. JOHN EVANGELIST GUEST HOUSE' => 'Mankayan',
                            'UPSIDE DOWN CAFÉ AND HOMESTAY' => 'Mankayan',
                            'HI-ACRES CAMP' => 'Sablan',
                            'LEAVES & PETALS ECO-GARDEN RESORT' => 'Sablan',
                            'SABLAN HILLS' => 'Sablan',
                            'LUSTREA TRANSIENT HOUSE' => 'Sablan',
                            'RKK\'S TRANSIENT HOUSE' => 'Tuba',
                            'EVER LODGE' => 'Tuba',
                            'PALM GROVE HOTSPRING AND MOUNTAIN RESORT' => 'Tuba',
                            'ASIN HOTSPRING POOTEN RESORT' => 'Tuba',
                            'RIVERVIEW WATERPARK' => 'Tuba',
                            'VALLEYPOINT CAMPSITE' => 'Tuba',
                            'BEZ AND OH LODGING HOME' => 'Tuba',
                            'BALAI TAKO (BY NOBLE NEST REALTY AND SERVICES)' => 'Tuba',
                            'WINACA ECO-CULTURAL VILLAGE' => 'Tublay',
                            'ANGLUBEN HOMESTAY' => 'Bakun',
                            'FERNANDEZ HOMESTAY' => 'Bakun',
                            'SAGUDAY BUILDING' => 'Bakun',
                            'BAGAYAO HOMESTAY' => 'Bakun',
                            'KINGS CABIN TRANSIENT HOUSE' => 'Itogon',
                            'LAZY BEAR' => 'Itogon',
                            'INA PURINGS TRANSIENT HOUSE' => 'Itogon',
                            'HEARTSVILLE TRANSIENT HOUSE' => 'Itogon',
                            'CLEOS TRANSIENT HOUSE' => 'Itogon',
                            'BCV TRANSIENT HOUSE' => 'Itogon',
                            'LOLA BEEZ TRANSIENT' => 'Itogon',
                            'JRL TRANSIENT HOUSE' => 'Itogon',
                            'AMAPOLA CLIFF TRANSIENT HOUSE' => 'Itogon',
                            'BABAN BOY HOMESTAY' => 'Kabayan',
                            'SUMMIT GEMS HOMESTAY' => 'Kabayan',
                            'ABONG NEN JUAN' => 'Kabayan',
                            'RYAN HOMESTAY' => 'Kabayan',
                            'BABAN\'S HOMESTAY- SUSAN  (02)' => 'Kabayan',
                            'AGNES HOMESTAY' => 'Kabayan',
                            'BABAN HOMESTAY- NEDA (04)' => 'Kabayan',
                            'CORNELIA HOMESTAY' => 'Kabayan',
                            'BABAN\'S HOMESTAY- JALLEN  (05)' => 'Kabayan',
                            'JONELIN HOMESTAY' => 'Kabayan',
                            'CLOUDFIELD TRANSIENT HOUSE' => 'Tuba',
                            'ERGIM TRANSIENT HOUSE' => 'Itogon',
                            'HERITAGE FARM HOMESTAY' => 'Tuba',
                            'JEWEL IGOROT BUILDING' => 'La Trinidad',
                            'TAMID-AY HOMESTAY' => 'Bakun',
                            'ITOGON MOUNTAIN VILLAGE CABINS' => 'Itogon',
                            'RIDDLEVIEW TRANSIENT HOUSE' => 'Atok',
                            'MAMITAS HOMESTAY' => 'Atok',
                            'Kabatuan I nn & Resort' => 'Mankayan',
                            'Imeelou Inn & Resort' => 'Mankayan',
                            'Everest Lodge' => 'Mankayan',
                            'LEAVES & SPIKES TRANSIENT HOUSE' => 'Atok',
                            'BABAN\'S HOMESTAY-SYLVIA (03)' => 'Kabayan',
                            'OSDAWEN HOMESTAY' => 'Kabayan',
                            'NANAY HONORIA' => 'Kabayan',
                            'RAG HOMESTAY' => 'Kabayan',
                        ];

                        if (isset($mapping[$state])) {
                            $set('municipality', $mapping[$state]);
                        }
                    })
                    ->options([
                        // FIXED: Added the list of establishments back in here so the dropdown actually works!
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

                TextInput::make('year')
                    ->label('Year')
                    ->numeric()
                    ->default(2026) // FIXED: Removed quotes around the number
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

                \Filament\Forms\Components\Section::make('Monthly Performance Metrics')
                ->schema([
                    // Guest Arrivals (GA)
                    \Filament\Forms\Components\Grid::make(2)
                        ->schema([
                            TextInput::make('ga_domestic')
                                ->label('Guest Arrival (GA) - Domestic')
                                ->numeric()
                                ->default(0),
                            TextInput::make('ga_foreign')
                                ->label('Guest Arrival (GA) - Foreign')
                                ->numeric()
                                ->default(0),
                        ]),

                    // Guest Nights (GN)
                    \Filament\Forms\Components\Grid::make(2)
                        ->schema([
                            TextInput::make('gn_domestic')
                                ->label('Guest Night (GN) - Domestic')
                                ->helperText('Formula: Domestic GA x No. of Nights')
                                ->numeric()
                                ->default(0),
                            TextInput::make('gn_foreign')
                                ->label('Guest Night (GN) - Foreign')
                                ->helperText('Formula: Foreign GA x No. of Nights')
                                ->numeric()
                                ->default(0),
                        ]),

                    // Rooms Occupied
                    TextInput::make('rooms_occupied')
                        ->label('No. of Rooms Occupied')
                        ->numeric()
                        ->default(0)
                        ->columnSpanFull(),
                ]),
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

                TextColumn::make('ga_stats')
                    ->label('Guest Arrivals (GA)')
                    ->getStateUsing(fn ($record) => 'Total: ' . ((int)$record->ga_domestic + (int)$record->ga_foreign))
                    ->description(fn ($record) => 'Dom: ' . $record->ga_domestic . ' | For: ' . $record->ga_foreign),

                TextColumn::make('gn_stats')
                    ->label('Guest Nights (GN)')
                    ->getStateUsing(fn ($record) => 'Total: ' . ((int)$record->gn_domestic + (int)$record->gn_foreign))
                    ->description(fn ($record) => 'Dom: ' . $record->gn_domestic . ' | For: ' . $record->gn_foreign),

                TextColumn::make('rooms_occupied')
                    ->label('Rooms Occupied')
                    ->badge()
                    ->color('warning')
                    ->sortable(),
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