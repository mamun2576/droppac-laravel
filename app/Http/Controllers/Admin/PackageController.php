<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Admin\CreateNewPackage;
use App\Actions\Admin\UpdatePackageStatus;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::orderBy('created_at', 'desc')->get();
        return view('package.index',['packages'=>$packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $package = null;
        return view('package.create',['package'=>$package]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateNewPackage $creator)
    {
        $input = $request->all();
        $user = $this->getAccount($input['account']);


        if($user == null){
            return back()->with('status','Account not found!');
        }
            $creator->create($input,$user);
            return back()->with('status','Packages added to '.$user->account.' successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('package.show',['package'=>$package]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
       return view('package.edit',['package'=>$package]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdatePackageStatus $updater)
    {
        $package = Package::where('uuid', $request->uuid)->firstOr(function()use($request){
            return Package::where('ground_tracking', $request->ground_tracking)->firstOr(function(){
            return    Package::where('tracking_number', $request->tracking_number)->firstOr(function(){
                    return null;
                });
             });
        });

        if ($package == null) {
            return back()->with('status', 'Package not found!');  
        }

        if ($package->account !== $request->account) {
            $user = User::where('account',$request->account)->firstOr(function(){
                  $user = null;
            });

            if ($user !== null) {
                $package->user_id = $user->id;
                $updater->update($package, $request->all());
                return redirect('/admin/packages')->with('status', 'Package updated successfully!');
            }
                return back()->with('status', 'Account not found!');  
        }
        else{
                $updater->update($package, $request->all());
                return redirect('/admin/packages')->with('status', 'Package updated successfully!'); 
        }   
        return back()->with('status', 'Package update failed!');      
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


    private function getAccount($account){
        return $user = User::where('account',$account)->firstOr(function(){
            return null;
        });
    }
}
