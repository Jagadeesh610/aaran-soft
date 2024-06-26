<?php

namespace App\Livewire\Sundar\Trading;

use Aaran\Sundar\Models\Share\ShareTrades;
use App\Livewire\Trait\CommonTrait;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Investing extends Component
{
    use CommonTrait;

    #region[property]
    public $vdate;
    public mixed $invested;
    public mixed $drawings;
    public string $remarks;

    public mixed $user_id = '';
    public mixed $search_user_id = '';
    public mixed $users;

    #endregion

    public function mount()
    {
        $this->users = User::all();
    }


    #region[save]
    public function getSave(): string
    {
        if ($this->vid == "") {
            ShareTrades::create([
                'user_id' => $this->user_id ?: auth()->id(),
                'vdate' => $this->vdate ?: Carbon::now()->format('Y-m-d'),
                'invested' => $this->invested ?: 0,
                'drawings' => $this->drawings ?: 0,
                'deposit' => 0,
                'withdraw' => 0,
                'share_profit' => 0,
                'share_loosed' => 0,
                'option_profit' => 0,
                'option_loosed' => 0,
                'remarks' => $this->remarks ?: '',
                'active_id' => $this->active_id,

            ]);
            $message = "Saved";

        } else {
            $obj = ShareTrades::find($this->vid);
            $obj->user_id = $this->user_id;
            $obj->vdate = $this->vdate;
            $obj->invested = $this->invested ?: 0;
            $obj->drawings = $this->drawings ?: 0;
            $obj->remarks = $this->remarks;
            $obj->active_id = $this->active_id;

            $obj->save();
            $message = "Updated";
        }
        $this->dispatch('notify', ...['type' => 'success', 'content' => $message . ' Successfully']);

        return '';
    }
    #endregion

    #region[getObj]
    public function getObj($id)
    {
        if ($id) {
            $obj = ShareTrades::find($id);
            $this->vid = $obj->id;
            $this->user_id = $obj->user_id;
            $this->vdate = $obj->vdate;
            $this->invested = $obj->invested;
            $this->drawings = $obj->drawings;
            $this->remarks = $obj->remarks;
            $this->active_id = $obj->active_id;
            return $obj;
        }
        return null;
    }
    #endregion

    #region[getList]
    public function getList()
    {
        $this->sortField = 'vdate';

        if ($this->search_user_id == '') {
            $this->search_user_id = auth()->id();
        }

        return ShareTrades::search($this->searches)
            ->where('active_id', '=', $this->activeRecord)
            ->where('invested', '>', 0)
            ->where('user_id', '=', $this->search_user_id)
            ->orWhere('drawings', '>', 0)
            ->where('user_id', '=', $this->search_user_id)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);
    }
    #endregion

    #region[clearFields]
    public function clearFields(): void
    {
        $this->vid = '';
        $this->user_id = '';
        $this->vdate = Carbon::now()->format('Y-m-d');
        $this->invested = '';
        $this->drawings = '';
        $this->remarks = '';
        $this->active_id = '1';
    }
    #endregion

    #region[getRoute]
    public function getRoute()
    {
        $this->redirect(route('shareTrades'));
    }
    #endregion

    #region[reRender]
    public function reRender(): void
    {
        $this->render()->render();
    }
    #endregion

    #region[render]
    public function render()
    {
        return view('livewire.sundar.trading.investing')->with([
            'list' => $this->getList()
        ]);
    }
    #endregion
}
