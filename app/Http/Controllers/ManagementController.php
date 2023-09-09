<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\AccountSettings;
use App\Models\Order;

class ManagementController extends Controller
{
    public function users()
    {
        $settings = Settings::first();
        $users = User::latest()->paginate(10);
        $newOrders = Order::where('status', '0')->count();
        return view('admin.users.index', compact('users','newOrders','settings'));
    }
    
    public function settings()
    {
        $settings = Settings::first();
        $accSettings = AccountSettings::latest()->get();
        $newOrders = Order::where('status', '0')->count();
        return view('admin.settings.index', compact('settings','accSettings','newOrders'));
    }

    public function settingChange(Request $request)
    {
        // This validate the required input from the add products page
        $this->validate($request,[
            'b_name' => 'string',
            'b_phone' => 'required',
            'b_email' => 'string',
            'b_address' => 'string',
            'ab_title' => 'string',
            'ab_desc' => 'string',
        ]);

        // Store the datas here with the image in the public.pruductimage folder
        // into the ProductModels table.

        $settings = Settings::find(1);

        $settings->b_name = $request->b_name;
        $settings->b_phone = $request->b_phone;
        $settings->b_email = $request->b_email;
        $settings->b_address = $request->b_address;
        $settings->ab_title = $request->ab_title;
        $settings->ab_desc = $request->ab_desc;
        $settings->update();

        return redirect()->back()->with('success', "General Settings Updated");
    }

    public function settingAccountAdd()
    {
        $settings = Settings::first();
        $newOrders = Order::where('status', '0')->count();
        return view('admin.settings.account.add', compact('newOrders','settings'));
    }

    public function settingAccountStore(Request $request)
    {
        // This validate the required input from the add products page
        $this->validate($request,[
            'ac_name' => 'string',
            'ac_no' => 'required',
            'ac_bank' => 'string',
        ]);

        // Store the datas here with the image in the public.pruductimage folder
        // into the ProductModels table.

        $accSettings = new AccountSettings();

        $accSettings->payment_type = $request->ac_payment;
        $accSettings->ac_name = $request->ac_name;
        $accSettings->ac_no = $request->ac_no;
        $accSettings->ac_bank = $request->ac_bank;
        $accSettings->save();

        return redirect()->back()->with('success', "Account Successfully Added!");
    }

    public function settingAccountEdit($id)
    {
        $settings = Settings::first();
        $accSettings = AccountSettings::find($id);
        $newOrders = Order::where('status', '0')->count();
        return view('admin.settings.account.edit', compact('accSettings','newOrders','settings'));
    }

    public function settingAccountUpdate(Request $request, $id)
    {
        // This validate the required input from the add products page
        $this->validate($request,[
            'ac_name' => 'string',
            'ac_no' => 'required',
            'ac_bank' => 'string',
        ]);

        // Store the datas here with the image in the public.pruductimage folder
        // into the ProductModels table.

        $accSettings = AccountSettings::find($id);

        $accSettings->payment_type = $request->ac_payment;
        $accSettings->ac_name = $request->ac_name;
        $accSettings->ac_no = $request->ac_no;
        $accSettings->ac_bank = $request->ac_bank;
        $accSettings->update();

        return redirect()->back()->with('success', "Account Successfully Updated!");
    }
   
    public function settingAccountDelete($id)
    {
        AccountSettings::find($id)->delete();
        return redirect()->back()->with('success','Account Deleted Successfully!');
    }

    public function settingAccount(Request $request, $id)
    {
        $accSettings = AccountSettings::find($id);

        $accSettings->active = $request->active == TRUE ? 'Yes': 'No';;
        $accSettings->save(); 

        return redirect()->back()->with('success', "Account Successfully Activated!");
    }

}
