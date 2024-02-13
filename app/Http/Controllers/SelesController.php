<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Tables\CustomerTable;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\FileUploads\ExistingFile;

class SelesController extends Controller
{
    public function customer(Customer $customer) {
        return view('seles.datacustomer',[
            'datas' => CustomerTable::class
        ]);
    }

    public function customercreate(Paket $paket) {
        $pakets = $paket->get();
        return view('seles.datacustomercreate',[
            'pakets' => $pakets
        ]);
    }

    public function customerstore(Request $request) {
        
        $ktp      = $request->file('ktp');
        $ktpname  = $ktp->hashName();
        // dd($ktp, $ktpname);
        $home     = $request->file('home');
        $homename = $home->hashName();

        Storage::put("public/ktps", $ktp);
        Storage::put("public/homes", $home);

        Customer::create([
            'user_id'   => Auth::id(),
            'name'      => $request->name,
            'telephone' => $request->telephone,
            'address'   => $request->address,
            'paket_id'  => $request->paket_id,
            'ktp'       => "storage/ktps/$ktpname",
            'home'      => "storage/homes/$homename"
        ]);

        Toast::title('Data Customer have been stored')->autoDismiss(3);

        return to_Route('datacustomer');
    }

    public function customeredit(Paket $paket, Customer $customers) {
        $ktp = ExistingFile::fromDisk('public')->get($customers->ktps);
        // dd($ktp);
        $pakets = $paket->get();
        return view('seles.datacustomeredit',[
            'ktp'       => $ktp,
            'customers' => $customers,
            'pakets'    => $pakets
        ]);
    }

    public function customerdestroy(Customer $customers){
        $customers->delete();

        Toast::title('Data Customer Have been deleted')->danger()->autoDismiss(3);

        return redirect()->back();
    }
}
