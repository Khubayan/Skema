<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ExController extends Controller //class
{
    public function index()
    { //method
        // Get the ID of the authenticated user

        $userId = Auth::id();
        // dd($userId);
        // Retrieve Ex records based on the user ID
        $exNames = Ex::where('user_id', $userId)->get();
        return view('ex.index', compact('exNames', 'userId'));
    }



    public function create(Request $request)
    {
        return view('ex.create');
    }

    public function store(Request $request)
    {
        //    store inputed data from create page using Ex's model
        Ex::create([
            'user_id' => Auth::id(), // Get the ID of the authenticated user
            'name' => $request->name,
            'reason_to_separate' => $request->reason,
            'date_of_separation' => $request->date_broke_up,
            'date_of_start_dating' => $request->date_started_relationship,
            'phone_number' => $request->phone_number
        ]);


        return redirect('/ex');
    }



    public function update(Request $request, $id)
    {
        // update data based on id recieved from url
        $exName = Ex::findorfail($id);
        $exName->update($request->all());
        // dd($request->all());
        return redirect('/ex');
    }

    public function destroy($id)
    {
        // delete data based on id recieved from url
        $exName = Ex::findorfail($id);

        $exName->delete();
        return redirect('/ex');
    }

    public function edit($id)
    {
        $exName = Ex::findorfail($id);

        // abort_unless(isset($exNames[$id]), 404);
        // $exName = $exNames[$id];
        return view('ex.edit', compact('exName'));
    }

    // protected function procEx() {


    // }

    public function notify(Request $request)
    {
        $exName = Ex::findorfail($request->ex_id);
        // dd($request->ex_id);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $exName->phone_number,
                'message' => 'Hi ' . $exName->name . ', apa kabar?',
                'schedule' => 0,
                'typing' => false,
                'delay' => '2',
                'countryCode' => '62',
                'followup' => 0,
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: b_xRPaJ!bj7uqG_FZ6NZ'
            ),
        ));

        $response = curl_exec($curl);
        $responseArr = json_decode($response, true);

        if ($responseArr['status'] == true) {
            return Redirect::back()->with('success', 'Success to Notifying ' . $exName->name . '!');
        } else {
            return  Redirect::back()->with('fail', 'Fail to Notifying ' . $exName->name . '!');
        }
    }
}
