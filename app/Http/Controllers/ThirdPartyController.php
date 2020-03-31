<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Controllers\sweetAlert;
use App\Category;
use App\PaymentMethod;
use Illuminate\Support\Facades\Redirect;
use Validator;
use URL;

class ThirdPartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function getlist(Request $request)
    {
        $today = date('Y-m-d');
        $payments = PaymentMethod::orderby('id', 'asc')->get();
        return View('admin/payment/payment', compact('payments'));
    }

    public function updateData($id = 0, Request $request)
    {
        $rules = array(
            'app_id' => 'required',
            'secret' => 'required',
            'api_key' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        }
        $payment = PaymentMethod::find($id);
        $payment->app_id = $request->get('app_id');
        $payment->secret = $request->get('secret');
        $payment->api_key = $request->get('api_key');
        $payment->save();
        return Redirect::to("admin/thirdparty")->with('success', 'Successfully updated.');
    }


    public function updateShow($id = 0, Request $request)
    {
        $payment = PaymentMethod::find($id);
        $today = date('Y-m-d');
        return View('admin/payment/show', compact('today', 'payment'));
    }
    public function editData($id = 0, Request $request)
    {
        $payment = PaymentMethod::find($id);
        $today = date('Y-m-d');
        return View('admin/payment/edit', compact('today', 'payment'));
    }
}

