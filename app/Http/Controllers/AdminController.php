<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Investment;
use App\Models\Currency;
use App\Models\UnderLaying;
use App\Models\Payment;
use App\Models\notification;
use App\Models\Director;
use App\Models\Owner;
use App\Models\Ubo;
use App\Models\Beneficiaries;

use Illuminate\Http\Request;
use App\Mail\ConfirmInvest;
use App\Mail\OrderFilled;
use App\Mail\PaymentMail;
use App\Mail\PaymentUpdate;
use Illuminate\Support\Facades\Mail;
class AdminController extends Controller
{

    public function dashboard(){
        $counttotalorders = Order::where('status', 1)
        ->where('filled', 'No')
        ->count();


        $countfilledorders = Order::where('filled', 'YES')
        ->count();

        $sumfilledorders = Order::where('status', 1)
        ->sum('quantity');

        $data =Order::leftjoin('users','orders.userid','=','users.id')->where('orders.status', 1)
        ->select('users.fname','orders.*')
        ->orderBy('id', 'desc')->paginate(5);
        return view('Admin.dashboard',['orders' => $data ,'totalorders'=> $counttotalorders, 'filledorders'=>$countfilledorders , 'sumfilledorders'=> $sumfilledorders]);
    }
    public function notifications(){
        $data = notification::leftjoin('users','notifications.userid','=','users.id')
        ->select('users.fname','notifications.*')
        ->orderBy('id', 'desc')->get();
        return view('Admin.notifications', ['notifications' => $data]);
    }


    public function currency(){
        $data = Currency::orderBy('currency', 'asc')->get();
        return view('Admin.currency', ['currencies' => $data]);
    }
    public function addCurrency(){
        return view('Admin.addCurrency');
    }
    public function saveCurrency(Request $request){
        $currency = $request->all();
        Currency:: create($currency);

        $userid = auth()->user()->id;
        $msg = "Added a new Currency";
        notification::create([
        'message' => $msg,
        'userid' => $userid,
        ]);
        return redirect()->route('admin.currency')->with ('success','Currency Added Successfully');
    }
    public function deleteCurrency($id){
        $data =Currency::find($id);
        $data->delete();
        return redirect()->route('admin.currency')->with ('Delete','Currency Deleted Successfully');
    }
    public function editCurrency($id){
        $data['currency'] =Currency::find($id);
        return view('Admin.editCurrency',$data);
    }
    public function updateCurrency(Request $request){
        $currency = Currency::find($request->id);
        if ($currency) {
            $currency->update($request->all());
        }

        $userid = auth()->user()->id;
        $msg = "Updated a Currency";
        notification::create([
        'message' => $msg,
        'userid' => $userid,
        ]);
        return redirect()->route('admin.currency')->with ('update','Currency Updated Successfully');
    }


    public function underlaying(){
        $data = UnderLaying::orderBy('id', 'desc')->get();
        return view('Admin.underlaying', ['UnderLayings' => $data]);
    }
    public function addCommodity(){
        return view('Admin.addCommodity');
    }
    public function saveCommodity(Request $request){
        $underlaying = $request->all();
        UnderLaying:: create($underlaying);

        $userid = auth()->user()->id;
        $msg = "Added a new Commodity";
        notification::create([
        'message' => $msg,
        'userid' => $userid,
        ]);
        return redirect()->route('admin.underlaying')->with ('success','Commodity Added Successfully');
    }
    public function deleteCommodity($id){
        $data =UnderLaying::find($id);
        $data->delete();
        return redirect()->route('admin.underlaying')->with ('Delete','Commodity Deleted Successfully');
    }
    public function editCommodity($id){
        $data['Commodity'] =UnderLaying::find($id);
        return view('Admin.editCommodity',$data);
    }
    public function updateCommodity(Request $request){
        $Commodity = UnderLaying::find($request->id);
        if ($Commodity) {
            $Commodity->update($request->all());
        }
        $userid = auth()->user()->id;
        $msg = "Updated a Commodity";
        notification::create([
        'message' => $msg,
        'userid' => $userid,
        ]);
        return redirect()->route('admin.underlaying')->with ('update','Commodity Updated Successfully');
    }


    public function orders(){
        $data =Order::leftjoin('users','orders.userid','=','users.id')->where('orders.status', 1)
        ->select('users.fname','orders.*')
        ->orderBy('id', 'desc')->get();
        return view('Admin.orders', ['orders' => $data]);
    }
    public function editorders($id){
        $data['orders'] =Order::find($id);
        return view('Admin.editorders',$data);
    }
    public function updateorder(Request $request){
        $request->validate([
        'filled' => 'required',
        ]);
        $order = Order::find($request->id);

        if ($order) {
            $order->update(['filled' => $request->filled]);
        }
        return redirect()->route('admin.orders')->with ('update','Order Updated Successfully');
    }
    public function orderdeatil($id){
        $data['orderData'] =Order::find($id);
        return view('Admin.orderdetail',$data);
    }
    public function orderemail(Request $request){
        $order = Order::find($request->id);
        $data = Order::leftJoin('users', 'orders.userid', '=', 'users.id')
        ->select('users.fname', 'users.email', 'orders.*')
        ->where('orders.id', $order->id)
        ->first();
        if ($data) {
            $username = $data->fname;
            $email = $data->email;
            $filled = $data->filled;
            $requestMail = $order;
            $requestMail['username'] = $username;
            $requestMail['filled'] = $filled;
            $to_email = $email;
            $mail = new OrderFilled($requestMail);
            Mail::to($to_email)
                ->send($mail);
        }
        return redirect()->route('admin.orders')->with('update', 'Email Sent Successfully');
    }



    public function investment(){
        $data =Investment::leftjoin('users','investments.userid','=','users.id')
        ->select('users.fname','investments.*')
        ->orderBy('id', 'desc')->get();
        return view('Admin.investment', ['investments' => $data]);
    }
    public function editinvestment($id){
        $data['investment'] =Investment::find($id);
        return view('Admin.editinvestment',$data);
    }
    public function updateinvestment(Request $request){
        $request->validate([
            'status' => 'required',
        ]);
            $order = Investment::find($request->id);

        if ($order) {
            $order->update(['status' => $request->status]);
        }

        // $data = Investment::leftJoin('users', 'investments.userid', '=', 'users.id')
        //     ->select('users.fname', 'users.email', 'investments.*')
        //     ->where('investments.id', $order->id)
        //     ->first();

        // if ($data) {
        //     $username = $data->fname;
        //     $email = $data->email;
        //     $requestMail = $request->all();
        //     $requestMail['username'] = $username;
        //     $to_email = $email;
        //     $mail = new ConfirmInvest($requestMail);
        //     Mail::to($to_email)
        //         ->send($mail);
        // }

        return redirect()->route('admin.investment')->with('update', 'Investment Updated Successfully');
    }
    public function investmentemail(Request $request){
        $order = Investment::find($request->id);
        $data = Investment::leftJoin('users', 'investments.userid', '=', 'users.id')
            ->select('users.fname', 'users.email', 'investments.*')
            ->where('investments.id', $order->id)
            ->first();

        if ($data) {
            $username = $data->fname;
            $email = $data->email;
            $status = $data->status;
            $requestMail = $request->all();
            $requestMail['username'] = $username;
            $requestMail['status'] = $status;
            $to_email = $email;
            $mail = new ConfirmInvest($requestMail);
            Mail::to($to_email)
                ->send($mail);

        }

        return redirect()->route('admin.investment')->with('update', 'Email Sent Successfully');
    }


    public function clients(){
        $data = User::where('role', 1)->where('status', '!=', 0)->orderBy('id', 'desc')->get();
        return view('Admin.clients', ['users' => $data]);
    }
    public function Deleteuser($id){
        $data =User::find($id);
        $data->delete();
        return redirect()->route('admin.clients');
    }
    public function approveUser($id){
        $user = User::find($id);
        if ($user) {
            $user->status = 2;
            $user->save();
        }
        return redirect()->back()->with('success', 'User approved successfully.');
    }
    public function rejectUser($id){
        $user = User::find($id);
        if ($user) {
            $user->status = 3;
            $user->save();
        }
        return redirect()->back()->with('reject', 'User rejected successfully.');
    }
    public function viewuser($id){
        $data['user'] =User::find($id);
        $data['directors'] =Director::where('userid',$id)->get();
        $data['owners'] =Owner::where('userid',$id)->get();
        $data['ubos'] =Ubo::where('userid',$id)->get();
        return view('Admin.viewuser',$data);
    }

    public function payments(){
        $data = Payment::leftjoin('users','payments.customer','=','users.id')
        ->leftjoin('beneficiaries','payments.Beneficiary','=','beneficiaries.id')
        ->select('payments.*','users.fname','beneficiaries.accountname','beneficiaries.accountnumber')->orderBy('id', 'desc')->get();
        return view('Admin.payments', ['payments' => $data]);
    }
    public function addpayment(){
        $users = User::where('status',2)->orderBy('id', 'desc')->get();
        return view('Admin.addpayment',['users'=>$users]);
    }
    public function getBeneficiary($id){
        $Beneficiaries = Beneficiaries::where('userid',$id)->get();
        return response()->json($Beneficiaries,200);
    }
    public function savepayment(Request $request){
        $userid=auth()->user()->id;
        $request['userid'] = $userid;
        $payments = $request->all();
        Payment:: create($payments);

        $username=auth()->user()->fname;
        $requestMail = $request->all();
        $requestMail['username'] = $username;
        $to_email = "Sullivan.joubert@ireticapital.com";
        $to_email1 = "Gabriel.olugbenga@ireticapital.com";
        $mail = new PaymentMail($requestMail);
        Mail::to($to_email)
            ->cc($to_email1)
            ->send($mail);

        return redirect()->route('admin.payments')->with ('success','Payment Added Successfully');
    }
    public function deletePayment($id){
        $data =Payment::find($id);
        $data->delete();
        return redirect()->route('admin.payments')->with ('Delete','Payment Deleted Successfully');
    }
    public function editpayment($id){
        $data['payment'] =Payment::find($id);
        return view('Admin.editpayment',$data);
    }
    public function updatepayment(Request $request){
        $payment = Payment::find($request->id);
        if ($payment) {
            $payment->update($request->all());
        }
        return redirect()->route('admin.payments')->with ('update','Payment Updated Successfully');
    }
    public function paymentemail(Request $request){
        $payment = Payment::find($request->id);
        $data = Payment::leftJoin('users', 'payments.userid', '=', 'users.id')
        ->select('users.fname', 'users.email', 'payments.*')
        ->where('payments.id', $payment->id)
        ->first();

        if ($data) {

            $username=auth()->user()->fname;
            $status = $data->status;
            $requestMail = $request->all();
            $requestMail['username'] = $username;
            $requestMail['status'] = $status;
            $to_email = "mehakamir187@gmail.com";
            $to_email1 = "Gabriel.olugbenga@ireticapital.com";
            $mail = new PaymentUpdate($requestMail);
            Mail::to($to_email)
                ->cc($to_email1)
                ->send($mail);

        }

        return redirect()->route('admin.payments')->with ('update','Mail Sent Successfully');
    }

}
