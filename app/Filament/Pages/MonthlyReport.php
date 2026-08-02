<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\VisitorRecord;
use BackedEnum;

class MonthlyReport extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected string $view = 'filament.pages.monthly-report';
    protected static ?string $navigationLabel = 'Official Monthly Report';

    public $selectedMonth;
    public $selectedYear;
    public $selectedMunicipality = 'La Trinidad';

    public function mount()
    {
        $this->selectedMonth = strtoupper(now()->format('F')); 
        $this->selectedYear = now()->format('Y'); 
    }

    public function updated($property)
    {
        $this->dispatch('update-charts');
    }

    public function getChartData()
    {
        $months = ['JANUARY','FEBRUARY','MARCH','APRIL','MAY','JUNE','JULY','AUGUST','SEPTEMBER','OCTOBER','NOVEMBER','DECEMBER'];
        $trend = [];
        foreach($months as $m) {
            $trendRecords = VisitorRecord::where('year', $this->selectedYear)
                ->where('municipality_name', $this->selectedMunicipality)
                ->where('month', $m)
                ->get();
            $mTotal = 0;
            foreach($trendRecords as $r) {
                // Included unspecified in the monthly total
                $mTotal += $r->local_male + $r->local_female + $r->other_mun_male + $r->other_mun_female + $r->other_prov_male + $r->other_prov_female + $r->foreign_male + $r->foreign_female + $r->unspecified_male + $r->unspecified_female;
            }
            $trend[] = $mTotal;
        }

        $currentRecords = $this->records;
        
        $local = $currentRecords->sum('local_male') + $currentRecords->sum('local_female');
        $otherMun = $currentRecords->sum('other_mun_male') + $currentRecords->sum('other_mun_female');
        $otherProv = $currentRecords->sum('other_prov_male') + $currentRecords->sum('other_prov_female');
        $foreign = $currentRecords->sum('foreign_male') + $currentRecords->sum('foreign_female');
        $unspecified = $currentRecords->sum('unspecified_male') + $currentRecords->sum('unspecified_female'); // NEW

        $domestic = $local + $otherMun + $otherProv;

        // Included unspecified in gender totals
        $male = $currentRecords->sum('local_male') + $currentRecords->sum('other_mun_male') + $currentRecords->sum('other_prov_male') + $currentRecords->sum('foreign_male') + $currentRecords->sum('unspecified_male');
        $female = $currentRecords->sum('local_female') + $currentRecords->sum('other_mun_female') + $currentRecords->sum('other_prov_female') + $currentRecords->sum('foreign_female') + $currentRecords->sum('unspecified_female');

        return [
            'trend' => $trend,
            'residence' => [$local, $otherMun, $otherProv, $foreign, $unspecified], // Added to array
            'gender' => [$male, $female],
            'domesticVsForeign' => [$domestic, $foreign, $unspecified] // Added as a 3rd gray slice
        ];
    }

    public function getRecordsProperty()
    {
        return VisitorRecord::where('month', $this->selectedMonth)
            ->where('year', $this->selectedYear)
            ->where('municipality_name', $this->selectedMunicipality)
            ->get();
    }
}