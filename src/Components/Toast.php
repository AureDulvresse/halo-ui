<?php

declare(strict_types=1);

namespace Halo\UI\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Session;

class Toast extends Component
{
    public array $toasts = [];

    public function __construct()
    {
        // Pull toast messages from session flash data
        $this->toasts = Session::get('flux_toasts', []);

        // Optionally, listen for a custom Laravel event `ToastEvent`
        // This requires broadcasting or event firing elsewhere in the app
        // Example usage: event(new \App\Events\ToastEvent('Message', 'success'));
        // The component will receive these messages via session or event listener in your JS
    }

    public function render()
    {
        return view('components.flux.toast');
    }
}
