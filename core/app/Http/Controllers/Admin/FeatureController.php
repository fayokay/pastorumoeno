<?php

namespace App\Http\Controllers\Admin;

use App\BasicExtended;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Language;
use App\Feature;
use Validator;
use Session;
use App\BasicSetting as BS;
class FeatureController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;
        $data['features'] = Feature::where('language_id', $lang_id)->orderBy('id', 'DESC')->get();
        $data['lang_id'] = $lang_id;
        $data['abs'] = $lang->basic_setting;

        return view('admin.home.feature.index', $data);
    }

    public function edit($id)
    {
        $data['feature'] = Feature::findOrFail($id);
        return view('admin.home.feature.edit', $data);
    }

    public function updateSection(Request $request, $langid)
    {
        $rules = [
            'feature_section_title' => 'required|max:100',
            'feature_section_subtitle' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $bs = BS::where('language_id', $langid)->firstOrFail();
        $bs->feature_section_title = $request->feature_section_title;
        $bs->feature_section_subtitle = $request->feature_section_subtitle;
        $bs->feature_section_url = $request->feature_section_url;
        $bs->save();

        Session::flash('success', 'Texts updated successfully!');
        return "success";
    }

    public function store(Request $request)
    {
        $count = Feature::where('language_id', $request->language_id)->count();
        if ($count == 4) {
            Session::flash('warning', 'You cannot add more than 4 features!');
            return "success";
        }

        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'language_id' => 'required',
            'icon' => 'required',
            'title' => 'required|max:50',
            'color' => 'required',
            'serial_number' => 'required|integer',
        ];

        $be = BasicExtended::select('theme_version')->first();
        if ($be->theme_version == 'car') {
            $rules['color'] = 'nullable';
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $feature = new Feature;
        $feature->icon = $request->icon;
        $feature->language_id = $request->language_id;
        $feature->title = $request->title;
        $feature->description = $request->description;

        if ($be->theme_version != 'car') {
            $feature->color = $request->color;
        }

        $feature->serial_number = $request->serial_number;
        $feature->save();

        Session::flash('success', 'Feature added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $rules = [
            'icon' => 'required',
            'title' => 'required|max:50',
            'color' => 'required',
            'serial_number' => 'required|integer',
        ];

        $be = BasicExtended::select('theme_version')->first();
        if ($be->theme_version == 'car') {
            $rules['color'] = 'nullable';
        }

        $request->validate($rules);

        $feature = Feature::findOrFail($request->feature_id);
        $feature->icon = $request->icon;
        $feature->title = $request->title;
        $feature->description = $request->description;

        if ($be->theme_version != 'car') {
            $feature->color = $request->color;
        }

        $feature->serial_number = $request->serial_number;
        $feature->save();

        Session::flash('success', 'Feature updated successfully!');
        return back();
    }

    public function delete(Request $request)
    {

        $feature = Feature::findOrFail($request->feature_id);
        $feature->delete();

        Session::flash('success', 'Feature deleted successfully!');
        return back();
    }
}
