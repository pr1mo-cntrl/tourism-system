<?php

namespace App\Filament\Resources\VisitorRecords\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class VisitorRecordForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('month')
                    ->label('Month')
                    ->options([
                        'JANUARY' => 'JANUARY', 'FEBRUARY' => 'FEBRUARY', 'MARCH' => 'MARCH',
                        'APRIL' => 'APRIL', 'MAY' => 'MAY', 'JUNE' => 'JUNE',
                        'JULY' => 'JULY', 'AUGUST' => 'AUGUST', 'SEPTEMBER' => 'SEPTEMBER',
                        'OCTOBER' => 'OCTOBER', 'NOVEMBER' => 'NOVEMBER', 'DECEMBER' => 'DECEMBER',
                    ])
                    ->required(),

                Select::make('year')
                    ->label('Year')
                    ->options(['2026' => '2026', '2025' => '2025', '2027' => '2027'])
                    ->default('2026')
                    ->required(),
                    
                Select::make('municipality_name')
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
                    ->live() 
                    ->afterStateUpdated(fn ($set) => $set('attraction_name', null)) 
                    ->required(),
                    
                Select::make('attraction_name')
                    ->label('Tourist Attraction Name')
                    ->options(function ($get) {
                        $municipality = $get('municipality_name');
                        
                        $attractions = [
                            'Baguio City' => [
                                'BURNHAM PARK' => 'BURNHAM PARK',
                                'MINES VIEW PARK' => 'MINES VIEW PARK',
                                'CAMP JOHN HAY' => 'CAMP JOHN HAY',
                                'BOTANICAL GARDEN' => 'BOTANICAL GARDEN',
                            ],
                            'Atok' => [
                                'BENGUET-KOCHI SISTERHOOD PARK/VEGETABLE FARMS/ MOSSY FOREST/HAIGHT\'S PLACE' => 'BENGUET-KOCHI SISTERHOOD PARK/VEGETABLE FARMS/ MOSSY FOREST/HAIGHT\'S PLACE',
                                'NORTHERN BLOSSOM FLOWER FARM' => 'NORTHERN BLOSSOM FLOWER FARM',
                                'ORGANIC FARMS(CARMELITA SACLEY\'S FARM)' => 'ORGANIC FARMS(CARMELITA SACLEY\'S FARM)',
                                'OSUCAN TUNNEL' => 'OSUCAN TUNNEL',
                                'HALF TUNNEL' => 'HALF TUNNEL',
                                'HIGHEST POINT' => 'HIGHEST POINT',
                                'MT. TIMBAC SUMMIT' => 'MT. TIMBAC SUMMIT',
                                'LOURDES GROTTO' => 'LOURDES GROTTO',
                                'WAGANGAN ROCK FORMATION' => 'WAGANGAN ROCK FORMATION',
                                'PICKLES THORN FLOWER GARDEN' => 'PICKLES THORN FLOWER GARDEN',
                                'HIDDEN CYPRESS BOTANICAL GARDEN' => 'HIDDEN CYPRESS BOTANICAL GARDEN',
                                'LALLY\'S GARDEN' => 'LALLY\'S GARDEN',
                                'MT. OLIS VIEWPOINT' => 'MT. OLIS VIEWPOINT',
                                'MERLYN\'S GARDEN' => 'MERLYN\'S GARDEN',
                                'AMBIANCE GARDEN' => 'AMBIANCE GARDEN',
                                'BURTON\'S CABIN & YARD' => 'BURTON\'S CABIN & YARD',
                                'TAYAO FARMS' => 'TAYAO FARMS',
                                'GOAT CLIFF ROCK ADVENTURES' => 'GOAT CLIFF ROCK ADVENTURES',
                                'STELLAR VIEW' => 'STELLAR VIEW',
                                'ATV ADVENTURES' => 'ATV ADVENTURES',
                                'LAS-ANG ECOTRAIL AND CABIN' => 'LAS-ANG ECOTRAIL AND CABIN',
                            ],
                            'Bakun' => [
                                'MT. KABUNIAN' => 'MT. KABUNIAN',
                                'MT. PATULLOK (MT. LOBO)' => 'MT. PATULLOK (MT. LOBO)',
                                'MT. TENGLAWAN' => 'MT. TENGLAWAN',
                                'PIKAW FALLS' => 'PIKAW FALLS',
                                'TEKIP FALLS' => 'TEKIP FALLS',
                                'MANGTA FALLS' => 'MANGTA FALLS',
                                'PATTAN FALLS' => 'PATTAN FALLS',
                                'MT. GEDGEDAYYAN' => 'MT. GEDGEDAYYAN',
                            ],
                            'Bokod' => [
                                'AMBUKLAO DAM' => 'AMBUKLAO DAM',
                                'INIDIAN VIEW' => 'INIDIAN VIEW',
                                'SPILL WAY VIEW' => 'SPILL WAY VIEW',
                                'BANAO RIVER' => 'BANAO RIVER',
                                'MT. PURGATORY' => 'MT. PURGATORY',
                                'PIGINGAN/ BAJOMBONG FALLS' => 'PIGINGAN/ BAJOMBONG FALLS',
                                'DAKLAN SULFUR SPRING (formerly BADEKBEK HOT SPRING)' => 'DAKLAN SULFUR SPRING (formerly BADEKBEK HOT SPRING)',
                                'BOBOK PINE FOREST' => 'BOBOK PINE FOREST',
                                'BOBOK BISAL DOWN HILL BIKE TRAIL' => 'BOBOK BISAL DOWN HILL BIKE TRAIL',
                                'ADWAGAN RIVER' => 'ADWAGAN RIVER',
                                'PALANSA PANORAMIC VIEW' => 'PALANSA PANORAMIC VIEW',
                                'KINTANA/ JUAKENMAR SWIMMING POOL' => 'KINTANA/ JUAKENMAR SWIMMING POOL',
                                'HYUVANA SWIMMING POOL' => 'HYUVANA SWIMMING POOL',
                                'ELENA\'S RESORT' => 'ELENA\'S RESORT',
                                'KAMP PATADAN' => 'KAMP PATADAN',
                            ],
                            'Buguias' => [
                                'ABBAO RESORT' => 'ABBAO RESORT',
                                'BOTEL RESORT' => 'BOTEL RESORT',
                            ],
                            'Itogon' => [
                                'MT. UGO' => 'MT. UGO',
                                'BINGA INDIGENOUS PEOPLES CULTURAL HERITAGE SITE (BIPCHS)' => 'BINGA INDIGENOUS PEOPLES CULTURAL HERITAGE SITE (BIPCHS)',
                                'MT. PIGINGAN' => 'MT. PIGINGAN',
                                'PAHAK RESORT' => 'PAHAK RESORT',
                                'CROSBY PARK' => 'CROSBY PARK',
                                '1300 LEVEL SWIMMING POOL' => '1300 LEVEL SWIMMING POOL',
                                'MT. ULAP' => 'MT. ULAP',
                                'MT. MARIKIT' => 'MT. MARIKIT',
                                'AGRO-ECOTOURISM PARK' => 'AGRO-ECOTOURISM PARK',
                                'MT. BIDAWAN' => 'MT. BIDAWAN',
                                'MT. ANAP-PIGINGAN' => 'MT. ANAP-PIGINGAN',
                                'MT. CAMISONG FOREST PARKS AND EVENTS' => 'MT. CAMISONG FOREST PARKS AND EVENTS',
                                'HERITAGE HOUSES' => 'HERITAGE HOUSES',
                            ],
                            'Kabayan' => [
                                'MT. PULAG' => 'MT. PULAG',
                            ],
                            'Kapangan' => [
                                'MT. DAKIWAGAN' => 'MT. DAKIWAGAN',
                                'BADI FALLS' => 'BADI FALLS',
                                'AMBURAYAN RIVER' => 'AMBURAYAN RIVER',
                                'LONGOG CAVE' => 'LONGOG CAVE',
                                'DUMANAY BURIAL CAVE' => 'DUMANAY BURIAL CAVE',
                                'SUVANI\'S AVONG' => 'SUVANI\'S AVONG',
                                'BADOL CAMPING GROUND/ CAMP UTOPIA' => 'BADOL CAMPING GROUND/ CAMP UTOPIA',
                                'ONGONG FALLS' => 'ONGONG FALLS',
                                'BULALACAO CAVE' => 'BULALACAO CAVE',
                                'NARO\'S FARM' => 'NARO\'S FARM',
                                'PEY-OG FALLS' => 'PEY-OG FALLS',
                            ],
                            'Kibungan' => [
                                'MT. OTEN' => 'MT. OTEN',
                                'MT. TAGPAYA' => 'MT. TAGPAYA',
                                'MT. KILKILI' => 'MT. KILKILI',
                                'MT. TAGPEW' => 'MT. TAGPEW',
                                'TANAP RICE TERRACES' => 'TANAP RICE TERRACES',
                                'PALINA RICE TERRACES' => 'PALINA RICE TERRACES',
                                'LES-ENG RICE TERRACES' => 'LES-ENG RICE TERRACES',
                                'MADAYMEN VEGETABLE TERRACES' => 'MADAYMEN VEGETABLE TERRACES',
                                'ABAS HOT SPRING' => 'ABAS HOT SPRING',
                                'OUR LADY OF LOURDES PARISH CHURCH' => 'OUR LADY OF LOURDES PARISH CHURCH',
                                'LUBO LAKE' => 'LUBO LAKE',
                                'MUNICIPAL TOWN HALL (FESTIVAL/EVENTS/ACTIVITIES)' => 'MUNICIPAL TOWN HALL (FESTIVAL/EVENTS/ACTIVITIES)',
                                'TACADANG MIGHTY GATES' => 'TACADANG MIGHTY GATES',
                            ],
                            'La Trinidad' => [
                                'BSU STRAWBERRY FARM' => 'BSU STRAWBERRY FARM',
                                'BENGUET MUSEUM' => 'BENGUET MUSEUM',
                                'BELL CHURCH' => 'BELL CHURCH',
                                'MT. KALUGONG' => 'MT. KALUGONG',
                                'MT. YANGBEW' => 'MT. YANGBEW',
                                'STOBOSA HILLSIDE HOMES ARTWORKS' => 'STOBOSA HILLSIDE HOMES ARTWORKS',
                                'BSU' => 'BSU',
                                'JEFFREY VISAYA\'S VIEW' => 'JEFFREY VISAYA\'S VIEW',
                                'LA TRINIDAD VEGETABLE TRADING POST' => 'LA TRINIDAD VEGETABLE TRADING POST',
                                'COSMIC FARM' => 'COSMIC FARM',
                                'LILY OF THE VALLEY ORGANIC FARM' => 'LILY OF THE VALLEY ORGANIC FARM',
                                'MOUNT COSTA' => 'MOUNT COSTA',
                                'AVONG NEN ROMY' => 'AVONG NEN ROMY',
                                'DARJANE\'S FLOWER GARDEN' => 'DARJANE\'S FLOWER GARDEN',
                                'LIVING GIFTS NURSERY' => 'LIVING GIFTS NURSERY',
                                'ADMIRALS FARM PARK' => 'ADMIRALS FARM PARK',
                                'GARDEN NEN INES' => 'GARDEN NEN INES',
                                'SAGPAWE HIDDEN GARDEN' => 'SAGPAWE HIDDEN GARDEN',
                                'KENVIN\'S GARDEN' => 'KENVIN\'S GARDEN',
                                'KIYOMIE\'S GARDEN' => 'KIYOMIE\'S GARDEN',
                                'ROCKY MOUNTAIN ADVENTURE/  MT. TAYAWAN ECO PARK' => 'ROCKY MOUNTAIN ADVENTURE/  MT. TAYAWAN ECO PARK',
                                'ROCKY MOUNTAIN RESORT' => 'ROCKY MOUNTAIN RESORT',
                                'SADJATAN VIEWPOINT' => 'SADJATAN VIEWPOINT',
                                'VALLEYWOOD ADVENTURE PARK' => 'VALLEYWOOD ADVENTURE PARK',
                                'BAHONG SUNFLOWER FARM' => 'BAHONG SUNFLOWER FARM',
                                'PUGAD NI ARTS STUDIO' => 'PUGAD NI ARTS STUDIO',
                                'PUGUIS COMMUNAL FOREST' => 'PUGUIS COMMUNAL FOREST',
                                'PATAWID GYAYARI' => 'PATAWID GYAYARI',
                                'MARTINS HOBBIT HOUSE' => 'MARTINS HOBBIT HOUSE',
                            ],
                            'Mankayan' => [
                                'LEPANTO MINE CAMP' => 'LEPANTO MINE CAMP',
                                'LEPANTO GOLF' => 'LEPANTO GOLF',
                                'JOHN KENNY ORGANIC FARM/ JOHN JOSH FARM' => 'JOHN KENNY ORGANIC FARM/ JOHN JOSH FARM',
                                'BAANGAN ESCAPADE' => 'BAANGAN ESCAPADE',
                                'LAY-ODAN FARM' => 'LAY-ODAN FARM',
                                'BIGGEST GONG' => 'BIGGEST GONG',
                                'AM-AM MADALIPEY VIEW' => 'AM-AM MADALIPEY VIEW',
                                'JLM FARM' => 'JLM FARM',
                            ],
                            'Sablan' => [
                                'TOWING WATERFALLS' => 'TOWING WATERFALLS',
                                'BENGUET AGRI-DEMO FARM/BULALA DEMO FARM' => 'BENGUET AGRI-DEMO FARM/BULALA DEMO FARM',
                                'ANENG RIVER & BAYOCBOC FALLS' => 'ANENG RIVER & BAYOCBOC FALLS',
                                'HIGH ACRES' => 'HIGH ACRES',
                                'SABLAN FRUIT FESTIVAL' => 'SABLAN FRUIT FESTIVAL',
                                'LEAVES & PETALS ECO-GARDEN RESORT' => 'LEAVES & PETALS ECO-GARDEN RESORT',
                                'SABLAN HILLS' => 'SABLAN HILLS',
                            ],
                            'Tuba' => [
                                'BENCAB MUSEUM' => 'BENCAB MUSEUM',
                                'NEVERLAND' => 'NEVERLAND',
                                'PALM GROVE' => 'PALM GROVE',
                                'RIVERVIEW WATER PARK' => 'RIVERVIEW WATER PARK',
                                'ASIN HOTSPRING POOTEN RESORT' => 'ASIN HOTSPRING POOTEN RESORT',
                                'SINOT HOT SPRING' => 'SINOT HOT SPRING',
                                'ARAN CAVE' => 'ARAN CAVE',
                                'BROWNFIELDS BUILDERS' => 'BROWNFIELDS BUILDERS',
                                'ALLYANA SOLENN\'S RESORT' => 'ALLYANA SOLENN\'S RESORT',
                                'SULFURIN HOT SPRING' => 'SULFURIN HOT SPRING',
                                'BREDCO RESORT' => 'BREDCO RESORT',
                                'ETHANS SWIMMING POOL' => 'ETHANS SWIMMING POOL',
                                'HIDDEN PARADISE SWIMMING POOL' => 'HIDDEN PARADISE SWIMMING POOL',
                                'KIWAS RESORT' => 'KIWAS RESORT',
                                'GREEN NARRAN CAMPSITE' => 'GREEN NARRAN CAMPSITE',
                                'UM-A FARM' => 'UM-A FARM',
                                'COLORADO FALLS' => 'COLORADO FALLS',
                                'HD MOUNTAINVILLE' => 'HD MOUNTAINVILLE',
                                'TUMPAO RESORT' => 'TUMPAO RESORT',
                                'AZURE RIVERPOOL' => 'AZURE RIVERPOOL',
                                'KISSING CLOUDS AGRICULTURAL FARM' => 'KISSING CLOUDS AGRICULTURAL FARM',
                            ],
                            'Tublay' => [
                                'BENGAONGAO CAVE' => 'BENGAONGAO CAVE',
                                'PATERNO CAVE' => 'PATERNO CAVE',
                                'BAYOKBOK FALLS' => 'BAYOKBOK FALLS',
                                'ENCA ORGANIC FARM' => 'ENCA ORGANIC FARM',
                                'WINACA ECO CULTURAL VILLAGE AND FOREST HOMES' => 'WINACA ECO CULTURAL VILLAGE AND FOREST HOMES',
                                'TUBLAY PASALUBONG CENTER' => 'TUBLAY PASALUBONG CENTER',
                                'MOUNT POKKONG(FORMERLY MT. POGKONG)' => 'MOUNT POKKONG(FORMERLY MT. POGKONG)',
                                'ASIN HOTSPRING' => 'ASIN HOTSPRING',
                                'OVEK CAVE' => 'OVEK CAVE',
                                'SAGUIBALETE PARK (FORMERLY BALITE TREE)' => 'SAGUIBALETE PARK (FORMERLY BALITE TREE)',
                                'BURIAL CAVE' => 'BURIAL CAVE',
                                'KETONG FALLS (BLUE LAGOON)' => 'KETONG FALLS (BLUE LAGOON)',
                                'PAYAY ROCK CLIMBING' => 'PAYAY ROCK CLIMBING',
                                'KAALNUSAN CAMPING GROUND' => 'KAALNUSAN CAMPING GROUND',
                                'SIAM SIAM FALLS' => 'SIAM SIAM FALLS',
                                'AHONDA CAVES, ROCK FORMATIONS AND JUNGLE ADVENTURE' => 'AHONDA CAVES, ROCK FORMATIONS AND JUNGLE ADVENTURE',
                                'D\' RIDGE RECREATIONAL HUB' => 'D\' RIDGE RECREATIONAL HUB',
                                'POLIG\'S BERRY FARM' => 'POLIG\'S BERRY FARM',
                                'ALOKIP-PINAN ECO TRAIL' => 'ALOKIP-PINAN ECO TRAIL',
                                'NATURE LOVER\'S GARDEN' => 'NATURE LOVER\'S GARDEN',
                                'GLAMPING SITE' => 'GLAMPING SITE',
                                'AMANDO\'S LEMON PICKING FARM' => 'AMANDO\'S LEMON PICKING FARM',
                                'BEACON HILL ECO-PARK' => 'BEACON HILL ECO-PARK',
                            ],
                        ];
                        
                        return $attractions[$municipality] ?? [];
                    })
                    ->searchable() 
                    ->required(),
                    
                // NEW FIELD ADDED HERE
                Select::make('attraction_code')
                    ->label('Attraction Code')
                    ->searchable()
                    ->options([
                        '1. Nature' => [
                            '101' => '101 - Mountains/hills/highlands',
                            '102' => '102 - Falls',
                            '103' => '103 - Lakes and Pond',
                            '104' => '104 - River and Landscape (includes subterranean rivers)',
                            '105' => '105 - Coastal Landscape and Seascape',
                            '106' => '106 - Marine Park',
                            '107' => '107 - Caves (inland)',
                            '108' => '108 - Unique Natural Landscape / Seascape',
                            '109' => '109 - Volcanoes',
                            '199' => '199 - Other Natural Attractions',
                        ],
                        '2. History and Culture' => [
                            '201' => '201 - Fort',
                            '202' => '202 - Church, Mosque or Temples',
                            '203' => '203 - Historical Road/Trails',
                            '204' => '204 - Historic Monuments',
                            '205' => '205 - Museum',
                            '206' => '206 - Structures and Buildings',
                            '207' => '207 - Unique Cultural Heritage',
                            '208' => '208 - Archaeological/Historic Sites',
                            '299' => '299 - Other Historical or cultural attractions',
                        ],
                        '3. Industrial Tourism' => [
                            '301' => '301 - Agro-Forestry',
                            '302' => '302 - Farm and Ranch',
                            '303' => '303 - Fishery',
                            '304' => '304 - Arts and Craft',
                            '305' => '305 - Industrial Facilities for Visitors',
                        ],
                        '4. Sports and Recreational Facilities' => [
                            '401' => '401 - Golf',
                            '402' => '402 - Tennis',
                            '403' => '403 - Cycling Road and Area',
                            '404' => '404 - Zoo and Botanical Garden',
                            '405' => '405 - Sports Complex',
                            '406' => '406 - Camping Ground',
                            '407' => '407 - Nature Trail and Path',
                            '408' => '408 - Beach for Sea Bathing',
                            '409' => '409 - Pools and Springs',
                            '410' => '410 - Marina and Harbor',
                            '411' => '411 - Parks',
                            '412' => '412 - Leisure-land, Theme Park',
                            '413' => '413 - Resort Complex',
                            '414' => '414 - Other Sports and Recreational Activities',
                            '415' => '415 - Casino',
                            '416' => '416 - Water Sports',
                        ],
                        '5. Shopping' => [
                            '501' => '501 - Malls, Department Stores',
                            '502' => '502 - Open Air Market, Traditional Market Area',
                            '503' => '503 - Souvenirs And Delicacies',
                        ],
                        '6. Customs and Traditions' => [
                            '601' => '601 - Local Specialty Restaurant',
                            '602' => '602 - Festivals',
                            '603' => '603 - Performing Arts',
                            '604' => '604 - Local Culture and Traditions',
                        ],
                        '7. Special Event' => [
                            '701' => '701 - Exposition',
                            '702' => '702 - Convention',
                            '703' => '703 - Sports Event',
                            '799' => '799 - Other Events',
                        ],
                        '8. Health and Wellness' => [
                            '801' => '801 - Hot Spring',
                            '802' => '802 - Cold Spring',
                            '803' => '803 - Spa',
                            '804' => '804 - Hospital/Clinics/Medical Tourism Facilities',
                        ],
                        '9. Others' => [
                            '901' => '901 - Others (Please specify)',
                        ],
                    ])
                    ->required(),
                    
                TextInput::make('local_male')->label('This Municipality - Male')->numeric()->default(0),
                TextInput::make('local_female')->label('This Municipality - Female')->numeric()->default(0),
                
                TextInput::make('other_mun_male')->label('Other Municipality - Male')->numeric()->default(0),
                TextInput::make('other_mun_female')->label('Other Municipality - Female')->numeric()->default(0),
                
                TextInput::make('other_prov_male')->label('Other Province - Male')->numeric()->default(0),
                TextInput::make('other_prov_female')->label('Other Province - Female')->numeric()->default(0),
                
                TextInput::make('foreign_male')->label('Foreign Country Residence - Male')->numeric()->default(0),
                TextInput::make('foreign_female')->label('Foreign Country Residence - Female')->numeric()->default(0),
                TextInput::make('unspecified_male')->label('Unspecified Residence - Male')->numeric()->default(0),
                TextInput::make('unspecified_female')->label('Unspecified Residence - Female')->numeric()->default(0),
            ]);
    }
}