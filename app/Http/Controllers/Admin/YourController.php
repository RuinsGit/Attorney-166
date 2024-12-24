<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;

class YourController
{
    public function yourMethod() {
        try {
            // İşlemler
        } catch (\Exception $e) {
            Session::flash('error', 'Xəta: ' . $e->getMessage());
            return redirect()->back();
        }
    }
} 