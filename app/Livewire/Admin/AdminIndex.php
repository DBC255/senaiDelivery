<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminIndex extends Component
{
    use WithPagination;

    public $pesquisa = '';
    public $situacao = 'ativos';

    public function administradores(){
        $admins = User::where('tipo', User::TIPO_ADMIN);

        //onlyTrashed retorna somente excluidos, whithTrashed retorna todos.
        if($this->situacao == 'excluidos'){
            $admins->onlyTrashed();
        }elseif($this->situacao == 'todos'){
            $admins->whithTrashed();
        }

        $admins->where('nome', 'like', '%'.$this->pesquisa.'%') ->orWhere('email', 'like', '%'.$this->pesquisa.'%');

        return $admins->latest()->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.admin-index')->layout('layouts.app', ['title'=> 'administradores', 'admin' => true]);
    }
}
