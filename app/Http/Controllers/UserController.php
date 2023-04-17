<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\GameControl;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::simplePaginate(15);

        return view('users.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gameControl($id)
    {
        $game = GameControl::find($id);

        return view('game-control', ['game' => $game]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeControl(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'win_rate' => ['required', 'numeric', 'between:0.1,99.99'],
            'game_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('games.control', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $game = GameControl::find($id);

        $game->win_rate = $request->win_rate;

        $game->save();

        return Redirect::route('games.control', $id)->with('status', 'profile-updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();

        return view('users.credit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addCredit(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'amount' => ['numeric', 'required'],
            'action_by' => ['required'],
            'reason' => ['required', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('users.credit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $transaction = new Transaction();
        $user = User::find($id);

        $transaction->user_id = $id;
        $transaction->action_by = $request->action_by;
        $transaction->reason = $request->reason;

        if ($request->action_by == 'deposit') {
            $transaction->amount = $request->amount;
            $user->credit = $request->amount + $user->credit;
        } else {
            $transaction->amount = ($request->amount * -1);
            $user->credit = $user->credit - $request->amount;
        }

        $transaction->save();
        $user->save();

        return Redirect::route('users.credit', $id)->with('status', 'profile-updated');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['string', 'max:255'],
            'phone' => ['max:15', Rule::unique(User::class)->ignore($id)],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($id)],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('users.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->type = $request->type;

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('users.edit', $id)->with('status', 'profile-updated');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $firstDate = Str::replace('[*]', '1', Carbon::now()->format('Y-m-[*] 0:00:00'));
        $today = Carbon::now()->format('Y-m-d H:i:s');

        $deposits = Transaction::where('action_by', '=', 'deposit')
            ->whereBetween('created_at', [$firstDate, $today])
            ->get();
        $totalDeposit = 0.0;

        foreach ($deposits as $row) {
            $totalDeposit += $row->amount;
        }

        $withdrawals = Transaction::where('action_by', '=', 'withdrawal')
            ->whereBetween('created_at', [$firstDate, $today])
            ->get();
        $totalWithdraw = 0.0;

        foreach ($withdrawals as $row) {
            $totalWithdraw += ($row->amount * -1);
        }

        $credits = User::get();
        $totalCredit = 0.0;

        foreach ($credits as $row) {
            $totalCredit += $row->credit;
        }

        $pnl = $totalDeposit - $totalWithdraw - $totalCredit;

        return view('financial-report', [
            'total_deposit' => $totalDeposit,
            'total_withdrawal' => $totalWithdraw,
            'total_credit' => $totalCredit,
            'pnl' => $pnl
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales()
    {
        $firstDate = Str::replace('[*]', '1', Carbon::now()->format('Y-m-[*] 0:00:00'));
        $today = Carbon::now()->format('Y-m-d H:i:s');

        $data = [];

        for ($i = 0; $i < date('j', strtotime($today)); $i++) {
            $sd = Str::replace('[*]', $i + 1, Carbon::now()->format('Y-m-[*] 00:00:00'));
            $ed = Str::replace('[*]', $i + 1, Carbon::now()->format('Y-m-[*] 23:59:59'));

            $deposits = Transaction::where('action_by', '=', 'deposit')
                ->whereBetween('created_at', [$sd, $ed])
                ->get();

            $totalDeposit = 0.0;

            foreach ($deposits as $row) {
                $totalDeposit += $row->amount;
            }

            $withdrawals = Transaction::where('action_by', '=', 'withdrawal')
                ->whereBetween('created_at', [$sd, $ed])
                ->get();

            $totalWithdraw = 0.0;

            foreach ($withdrawals as $row) {
                $totalWithdraw += ($row->amount * -1);
            }

            $data[$i] = [
                'date' => date('F j, Y', strtotime($sd)),
                'deposit' => $totalDeposit,
                'withdrawal' => $totalWithdraw,
            ];
        }

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }
}
