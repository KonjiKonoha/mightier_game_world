<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Transaction;
use App\Models\User;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
