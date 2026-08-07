<x-filament-panels::page>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .report-filters { display: flex; gap: 20px; padding-bottom: 20px; border-bottom: 1px solid #3f3f46; margin-bottom: 20px; }
        .report-filters select { padding: 8px 12px; border-radius: 6px; border: 1px solid #52525b; background-color: #18181b; color: #ffffff; font-size: 14px; width: 150px; outline: none; }
        .report-filters select:focus { border-color: #eab308; }
        .report-filters option { background-color: #18181b; color: #ffffff; padding: 5px; }
        .report-filters label { display: block; font-size: 12px; margin-bottom: 5px; font-weight: bold; opacity: 0.8; }
        .report-header { text-align: center; margin-bottom: 30px; }
        .report-header h2 { font-size: 20px; font-weight: bold; margin-bottom: 8px; }
        .report-header h3 { font-size: 16px; text-transform: uppercase; letter-spacing: 1px; opacity: 0.8; }
        .report-table-wrapper { overflow-x: auto; }
        .report-table { width: 100%; border-collapse: collapse; font-size: 13px; white-space: nowrap; }
        .report-table th, .report-table td { border: 1px solid #3f3f46; padding: 12px; text-align: center; }
        .report-table th { background: rgba(113, 113, 122, 0.15); font-weight: bold; }
        .report-table td.text-left { text-align: left; font-weight: bold; }
        .highlight-col { background: rgba(113, 113, 122, 0.05); font-weight: bold; }
        .grand-total { background: rgba(234, 179, 8, 0.15) !important; color: #eab308; font-weight: bold; font-size: 14px;}
        
        .charts-wrapper { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 40px; }
        .chart-box { flex: 1; min-width: 300px; background-color: #18181b; border: 1px solid #3f3f46; border-radius: 8px; padding: 20px; height: 350px; position: relative; }
    </style>

    <div>
        <!-- Filters -->
        <div class="report-filters">
            <div>
                <label>Month</label>
                <select wire:model.live="selectedMonth">
                    @foreach(['JANUARY','FEBRUARY','MARCH','APRIL','MAY','JUNE','JULY','AUGUST','SEPTEMBER','OCTOBER','NOVEMBER','DECEMBER'] as $m)
                        <option value="{{ $m }}">{{ $m }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Year</label>
                <select wire:model.live="selectedYear">
                    @foreach(['2025', '2026', '2027'] as $y)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Municipality</label>
                <select wire:model.live="selectedMunicipality">
                    @foreach(['Baguio City', 'Atok', 'Bakun', 'Bokod', 'Buguias', 'Itogon', 'Kabayan', 'Kapangan', 'Kibungan', 'La Trinidad', 'Mankayan', 'Sablan', 'Tuba', 'Tublay'] as $mun)
                        <option value="{{ $mun }}">{{ $mun }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Header -->
        <div class="report-header">
            <h2>Month: {{ $selectedMonth }} &nbsp;&nbsp;&nbsp;&nbsp; Year: {{ $selectedYear }}</h2>
            <h3>Municipality: {{ $selectedMunicipality }}</h3>
        </div>

        <!-- Data Table -->
        <div class="overflow-x-auto bg-gray-900 border border-gray-800 rounded-lg">
    <table class="w-full text-left text-sm text-gray-300">
        <thead class="bg-gray-950 border-b border-gray-800">
            <tr>
                <th class="p-4 font-bold text-white">Tourist Attraction</th>
                <th class="p-4 font-bold text-center text-white">This Municipality</th>
                <th class="p-4 font-bold text-center text-white">Other Municipality</th>
                <th class="p-4 font-bold text-center text-white">Other Province</th>
                <th class="p-4 font-bold text-center text-white">Foreign Country</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @forelse($this->records as $record)
                <tr class="hover:bg-gray-800/50 transition-colors">
                    <!-- Column 1: Stacked Name & Code -->
                    <td class="p-4">
                        <div class="font-bold text-white text-base">{{ $record->attraction_name }}</div>
                        <div class="text-xs text-gray-500 mt-1">Code: {{ $record->code }}</div>
                    </td>
                    
                    <!-- Column 2: This Municipality -->
                    <td class="p-4 text-center">
                        <div class="text-lg font-bold text-white">{{ $record->local_male + $record->local_female }}</div>
                        <div class="text-xs text-gray-500 mt-1">M: {{ $record->local_male }} <span class="mx-1">|</span> F: {{ $record->local_female }}</div>
                    </td>

                    <!-- Column 3: Other Municipality -->
                    <td class="p-4 text-center">
                        <div class="text-lg font-bold text-white">{{ $record->other_mun_male + $record->other_mun_female }}</div>
                        <div class="text-xs text-gray-500 mt-1">M: {{ $record->other_mun_male }} <span class="mx-1">|</span> F: {{ $record->other_mun_female }}</div>
                    </td>

                    <!-- Column 4: Other Province -->
                    <td class="p-4 text-center">
                        <div class="text-lg font-bold text-white">{{ $record->other_prov_male + $record->other_prov_female }}</div>
                        <div class="text-xs text-gray-500 mt-1">M: {{ $record->other_prov_male }} <span class="mx-1">|</span> F: {{ $record->other_prov_female }}</div>
                    </td>

                    <!-- Column 5: Foreign Country -->
                    <td class="p-4 text-center">
                        <div class="text-lg font-bold text-white">{{ $record->foreign_male + $record->foreign_female }}</div>
                        <div class="text-xs text-gray-500 mt-1">M: {{ $record->foreign_male }} <span class="mx-1">|</span> F: {{ $record->foreign_female }}</div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-500 italic">
                        No visitor records found for this period and municipality.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
                <!-- Summary Row -->
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-left">Total of this Month</th>
                        
                        <th>{{ $this->records->sum('local_male') }}</th>
                        <th>{{ $this->records->sum('local_female') }}</th>
                        <th class="highlight-col">{{ $this->records->sum('local_male') + $this->records->sum('local_female') }}</th>
                        
                        <th>{{ $this->records->sum('other_mun_male') }}</th>
                        <th>{{ $this->records->sum('other_mun_female') }}</th>
                        <th class="highlight-col">{{ $this->records->sum('other_mun_male') + $this->records->sum('other_mun_female') }}</th>
                        
                        <th>{{ $this->records->sum('other_prov_male') }}</th>
                        <th>{{ $this->records->sum('other_prov_female') }}</th>
                        <th class="highlight-col">{{ $this->records->sum('other_prov_male') + $this->records->sum('other_prov_female') }}</th>
                        
                        <th>{{ $this->records->sum('foreign_male') }}</th>
                        <th>{{ $this->records->sum('foreign_female') }}</th>
                        <th class="highlight-col">{{ $this->records->sum('foreign_male') + $this->records->sum('foreign_female') }}</th>

                        <th>{{ $this->records->sum('unspecified_male') }}</th>
                        <th>{{ $this->records->sum('unspecified_female') }}</th>
                        <th class="highlight-col">{{ $this->records->sum('unspecified_male') + $this->records->sum('unspecified_female') }}</th>
                        
                        <th class="highlight-col">{{ $this->records->sum('local_male') + $this->records->sum('other_mun_male') + $this->records->sum('other_prov_male') + $this->records->sum('foreign_male') + $this->records->sum('unspecified_male') }}</th>
                        <th class="highlight-col">{{ $this->records->sum('local_female') + $this->records->sum('other_mun_female') + $this->records->sum('other_prov_female') + $this->records->sum('foreign_female') + $this->records->sum('unspecified_female') }}</th>
                        <th class="grand-total">
                            {{ 
                                ($this->records->sum('local_male') + $this->records->sum('local_female')) + 
                                ($this->records->sum('other_mun_male') + $this->records->sum('other_mun_female')) + 
                                ($this->records->sum('other_prov_male') + $this->records->sum('other_prov_female')) + 
                                ($this->records->sum('foreign_male') + $this->records->sum('foreign_female')) +
                                ($this->records->sum('unspecified_male') + $this->records->sum('unspecified_female'))
                            }}
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Charts Section -->
        <div wire:ignore class="charts-wrapper">
            <div class="chart-box">
                <canvas id="genderChart"></canvas>
            </div>
            <div class="chart-box">
                <canvas id="residenceChart"></canvas>
            </div>
            <div class="chart-box">
                <canvas id="domesticForeignChart"></canvas>
            </div>
            <div class="chart-box">
                <canvas id="trendChart"></canvas>
            </div>
        </div>

    </div>

    <!-- Livewire/Alpine Script to Render Charts -->
    @script
    <script>
        let myCharts = {};

        const renderCharts = (data) => {
            if(typeof Chart === 'undefined') return;

            Chart.defaults.color = '#a1a1aa'; 

            if(myCharts.trend) myCharts.trend.destroy();
            if(myCharts.res) myCharts.res.destroy();
            if(myCharts.domFor) myCharts.domFor.destroy();
            if(myCharts.gen) myCharts.gen.destroy();

            const commonOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'bottom' } }
            };

            // Gender Pie Chart
            myCharts.gen = new Chart(document.getElementById('genderChart'), {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{ 
                        data: data.gender, 
                        backgroundColor: ['#8b5cf6', '#ec4899'],
                        borderWidth: 0
                    }]
                },
                options: { 
                    ...commonOptions,
                    plugins: { ...commonOptions.plugins, title: { display: true, text: 'Male vs Female Visitors', font: {size: 14} } }
                }
            });

            // Residence Doughnut Chart (Added Unspecified)
            myCharts.res = new Chart(document.getElementById('residenceChart'), {
                type: 'doughnut',
                data: {
                    labels: ['This Mun.', 'Other Mun.', 'Other Prov.', 'Foreign', 'Unspecified'],
                    datasets: [{ 
                        data: data.residence, 
                        backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#6b7280'],
                        borderWidth: 0
                    }]
                },
                options: { 
                    ...commonOptions,
                    plugins: { ...commonOptions.plugins, title: { display: true, text: 'Detailed Residence Breakdown', font: {size: 14} } }
                }
            });

            // Domestic vs Foreign Pie Chart (Added Unspecified)
            myCharts.domFor = new Chart(document.getElementById('domesticForeignChart'), {
                type: 'pie',
                data: {
                    labels: ['Domestic (Local + Prov)', 'Foreign', 'Unspecified'],
                    datasets: [{ 
                        data: data.domesticVsForeign, 
                        backgroundColor: ['#10b981', '#ef4444', '#6b7280'],
                        borderWidth: 0
                    }]
                },
                options: { 
                    ...commonOptions,
                    plugins: { ...commonOptions.plugins, title: { display: true, text: 'Domestic vs Foreign Tourists', font: {size: 14} } }
                }
            });
            
            // Visitors Per Month Bar Chart
            myCharts.trend = new Chart(document.getElementById('trendChart'), {
                type: 'bar',
                data: {
                    labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                    datasets: [{ 
                        label: 'Total Visitors', 
                        data: data.trend, 
                        backgroundColor: '#3b82f6',
                        borderRadius: 4
                    }]
                },
                options: { 
                    ...commonOptions,
                    plugins: { ...commonOptions.plugins, title: { display: true, text: 'Visitors Per Month (Yearly Trend)', font: {size: 14} } }
                }
            });
        };

        $wire.getChartData().then(data => renderCharts(data));

        Livewire.on('update-charts', () => {
            $wire.getChartData().then(data => renderCharts(data));
        });
    </script>
    @endscript
</x-filament-panels::page>