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
use Filament\Forms\Components\Placeholder;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\HtmlString;

class AccommodationResource extends Resource
{
    protected static ?string $model = Accommodation::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                // ==========================================
                // PART 1: ESTABLISHMENT PROFILE
                // ==========================================
                Placeholder::make('divider_1')
                    ->hiddenLabel() 
                    ->columnSpanFull() 
                    ->content(new HtmlString('
                        <div style="margin-bottom: 10px; padding: 25px; background-color: #18181b; border: 1px solid #3f3f46; border-top: 4px solid #3b82f6; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                            <h2 style="font-size: 1.5rem; font-weight: bold; color: #ffffff; margin-bottom: 5px; margin-top: 0;">📋 PART 1: ESTABLISHMENT PROFILE</h2>
                            <span style="color: #9ca3af; font-size: 0.95rem;">Basic details, capacity, and staffing information.</span>
                        </div>
                    ')),

                Select::make('name') 
                    ->label('Name of Establishment')
                    ->searchable()
                    ->live()
                    ->columnSpanFull()
                    ->afterStateUpdated(function ($state, callable $set) {
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
                        ];
                        if (isset($mapping[$state])) {
                            $set('municipality', $mapping[$state]);
                        }
                    })
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

                Select::make('month')
                    ->label('Reporting Month')
                    ->options([
                        'JANUARY' => 'January', 'FEBRUARY' => 'February', 'MARCH' => 'March', 
                        'APRIL' => 'April', 'MAY' => 'May', 'JUNE' => 'June', 
                        'JULY' => 'July', 'AUGUST' => 'August', 'SEPTEMBER' => 'September', 
                        'OCTOBER' => 'October', 'NOVEMBER' => 'November', 'DECEMBER' => 'December'
                    ])
                    ->searchable()
                    ->required(),

                TextInput::make('year')
                    ->label('Reporting Year')
                    ->numeric()
                    ->default(2026)
                    ->minValue(1900)
                    ->maxValue(2100),

                TextInput::make('province')
                    ->label('Province / Region')
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

                TextInput::make('no_of_rooms')
                    ->label('Total Rooms in Establishment')
                    ->numeric()
                    ->default(0),

                TextInput::make('male_employees')
                    ->label('Male Staff')
                    ->numeric()
                    ->default(0),

                TextInput::make('female_employees')
                    ->label('Female Staff')
                    ->numeric()
                    ->default(0),

                // ==========================================
                // PART 2: CONDITIONAL GUEST ARRIVALS & NIGHTS
                // ==========================================
                Placeholder::make('divider_2')
                    ->hiddenLabel() 
                    ->columnSpanFull() 
                    ->content(new HtmlString('
                        <div style="margin-top: 50px; margin-bottom: 10px; padding: 25px; background-color: #18181b; border: 1px solid #3f3f46; border-top: 4px solid #10b981; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.3);">
                            <h2 style="font-size: 1.5rem; font-weight: bold; color: #ffffff; margin-bottom: 5px; margin-top: 0;">📊 PART 2: GUEST ARRIVALS</h2>
                            <span style="color: #9ca3af; font-size: 0.95rem;">Please provide the exact resident count, locations, and nights below.</span>
                        </div>
                    ')),

                // 1. Philippine Residents
                TextInput::make('ga_ph_count')
                    ->label('How many Philippine resident/s?')
                    ->numeric()
                    ->default(0)
                    ->live()
                    ->columnSpanFull(),

                TextInput::make('ga_ph_province')
                    ->label('What province/s are they from?')
                    ->placeholder('e.g., Benguet, Cebu')
                    ->maxLength(255)
                    ->visible(fn ($get) => (int) $get('ga_ph_count') > 0)
                    ->columnSpanFull(),

                TextInput::make('gn_ph_count')
                    ->label('How many nights did they stay? (Philippine Residents)')
                    ->numeric()
                    ->default(0)
                    ->visible(fn ($get) => (int) $get('ga_ph_count') > 0)
                    ->columnSpanFull(),

                // 2. Non-Philippine Residents
                TextInput::make('ga_non_fil_count')
                    ->label('How many non-Philippine resident/s?')
                    ->numeric()
                    ->default(0)
                    ->live()
                    ->columnSpanFull(),

                TextInput::make('ga_non_fil_country')
                    ->label('Which country/countries are they from?')
                    ->placeholder('e.g., South Korea, Japan')
                    ->maxLength(255)
                    ->visible(fn ($get) => (int) $get('ga_non_fil_count') > 0)
                    ->columnSpanFull(),

                TextInput::make('gn_non_fil_count')
                    ->label('How many nights did they stay? (Non-Philippine Residents)')
                    ->numeric()
                    ->default(0)
                    ->visible(fn ($get) => (int) $get('ga_non_fil_count') > 0)
                    ->columnSpanFull(),

                // 3. Unspecified
                TextInput::make('ga_unspecified')
                    ->label('How many unspecified resident/s?')
                    ->numeric()
                    ->default(0)
                    ->live()
                    ->columnSpanFull(),

                TextInput::make('gn_unspecified')
                    ->label('How many nights did they stay? (Unspecified Residents)')
                    ->numeric()
                    ->default(0)
                    ->visible(fn ($get) => (int) $get('ga_unspecified') > 0)
                    ->columnSpanFull(),

                // 4. Overseas Filipinos
                TextInput::make('ga_overseas_filipinos')
                    ->label('How many overseas filipino/s?')
                    ->numeric()
                    ->default(0)
                    ->live()
                    ->columnSpanFull(),

                TextInput::make('gn_overseas_filipinos')
                    ->label('How many nights did they stay? (Overseas Filipinos)')
                    ->numeric()
                    ->default(0)
                    ->visible(fn ($get) => (int) $get('ga_overseas_filipinos') > 0)
                    ->columnSpanFull(),


                // ==========================================
                // BOTTOM TOTALS SECTION
                // ==========================================
                Placeholder::make('divider_3')
                    ->hiddenLabel() 
                    ->columnSpanFull() 
                    ->content(new HtmlString('
                        <div style="margin-top: 30px; margin-bottom: 10px; padding: 20px; background-color: #18181b; border: 1px solid #3f3f46; border-top: 4px solid #f59e0b; border-radius: 8px;">
                            <h2 style="font-size: 1.25rem; font-weight: bold; color: #ffffff; margin-bottom: 0; margin-top: 0;">📈 TOTAL NO. ROOMS</h2>
                        </div>
                    ')),

                TextInput::make('number_of_nights')
                    ->label('Total No. Nights')
                    ->numeric()
                    ->default(0)
                    ->columnSpanFull(),

                TextInput::make('rooms_occupied')
                    ->label('Number of Rooms Occupied')
                    ->numeric()
                    ->default(0)
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->contentGrid([
                'md' => 2, // 2 cards on medium screens
                'xl' => 3, // 3 cards on large screens
            ])
            ->recordUrl(fn ($record) => Pages\ViewAccommodation::getUrl(['record' => $record]))
            ->columns([
                TextColumn::make('name')
                    ->label('') 
                    ->searchable()
                    ->html()
                    ->getStateUsing(function ($record) {
                        
                        // 1. Calculate Occupancy Rate safely
                        $noOfRooms = (int)$record->no_of_rooms;
                        $occupied = (int)$record->rooms_occupied;
                        $occupancyRate = $noOfRooms > 0 ? round(($occupied / $noOfRooms) * 100) : 0;
                        $occupancyRate = min($occupancyRate, 100); // Cap at 100%
                        
                        // Set the progress bar color: Green (good) -> Yellow (mid) -> Red (full)
                        $barColor = $occupancyRate >= 80 ? '#ef4444' : ($occupancyRate >= 50 ? '#f59e0b' : '#10b981');

                        // 2. Sum up total guests
                        $totalGuests = (int)$record->ga_ph_count + (int)$record->ga_non_fil_count + (int)$record->ga_unspecified + (int)$record->ga_overseas_filipinos;

                        // 3. Render the customized Figma-style HTML Card
                        return new HtmlString('
                            <div style="display: flex; flex-direction: column; gap: 1rem; cursor: pointer;">
                                
                                <!-- Card Header -->
                                <div>
                                    <h3 style="font-size: 1.125rem; font-weight: 700; color: #ffffff; margin: 0;">' . $record->name . '</h3>
                                    <p style="font-size: 0.875rem; color: #9ca3af; margin: 0; margin-top: 2px;">📍 ' . $record->municipality . ' • ' . ucfirst(strtolower($record->month)) . ' ' . $record->year . '</p>
                                </div>
                                
                                <!-- 3 Metric Boxes -->
                                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.5rem; text-align: center; background-color: #27272a; padding: 0.75rem; border-radius: 0.5rem;">
                                    <div>
                                        <div style="font-weight: 700; color: #3b82f6; font-size: 1.125rem;">' . $noOfRooms . '</div>
                                        <div style="color: #a1a1aa; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.05em;">Total</div>
                                    </div>
                                    <div>
                                        <div style="font-weight: 700; color: #10b981; font-size: 1.125rem;">' . $occupied . '</div>
                                        <div style="color: #a1a1aa; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.05em;">Occupied</div>
                                    </div>
                                    <div>
                                        <div style="font-weight: 700; color: #f59e0b; font-size: 1.125rem;">' . $totalGuests . '</div>
                                        <div style="color: #a1a1aa; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.05em;">Guests</div>
                                    </div>
                                </div>

                                <!-- Progress Bar -->
                                <div>
                                    <div style="display: flex; justify-content: space-between; font-size: 0.75rem; color: #d4d4d8; margin-bottom: 0.25rem;">
                                        <span>Occupancy Rate</span>
                                        <span style="font-weight: bold;">' . $occupancyRate . '%</span>
                                    </div>
                                    <div style="width: 100%; background-color: #3f3f46; border-radius: 9999px; height: 6px; overflow: hidden;">
                                        <div style="background-color: ' . $barColor . '; height: 100%; border-radius: 9999px; width: ' . $occupancyRate . '%;"></div>
                                    </div>
                                </div>
                                
                            </div>
                        ');
                    }),
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
            'view' => Pages\ViewAccommodation::route('/{record}'),
            'edit' => Pages\EditAccommodation::route('/{record}/edit'),
        ];
    }
    
    public static function getWidgets(): array
    {
        return [
            Widgets\AccommodationStatsOverview::class,
        ];
    }
}