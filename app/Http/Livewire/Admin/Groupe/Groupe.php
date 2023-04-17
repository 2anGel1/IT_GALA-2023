<?php

namespace App\Http\Livewire\Admin\Groupe;

use Livewire\Component;

class Groupe extends Component
{
    public $inputs = [];
    public $i = 1;
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
      
    public function render()
    {
        return view('livewire.admin.groupe.groupe');
    }
}
