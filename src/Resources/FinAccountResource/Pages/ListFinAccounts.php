<?php

namespace Joinbiz\BizApp\Resources\FinAccountResource\Pages;

use App\Infolists\Components\StateWidgetCustom;
use Filament\Actions;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Carbon;
use Joinbiz\BizApp\Resources\FinAccountResource;
use Joinbiz\BizApp\Resources\FinAccountResource\Widgets\FinAccountOverview;

class ListFinAccounts extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = FinAccountResource::class;

    protected static string $view = 'components.grid.list-records';

    public $currentMonth;

    public $finResume = [];

    public function mount(): void
    {
        parent::mount();
        $this->currentMonth = now();
    }

    public function nextMonth()
    {
        $this->currentMonth = Carbon::parse($this->currentMonth)->addMonth();

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
            ])->from('md'),

        ])->state($this->finResume);
    }

    public function previousMonth()
    {
        $this->currentMonth = Carbon::parse($this->currentMonth)->subMonth();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            FinAccountOverview::class,
            FinAccountOverview::class,
        ];
    }

    public function getTabs(): array
    {
        if ($this->currentMonth === null) {
            $this->currentMonth = now();
        }

        return [
            'current_month' => Tab::make()
                ->label(fn () => strtoupper($this->currentMonth->translatedFormat('F/Y')))
                ->query(fn ($query) => $query->whereMonth('created_stamp', $this->currentMonth->month)
                    ->whereYear('created_stamp', $this->currentMonth->year)),

            null => Tab::make('TODAS')->query(fn ($query) => $query->whereMonth('created_stamp', $this->currentMonth->month)
                ->whereYear('created_stamp', $this->currentMonth->year)),
            'BANCOS' => Tab::make()->query(fn ($query) => $query->whereMonth('created_stamp', $this->currentMonth->month)
                ->whereYear('created_stamp', $this->currentMonth->year)->where('fin_account_type_id', 'BANK_ACCOUNT')),
            'CARTÃO' => Tab::make()->query(fn ($query) => $query->whereMonth('created_stamp', $this->currentMonth->month)
                ->whereYear('created_stamp', $this->currentMonth->year)->where('fin_account_type_id', 'CREDIT_CARD_ACCOUNT')),
        ];
    }
}
