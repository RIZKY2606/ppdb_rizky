<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
  
    public $active;

    public function __construct($active)
    {
        //
        
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $list = $this->list();
        return view('components.menu', ['list' => $list, 
                                        'active' => $this->active]);
    }
    public function list(){
        return[
            [
                'label' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'fa-solid fa-home'
            ],
            [
                'label' => 'Users',
                'route' => 'dashboard.user',
                'icon' => 'fas fa-users'

            ],
            [
                'label' => 'Students',
                'route' => 'dashboard.students',
                'icon' => 'fas fa-user-graduate'
            ],
            [
                'label' => 'Jurusan',
                'route' => 'dashboard.jurusan',
                'icon' => 'fas fa-book'
            ],
            [
                'label' => 'Admin',
                'route' => 'dashboard.admin',
                'icon' => 'fas fa-key'
            ]
         ];
    }
    public function isActive($label){
        return $label === $this->active;
    }
}