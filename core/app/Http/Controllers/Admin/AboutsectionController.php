<?php

namespace App\Http\Controllers\Admin;

use App\BasicExtended;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BasicSetting as BS;
use App\Language;
use Validator;
use Session;

class AboutsectionController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs'] = $lang->basic_setting;
        $data['abe'] = $lang->basic_extended;

        return view('admin.home.about-section', $data);
    }

    public function update(Request $request, $langid)
    {
        $image = $request->image;
        $allowedExts = array('jpg', 'png', 'jpeg', 'svg');
        $extImage = pathinfo($image, PATHINFO_EXTENSION);

        $image2 = $request->image_2;
        $extImage2 = pathinfo($image2, PATHINFO_EXTENSION);

        $rules = [
            'about_section_title' => 'required|max:225',
            'about_section_text' => 'required',
            'about_section_video_link' => 'nullable'

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

        if ($request->filled('image_2')) {
            $rules['image_2'] = [
                function ($attribute, $value, $fail) use ($extImage2, $allowedExts) {
                    if (!in_array($extImage2, $allowedExts)) {
                        return $fail("Only png, jpg, jpeg, svg image is allowed");
                    }
                }
            ];
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $bs = BS::where('language_id', $langid)->firstOrFail();
        $bs->about_section_title = $request->about_section_title;
        $bs->about_section_text = $request->about_section_text;
        $bs->about_section_text2 = $request->about_section_text2;
        $bs->about_section_text3 = $request->about_section_text3;
        $bs->about_section_text4 = $request->about_section_text4;

        $videoLink = $request->about_section_video_link;
        if (strpos($videoLink, "&") != false) {
            $videoLink = substr($videoLink, 0, strpos($videoLink, "&"));
        }
        $bs->about_section_video_link = $videoLink;

        if ($request->filled('image')) {
            @unlink('assets/front/img/' . $bs->about_bg);
            $filename = uniqid() .'.'. $extImage;
            @copy($image, 'assets/front/img/' . $filename);

            $bs->about_bg = $filename;
        }

        $bs->save();

        $be = BasicExtended::where('language_id', $langid)->firstOrFail();
        if ($request->filled('image_2')) {
            @unlink('assets/front/img/' . $be->about_bg2);
            $filename = uniqid() .'.'. $extImage2;
            @copy($image2, 'assets/front/img/' . $filename);

            $be->about_bg2 = $filename;
        }
        $be->save();

        Session::flash('success', 'Informations updated successfully!');
        return "success";
    }
}
