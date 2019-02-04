<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Auth, DateTime;
use App\DatabaseModels\Users;
use App\DatabaseModels\Companies;
use Carbon\Carbon;

class AjaxUploadController extends Controller
{
    function index()
    {
        return view('ajax_upload');
    }

    function action(Request $request)
    {

        //create unique timestamp for images
        //without the image from the cache is loading in the preview
        $date = new DateTime();
        $filename = $date->getTimestamp();

        $user = Auth::user();

        $validation = Validator::make($request->all(), [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if($validation->passes())
        {
            $image = $request->file('select_file');
            $new_name = $user->id. $filename . '.' . $image->getClientOriginalExtension();

            $company = Companies::where('id', '=', $user->service_provider_fk )
            ->first();

            $company->logo = $new_name;
            $company->save();

            $image->move(public_path('uploads/companies/logo'), $new_name);
            return response()->json([
                'message'   => 'Image Upload Successfully',
                'uploaded_image' => '<img src="/uploads/companies/logo/'.$new_name.'" class="img-thumbnail" width="300" />',
                'class_name'  => 'alert-success'
            ]);
        }
        else
        {
            return response()->json([
                'message'   => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        }
    }
}
?>