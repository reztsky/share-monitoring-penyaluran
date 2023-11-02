<?php

namespace App\View\Components\bantuanModal\dashboard;

use Illuminate\View\Component;

class DetailAreNull extends Component
{
    
    public $fileName,$folder;
    public function __construct($fileName,$folder)
    {   
        $this->fileName=$fileName;
        $this->folder=$folder;
    }

    public function render()
    {
        return view('components.bantuan-modal.dashboard.detail-are-null');
    }
}
