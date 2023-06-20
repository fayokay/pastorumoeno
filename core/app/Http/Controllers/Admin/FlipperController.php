<?php

namespace App\Http\Controllers\Admin;

use App\BasicExtended;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Flipper;
use App\Language;
use Validator;
use Session;

class FlipperController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id = $lang->id;
        $data['sliders'] = Flipper::where('language_id', $lang_id)->orderBy('id', 'DESC')->get();

        $data['lang_id'] = $lang_id;
        return view('admin.home.hero.slider.flippers', $data);
    }

    public function edit($id)
    {
        $data['slider'] = Flipper::findOrFail($id);
        return view('admin.home.hero.slider.flipperedit', $data);
    }

    public function store(Request $request)
    {
        $image = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extImage = pathinfo($image, PATHINFO_EXTENSION);

        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'language_id' => 'required',
            'image' => 'required', 
            'serial_number' => 'required|integer',
        ];

        if ($request->filled('image')) {
            $rules['image'] = [
                function ($attribute, $value, $fail) use ($extImage, $allowedExts) {
                    if (!in_array($extImage, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                }
            ];
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $slider = new Flipper;
        $slider->language_id = $request->language_id;
        
        if ($request->filled('image')) {
            $filename = uniqid() .'.'. $extImage;
            @copy($image, 'assets/front/img/sliders/' . $filename);
            $slider->image = $filename;
        }

        $slider->serial_number = $request->serial_number;
        $slider->save();

        Session::flash('success', 'Flipper added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $image = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extImage = pathinfo($image, PATHINFO_EXTENSION);

        $rules = [
            'serial_number' => 'required|integer',
        ];

        if ($request->filled('image')) {
            $rules['image'] = [
                function ($attribute, $value, $fail) use ($extImage, $allowedExts) {
                    if (!in_array($extImage, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                }
            ];
        }

        $be = BasicExtended::first();

        
        $slider = Flipper::findOrFail($request->slider_id);

        if ($request->filled('image')) {
            @unlink('assets/front/img/sliders/' . $slider->image);
            $filename = uniqid() .'.'. $extImage;
            @copy($image, 'assets/front/img/sliders/' . $filename);
            $slider->image = $filename;
        }

        
        $slider->serial_number = $request->serial_number;
        $slider->save();

        Session::flash('success', 'Flipper updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $slider = Flipper::findOrFail($request->slider_id);
        @unlink('assets/front/img/sliders/' . $slider->image);
        $slider->delete();

        Session::flash('success', 'Flipper deleted successfully!');
        return back();
    }
}
