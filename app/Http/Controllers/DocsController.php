<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class DocsController extends Controller
{
    /**
     * Makes a selected timetable public.
     */
    public function docs(): RedirectResponse
    {
        return redirect()->to('https://opentransportmanager.github.io/otm-docs/');
    }
}
