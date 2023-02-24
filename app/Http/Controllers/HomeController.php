<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $request_opened = UserRequest::where(['ID_user' => $request->user()->id, 'status' => 0])->count();
        return view('home', ['request_opened' => $request_opened, 'user' => $request->user()]);
    }

    /**
     * User Profile
     * @param Nill
     * @return View Profile
     * @author Shani Singh
     */
    public function getProfile(Request $request)
    {

        $userCompnay = $request->user()->getUserCompnay;
        if (!$userCompnay) {
            $userCompnay = new Company();
        }

        return view('profile', ['userCompnay' => $userCompnay]);
    }

    /**
     * Update Profile
     * @param $profileData
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function updateProfile(Request $request)
    {
        #Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number' => 'required|numeric|digits:10',
            'address'      =>  'required',
            'city'      =>  'required',
            'cp'      =>  'required',
            'country'      =>  'required',
            'is_company' => 'sometimes'

        ]);

        try {

            // DB::beginTransaction();

            #Update Profile Data
            User::whereId(auth()->user()->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_number' => $request->mobile_number,
                'address' => $request->address,
                'city' => $request->city,
                'cp' => $request->cp,
                'country' => $request->country,
                'dni' => $request->dni,
            ]);

            if ($request->is_company) {
                Company::updateOrCreate(
                    [
                        'id_user' => auth()->user()->id
                    ],
                    [
                        'name' => $request->c_name,
                        'id_user' => auth()->user()->id,
                        'address' => $request->c_address,
                        'cp' => $request->c_cp,
                        'country' => $request->c_country,
                        'phone' => $request->c_phone,
                        'cif' => $request->c_cif,
                    ]
                );
            } else {
                Company::where('id_user', auth()->user()->id)->delete();
            }


            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Profile Updated Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Change Password
     * @param Old Password, New Password, Confirm New Password
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Password Changed Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
