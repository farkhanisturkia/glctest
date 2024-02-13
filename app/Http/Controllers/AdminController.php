<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Customer;
use App\Tables\PaketTable;
use App\Tables\SelesTable;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Tables\SelesCustomerTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;

class AdminController extends Controller
{
    public function seles(User $seles) {
        $datas = $seles->where('role', 'seles')->get();

        return view('admin.dataseles',[
            'datas' => SelesTable::class,
        ]);
    }

    public function selesstore(Request $request){
        // dd($request->all());
        User::create([
            'nip'          => $request->nip,
            'password'     => Hash::make($request->password),
        ]);

        Toast::title('Data Seles have been stored')->autoDismiss(3);

        return to_route('dataseles');
    }

    public function selesshow(User $seles) {
        $customer = Customer::with('user')->where('user_id', $seles->id)->get();
        // dd($customer);
        return view('admin.datacustomer',[
            'datas' => SpladeTable::for($customer)
                ->column('name')
                ->column('telephone')
                ->column('address')
                ->column('paket.name', label:"Package")
                ->column(label:'identity')
                ->column(label:'home')
                // ->paginate(5)
        ]);
    }

    public function selesdownload(User $seles) {
        $customers = DB::table('customers as c')
                    ->select('c.name as customer','c.telephone','c.address','p.name as package')
                    ->leftjoin('pakets as p','c.paket_id','p.id')
                    ->where('c.user_id', $seles->id)->get();

        // dd($customers);
        $pdf = Pdf::loadView('admin.download', [
            'datas' => $customers
        ]);
        
        return $pdf->download('customer.pdf');
    }

    public function selesdestroy(user $seles){
        $seles->delete();

        Toast::title('Data Seles Have been deleted')->danger()->autoDismiss(3);

        return redirect()->back();
    }

    public function paket(Paket $paket) {
        $datas = $paket->get();

        return view('admin.datapaket',[
            'datas' => PaketTable::class,
        ]);
    }

    public function paketstore(Request $request){
        // dd($request->all());
        Paket::create([
            'name'      => $request->name,
            'price'     => $request->price,
        ]);

        Toast::title('Data Package have been stored')->autoDismiss(3);

        return to_route('datapaket');
    }
}
