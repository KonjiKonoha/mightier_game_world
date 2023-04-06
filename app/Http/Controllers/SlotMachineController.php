<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlotMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('slot.slot');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user = decrypt( $request->encrypt );
        $transaction = new Transaction();
        $user = User::find($current_user);

        $result = $request->score - $user->credit;

        $transaction->user_id = $current_user;
        $transaction->action_by = 'Slot game 1 played';

        if ($result > 0) {
            $transaction->reason = 'Win Slot game 1';
        } else {
            $transaction->reason = 'Sorry! You are not unlucky in Slot game 1 today.';
        }

        $transaction->amount = $result;
        $user->credit = $request->score;

        $transaction->save();
        $user->save();

        return response()->json([
            'status' => 'success',
            'data' => [
                'score' => $request->score,
            ]
        ]);
    }
}
