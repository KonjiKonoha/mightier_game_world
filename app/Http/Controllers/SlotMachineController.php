<?php

namespace App\Http\Controllers;

use App\Models\GameControl;
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
        $game = GameControl::find(1);

        return view('slot.slot', ['control' => $game]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function classic()
    {
        $game = GameControl::find(2);

        return view('slot.classic', ['control' => $game]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user = decrypt($request->encrypt);
        $transaction = new Transaction();
        $user = User::find($current_user);

        $result = $request->score - $user->credit;

        $transaction->user_id = $current_user;
        $transaction->action_by = 'Slot game 1 played';
        $transaction->amount = $result;

        if ($result > 0) {
            $transaction->reason = 'Win Slot game 1';
            $user->credit = $request->score;
        } else {
            $transaction->reason = 'Sorry! You are not unlucky in Slot game 1 today.';
        }

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
