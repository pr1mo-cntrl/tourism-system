<?php

namespace App\Filament\Resources\Accommodations\Pages;

use App\Filament\Resources\Accommodations\AccommodationResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;
use Filament\Actions; // ADDED: Required for the top right buttons

class ViewAccommodation extends ViewRecord
{
    protected static string $resource = AccommodationResource::class;

    // ==========================================
    // THIS ADDS THE 'EDIT' BUTTON AT THE TOP RIGHT
    // ==========================================
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->color('primary')
                ->icon('heroicon-m-pencil-square'),
        ];
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Placeholder::make('clean_view')
                    ->hiddenLabel()
                    ->columnSpanFull()
                    ->content(function ($record) {
                        
                        $phProv = $record->ga_ph_province ?: 'N/A';
                        $forCountry = $record->ga_non_fil_country ?: 'N/A';
                        
                        return new HtmlString('
                            <div style="background-color: #18181b; border: 1px solid #3f3f46; border-radius: 8px; padding: 30px; color: #e4e4e7;">
                                
                                <!-- HEADER -->
                                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                    <div>
                                        <h1 style="font-size: 2rem; font-weight: bold; color: #ffffff; margin-bottom: 0; line-height: 1;">' . $record->name . '</h1>
                                        <p style="color: #9ca3af; font-size: 1rem; margin-top: 8px;">📍 ' . $record->municipality . ', ' . $record->province . ' &nbsp;|&nbsp; 📅 ' . $record->month . ' ' . $record->year . ' &nbsp;|&nbsp; 🏷️ Type: ' . $record->type . '</p>
                                    </div>
                                </div>
                                
                                <hr style="border-color: #3f3f46; margin: 25px 0;">
                                
                                <!-- TOP METRICS -->
                                <h3 style="font-size: 1.2rem; color: #ffffff; margin-bottom: 15px;">🏢 Capacity & Staffing</h3>
                                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 35px;">
                                    <div style="background: #27272a; padding: 15px; border-radius: 8px; border-left: 4px solid #3b82f6;">
                                        <h4 style="color: #9ca3af; font-size: 0.75rem; text-transform: uppercase; margin:0;">Total Rooms Available</h4>
                                        <p style="font-size: 1.5rem; font-weight: bold; color: white; margin: 5px 0 0 0;">' . ($record->no_of_rooms ?: 0) . '</p>
                                    </div>
                                    <div style="background: #27272a; padding: 15px; border-radius: 8px; border-left: 4px solid #a855f7;">
                                        <h4 style="color: #9ca3af; font-size: 0.75rem; text-transform: uppercase; margin:0;">Male Staff</h4>
                                        <p style="font-size: 1.5rem; font-weight: bold; color: white; margin: 5px 0 0 0;">' . ($record->male_employees ?: 0) . '</p>
                                    </div>
                                    <div style="background: #27272a; padding: 15px; border-radius: 8px; border-left: 4px solid #ec4899;">
                                        <h4 style="color: #9ca3af; font-size: 0.75rem; text-transform: uppercase; margin:0;">Female Staff</h4>
                                        <p style="font-size: 1.5rem; font-weight: bold; color: white; margin: 5px 0 0 0;">' . ($record->female_employees ?: 0) . '</p>
                                    </div>
                                </div>

                                <!-- GUEST ARRIVALS GRID -->
                                <h3 style="font-size: 1.2rem; color: #ffffff; margin-bottom: 15px;">👥 Guest Arrivals Breakdown</h3>
                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 35px;">
                                    
                                    <!-- PH Residents -->
                                    <div style="background: #27272a; padding: 20px; border-radius: 8px;">
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                            <h4 style="color: #ffffff; font-weight: bold; margin: 0;">🇵🇭 Philippine Residents</h4>
                                            <span style="background: #10b981; color: black; padding: 2px 8px; border-radius: 12px; font-size: 0.8rem; font-weight: bold;">' . ($record->ga_ph_count ?: 0) . ' Guests</span>
                                        </div>
                                        <p style="color: #9ca3af; font-size: 0.9rem; margin: 0 0 5px 0;"><strong>Nights Stayed:</strong> ' . ($record->gn_ph_count ?: 0) . '</p>
                                        <p style="color: #9ca3af; font-size: 0.9rem; margin: 0;"><strong>From:</strong> ' . $phProv . '</p>
                                    </div>

                                    <!-- Foreign -->
                                    <div style="background: #27272a; padding: 20px; border-radius: 8px;">
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                            <h4 style="color: #ffffff; font-weight: bold; margin: 0;">✈️ Non-Philippine Residents</h4>
                                            <span style="background: #3b82f6; color: white; padding: 2px 8px; border-radius: 12px; font-size: 0.8rem; font-weight: bold;">' . ($record->ga_non_fil_count ?: 0) . ' Guests</span>
                                        </div>
                                        <p style="color: #9ca3af; font-size: 0.9rem; margin: 0 0 5px 0;"><strong>Nights Stayed:</strong> ' . ($record->gn_non_fil_count ?: 0) . '</p>
                                        <p style="color: #9ca3af; font-size: 0.9rem; margin: 0;"><strong>From:</strong> ' . $forCountry . '</p>
                                    </div>

                                    <!-- OF -->
                                    <div style="background: #27272a; padding: 20px; border-radius: 8px;">
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                            <h4 style="color: #ffffff; font-weight: bold; margin: 0;">🌍 Overseas Filipinos</h4>
                                            <span style="background: #f59e0b; color: black; padding: 2px 8px; border-radius: 12px; font-size: 0.8rem; font-weight: bold;">' . ($record->ga_overseas_filipinos ?: 0) . ' Guests</span>
                                        </div>
                                        <p style="color: #9ca3af; font-size: 0.9rem; margin: 0;"><strong>Nights Stayed:</strong> ' . ($record->gn_overseas_filipinos ?: 0) . '</p>
                                    </div>

                                    <!-- Unspecified -->
                                    <div style="background: #27272a; padding: 20px; border-radius: 8px;">
                                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                            <h4 style="color: #ffffff; font-weight: bold; margin: 0;">❓ Unspecified Residents</h4>
                                            <span style="background: #6b7280; color: white; padding: 2px 8px; border-radius: 12px; font-size: 0.8rem; font-weight: bold;">' . ($record->ga_unspecified ?: 0) . ' Guests</span>
                                        </div>
                                        <p style="color: #9ca3af; font-size: 0.9rem; margin: 0;"><strong>Nights Stayed:</strong> ' . ($record->gn_unspecified ?: 0) . '</p>
                                    </div>

                                </div>

                                <hr style="border-color: #3f3f46; margin: 25px 0;">

                                <!-- GRAND TOTALS -->
                                <div style="display: flex; gap: 20px; background: #18181b; border: 1px solid #f59e0b; padding: 20px; border-radius: 8px;">
                                    <div style="flex: 1; text-align: center; border-right: 1px solid #3f3f46;">
                                        <p style="color: #f59e0b; font-size: 0.9rem; font-weight: bold; text-transform: uppercase; margin: 0 0 5px 0;">Total Rooms Occupied</p>
                                        <h2 style="color: #ffffff; font-size: 2.5rem; margin: 0;">' . ($record->rooms_occupied ?: 0) . '</h2>
                                    </div>
                                    <div style="flex: 1; text-align: center;">
                                        <p style="color: #f59e0b; font-size: 0.9rem; font-weight: bold; text-transform: uppercase; margin: 0 0 5px 0;">Total Number of Nights</p>
                                        <h2 style="color: #ffffff; font-size: 2.5rem; margin: 0;">' . ($record->number_of_nights ?: 0) . '</h2>
                                    </div>
                                </div>

                            </div>
                        ');
                    })
            ]);
    }
}