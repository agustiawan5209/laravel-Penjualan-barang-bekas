<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use App\Models\Team;
use App\Models\User;
use App\Models\Voucher;
use App\Models\UserVoucher;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'=> ['required', 'max:20'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'role_id' => 'Customer',
                'phone_number'=> $input['phone_number'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
                $this->KlaimVoucher($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
    public function KlaimVoucher(User $user){

        $voucher = Voucher::where('jenis_voucher', '1')->first();
        $carbon_hours = Carbon::now()->add(10, 'hours')->toTimeString();
        $carbon_date = Carbon::now()->format('Y-m-d');
        // dd($voucher->);
       if($voucher != null){
        // foreach($voucher as $voucher){
            UserVoucher::create([
                'user_id'=>$user->id,
                'voucher_id'=>$voucher->id,
                'status'=>  '1',
                'tgl_kadaluarsa'=> $carbon_date,
                'waktu'=> $carbon_hours,
            ]);
        // }

        event(new Registered($user));
       }

    }
}
