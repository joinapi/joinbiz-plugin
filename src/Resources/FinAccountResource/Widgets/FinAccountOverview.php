<?php

namespace Joinbiz\BizApp\Resources\FinAccountResource\Widgets;

use Joinbiz\BizApp\Resources\FinAccountResource\Pages\ListFinAccounts;
use App\Infolists\Components\StateWidgetCustom;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class FinAccountOverview extends ChartWidget

{
    protected static ?string $heading = 'Movimentação Mensal';

    // Se quiser atualizar o gráfico automaticamente
    protected static ?string $pollingInterval = '10s';

    public ?string $filter = 'today';

    protected function getData(): array
    {
        $data = $this->getFinancialData();

        return [
            'datasets' => [
                [
                    'label' => 'Receitas',
                    'data' => $data['receitas'],
                    'borderColor' => '#10B981',
                    'fill' => false
                ],
                [
                    'label' => 'Despesas',
                    'data' => $data['despesas'],
                    'borderColor' => '#EF4444',
                    'fill' => false
                ]
            ],
            'labels' => $data['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
    public function infolist($infolist): Infolist
    {
        return $infolist->schema([

            Split::make([
                Section::make([
                    StateWidgetCustom::make('title')
                        ->alignCenter()
                        ->value('R$ 12.345,00')
                        ->label('RESULTADO PARA O MES')->columnSpanFull(),
                    TextEntry::make('rece')
                        ->label('RECEBIMENTOS')
                        ->color('success')
                        ->default(1212)
                        ->money(),
                    TextEntry::make('des')
                        ->label('DESPESAS')
                        ->color('danger')
                        ->default(1212)
                        ->money(),
                ])->columns(2)->columnSpanFull(),

                Section::make([
                    StateWidgetCustom::make('title')
                        ->alignCenter()
                        ->value('R$ 32.345,00')
                        ->label('CONTAS')->columnSpanFull(),
                    TextEntry::make('created_at')
                        ->label('Previsao de fechamento do mês')
                        ->default(12890)
                        ->money(),
                ]),
            ])->from('md')

        ])->state($this->finResume);
    }
    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'callback' => "function(value) {
                            return 'R$ ' + new Intl.NumberFormat('pt-BR').format(value);
                        }"
                    ],
                ],
            ],
        ];
    }

    protected function getFinancialData(): array
    {
        // Implemente aqui a lógica para buscar os dados reais do seu banco de dados
        // Este é apenas um exemplo
        return [
            'receitas' => [10,10],
            'despesas' => [23,23],
            'labels' => ['JAN', 'FEV'],
        ];
    }

}
