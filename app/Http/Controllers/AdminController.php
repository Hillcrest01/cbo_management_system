<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Minutes;
use App\Models\Payments;
use App\Models\User;
use App\Models\Withdrawals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $total_members = User::count();
        $total_payments = Payments::sum('amount');
        $total_withdrawals = Withdrawals::sum('amount');
        $available_amount = $total_payments - $total_withdrawals;
        $minutes = Minutes::all();
        $meetings = Meeting::all();
        return view('admin.index', compact('user','meetings', 'minutes', 'available_amount', 'total_members', 'total_payments', 'total_withdrawals'));
    }

    public function add_meeting()
    {
        $user = Auth::user();
        return view('admin.add_meeting', compact('user'));
    }

    public function submit_meeting(Request $request)
    {

        //we create an instance of the meeting model
        $meeting = new Meeting();
        //here we get the current user and note his id.
        $user = Auth::user();
        $userid = $user->id;

        //we get the data from the form and equate them with the respective fields in the database.
        $meeting->title = $request->title;
        $meeting->date = $request->date;
        $meeting->summary = $request->summary;
        $meeting->user_id = $userid;

        //save the meeting to the database
        $meeting->save();
        toastr()->closeButton()->addSuccess("new meeting added successfully");
        return redirect()->back();
        //dd('meeting successfully added');
    }

    public function view_meetings()
    {
        $user = Auth::user();
        $meetings = Meeting::all();

        return view('admin.view_meetings', compact('meetings', 'user'));
    }

    public function edit_meeting($id)
    {
        $user = Auth::user();
        $meeting = Meeting::find($id);
        return view('admin.edit_meeting', compact('meeting', 'user'));
    }

    public function update_meeting(Request $request, $id)
    {
        $user = Auth::user();
        $meeting = Meeting::find($id);

        $meeting->title = $request->title;
        $meeting->date = $request->date;
        $meeting->summary = $request->summary;

        $meeting->save();
        toastr()->closeButton()->addSuccess('meeting successfully updated');
        return redirect('view_meetings', compact('user'));
    }

    public function delete_meeting($id)
    {
        $meeting = Meeting::find($id);

        $meeting->delete();

        toastr()->closeButton()->addSuccess('meeting successfully deleted');
        return redirect()->back();
    }

    public function add_minutes()
    {
        $user = Auth::user();
        $meeting = Meeting::all();
        return view('admin.add_minutes', compact('meeting', 'user'));
    }

    // public function upload_minutes(Request $request){
    //     $minutes = new Minutes();
    //     $user = Auth::user();
    //     $userid = $user->id;
    //     $minutes->title = $request->title;
    //     $minutes->meeting = $request->meeting;
    //     $minutes->user_id = $userid;

    //     //The code from here deals with the document upload

    //     $document = $request->document;

    //     if($document){

    //         $document_name = time().'.'.$document->getClientOriginalExtension();
    //         $request->$document->move('minutes', $document_name);

    //         $minutes->file_path = $document_name;
    //     }

    //     $minutes->save();
    //     toastr()->closeButton()->addSuccess('minutes successfully uploaded');
    //     return redirect()->back();

    // }

    public function upload_minutes(Request $request)
    {
        $minutes = new Minutes();

        $user = Auth::user();
        $userid = $user->id;

        $minutes->title = $request->title;
        $minutes->meeting = $request->meeting;
        $minutes->user_id = $userid;

        if ($request->hasFile('document')) {
            $document = $request->file('document');

            $document_name = time() . '.' . $document->getClientOriginalExtension();

            $document->move('minutes', $document_name);

            $minutes->file_path = $document_name;
        }

        $minutes->save();

        toastr()->closeButton()->addSuccess('Minutes successfully uploaded');
        return redirect()->back();
    }

    public function view_minutes()
    {
        $user = Auth::user();
        $minutes = Minutes::all();
        return view('admin.view_minutes', compact('minutes', 'user'));
    }

    public function edit_minutes($id)
    {
        $user = Auth::user();
        $meeting = Meeting::all();
        $minute = Minutes::find($id);

        return view('admin.edit_minutes', compact('minute', 'user', 'meeting'));
    }

    public function update_minutes(Request $request, $id)
    {
        $user = Auth::user();
        $userid = $user->id;
        $minute = Minutes::find($id);

        $minute->title = $request->title;
        $minute->meeting = $request->meeting;
        $minute->user_id = $userid;

        if ($request->hasFile('document')) {
            $document = $request->file('document');

            $document_name = time() . '.' . $document->getClientOriginalExtension();

            $document->move('minutes', $document_name);

            $minute->file_path = $document_name;

            $minute->save();
            toastr()->closeButton()->addSuccess('minutes successfully updated');
            return redirect('view_minutes');
        }
    }

    public function delete_minutes($id)
    {
        $minute_to_delete = Minutes::find($id);
        $minute_to_delete->delete();
        toastr()->closeButton()->addWarning('minute successfully deleted');
        return redirect()->back();
    }

    public function register_payment()
    {
        $user = Auth::user();
        $payments = Payments::all();
        $all_users = User::all();
        $meeting = Meeting::all();
        return view('admin.register_payment', compact('user', 'meeting', 'all_users'));
    }

    public function add_payment(Request $request)
    {
        $user = Auth::user();
        $adminname = $user->name;
        $payment = new Payments();

        $payment->member = $request->member;
        $payment->amount = $request->amount;
        $payment->payment_method = $request->payment_method;
        $payment->admin_name = $adminname;


        $payment->save();
        toastr()->closeButton()->addSuccess('payment successfully added');
        return redirect()->back();
    }

    public function view_payments()
    {
        $user = Auth::user();
        $payments = Payments::all();
        $total = Payments::sum('amount');

        return view('admin.view_payments', compact('user', 'total', 'payments'));
    }

    public function edit_payment($id)
    {
        $payment_to_edit = Payments::find($id);
        $user = Auth::user();
        $all_users = User::all();

        return view('admin.edit_payment', compact('payment_to_edit', 'user', 'all_users'));
    }

    public function update_payment(Request $request, $id)
    {
        $user = Auth::user();
        $adminname = $user->name;
        $payment_to_edit = Payments::find($id);

        $payment_to_edit->member = $request->member;
        $payment_to_edit->amount = $request->amount;
        $payment_to_edit->payment_method = $request->payment_method;
        $payment_to_edit->admin_name = $adminname;

        $payment_to_edit->save();
        toastr()->closeButton()->addSuccess('payment successfully updated');
        return redirect('view_payments');
    }

    public function delete_payment($id)
    {

        $payment_to_delete = Payments::find($id);

        $payment_to_delete->delete();
        toastr()->closeButton()->addSuccess('payment successfully deleted');
        return redirect()->back();
    }

    public function make_withdrawal()
    {
        $user = Auth::user();
        return view('admin.make_withdrawal', compact('user'));
    }

    public function withdraw(Request $request)
    {
        $user = Auth::user();
        $adminname = $user->name;
        $withdrawal = new Withdrawals();

        $withdrawal->amount = $request->amount;
        $withdrawal->description = $request->description;
        $withdrawal->admin_name = $adminname;

        $withdrawal->save();
        toastr()->closeButton()->addSuccess('withdrawal successful');
        return redirect('admin/dashboard');
    }

    public function view_withdrawal()
    {
        $user = Auth::user();
        $withdrawals = Withdrawals::all();
        $total_withdrawals = Withdrawals::sum('amount');

        return view('admin.view_withdrawals', compact('withdrawals', 'user', 'total_withdrawals'));
    }
}
