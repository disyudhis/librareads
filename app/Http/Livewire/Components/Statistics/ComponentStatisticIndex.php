<?php

namespace App\Http\Livewire\Components\Statistics;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Services\Transaction\TransactionService;
use Livewire\WithPagination;

class ComponentStatisticIndex extends Component
{
    use WithPagination;
    public function render()
    {

        return view('livewire.components.statistics.component-statistic-index');
    }

}
