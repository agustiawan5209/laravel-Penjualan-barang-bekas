<?php

namespace App\Http\Livewire;

use App\Models\Voucher;
use Livewire\Component;
use App\Models\UserVoucher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BannerVoucher extends Component
{
    public function render()
    {
        $carbon_hours = Carbon::now()->toTimeString();
        $carbon_date = Carbon::now();
        $this->deleteVoucher();
        $voucher = UserVoucher::where('user_id', Auth::user()->id)->get();
        return view('livewire.banner-voucher', [
            'uservoucher'=> $voucher,
            'carbon_hours'=> $carbon_hours,
            'carbon_date'=> $carbon_date,
        ]);
    }
    public function KlaimVoucher($id)
    {
        UserVoucher::where('id', $id)->update(['status'=> '3']);
        return redirect()->route('home')->with('message', 'Selamat Menikmati Voucher');
    }

    /**
     * deleteVoucher
     *  Jika TGL DAN WAKTU Sama Dengan Skrg;
     * @return void
     */
    public function deleteVoucher(){
        $carbon_hours = Carbon::now()->toTimeString();
        $carbon_date = Carbon::now()->format('Y-m-d');
        $voucher = UserVoucher::all();
        foreach($voucher as $user_voucher){
            if($carbon_date == $user_voucher->tgl_kadaluarsa && $carbon_hours == $user_voucher->waktu){
                UserVoucher::where('id', $user_voucher->id)->update(['status','=', '4']);
            }
        }
    }
}
