<?php

namespace App\Http\Livewire\Components\Statistics;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Services\Loan\LoanService;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Services\Transaction\TransactionService;

class ComponentStatisticIndex extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $code;

    protected $rules = [
        'code' => 'required',
    ];

    public function render(TransactionService $transaction_service)
    {
        $transactions = $transaction_service->dataTable(
            new Request([
                'entries' => 12,
                'sort_type' => 'DESC',
            ]),
        );
        return view('livewire.components.statistics.component-statistic-index', compact('transactions'));
    }

    public function store(TransactionService $transaction_service, LoanService $loan_service)
    {
        $this->validate();
        $loan = $loan_service->getLoanByCode($this->code);
        $data = [
            'code' => $this->code,
            'user_id' => $loan->user_id,
            'loan_id' => $loan->id,
            'loan_date' => $loan->loan_date,
            'admin_id' => Auth::user()->id,
        ];
        $transaction_service->create($data);
        if ($loan) {
            $this->flash('success', 'Data added successfully', [], route('admin.statistic.index'));
        } else {
            $this->alert('error', 'There is no book with the code');
        }
    }

    public function openModal()
    {
        $this->dispatchBrowserEvent('openModal');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }
}
