<?php

namespace App\Traits;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;

trait LogDescription
{
    public function Log($message)
    {

        Log::create([
            'description' => $message,
            'user_id' => Auth::id(),
        ]);
    }
    
}
