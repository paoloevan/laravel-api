<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $val_data = Validator::make($data, [
            'name' => 'required|',
            'email' => 'required|email',
            'message' => 'required|'
        ]);

        if ($val_data->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $val_data->errors()
            ]);
        }

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('ciao@example.it')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}
