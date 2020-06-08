<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    public function index()
    {
        $detail = Setting::first();
        return view('admin.setting', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $record = Setting::findOrFail($id);

        $request->validate($this->rules(), $this->messages());
        $formInput = $request->except(['logo', 'contactus_image', 'featured_trips_image', 'slogan_imagefirst', 'slogan_imagesecond', 'team_banner_image', 'testimonial_banner_image', 'latest_video_backgroundimage']);

        if ($request->hasFile('logo')) {
            if ($record->logo) {
                $this->unlinkImage($record->logo);
            }
            list($width, $height) = getimagesize($request->file('logo')->getRealPath());
            $formInput['logo'] = $this->imageProcessing($request->file('logo'), $width, $height, 'no');
        }

        if ($request->hasFile('contactus_image')) {
            if ($record->contactus_image) {
                $this->unlinkImage($record->contactus_image);
            }
            $formInput['contactus_image'] = $this->imageProcessing($request->contactus_image, 1349, 354, 'no');
        }

        if ($request->hasFile('featured_trips_image')) {
            if ($record->featured_trips_image) {
                $this->unlinkImage($record->featured_trips_image);
            }
            $formInput['featured_trips_image'] = $this->imageProcessing($request->featured_trips_image, 1349, 354, 'no');
        }

        if ($request->hasFile('slogan_imagefirst')) {
            if ($record->slogan_imagefirst) {
                $this->unlinkImage($request->slogan_imagefirst);
            }
            $formInput['slogan_imagefirst'] = $this->imageProcessing($request->slogan_imagefirst, 1349, 354, 'no');
        }

        if ($request->hasFile('slogan_imagesecond')) {
            if ($record->slogan_imagesecond) {
                $this->unlinkImage($request->slogan_imagesecond);
            }
            $formInput['slogan_imagesecond'] = $this->imageProcessing($request->slogan_imagesecond, 1349, 354, 'no');
        }

        if ($request->hasFile('team_banner_image')) {
            if ($record->team_banner_image) {
                $this->unlinkImage($record->team_banner_image);
            }

            $formInput['team_banner_image'] = $this->imageProcessing($request->team_banner_image, 1349, 354, 'no');
        }

        if ($request->hasFile('testimonial_banner_image')) {
            if ($record->testimonial_banner_image) {
                $this->unlinkImage($record->testimonial_banner_image);
            }

            $formInput['testimonial_banner_image'] = $this->imageProcessing($request->testimonial_banner_image, 1349, 354, 'no');
        }

        if ($request->hasFile('latest_video_backgroundimage')) {
            if ($record->latest_video_backgroundimage) {
                $this->unlinkImage($request->latest_video_backgroundimage);
            }
            $formInput['latest_video_backgroundimage'] = $this->imageProcessing($request->latest_video_backgroundimage, 1349, 354, 'no');
        }

        $record->update($formInput);
        return redirect()->route('dashboard')->with('message', 'Dashboard Update Successfully');
    }

    public function rules()
    {
        $rules = [
            'site_name' => 'required',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'contactus_image.dimensions' => 'Upto 2000 * 2000 size is allowed',
            'featured_trips_image.dimensions' => 'Upto 2000 * 2000 size is allowed',
            'slogan_image.dimensions' => 'Upto 2000 * 2000 size is allowed',
        ];
    }

    public function imageProcessing($image, $width, $height, $otherpath)
    {

        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . $image->getClientOriginalName();
        $thumbPath = public_path('images/thumbnail');
        $mainPath = public_path('images/main');
        $listingPath = public_path('images/listing');

        $img = Image::make($image->getRealPath());
        // $img->fit($width, $height)->save($mainPath . '/' . $input['imagename']);

        // with no fit
        $img->save($mainPath . '/' . $input['imagename']);

        if ($otherpath == 'yes') {
            $img->fit($width / 2, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($listingPath . '/' . $input['imagename']);

            $img->fit(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath . '/' . $input['imagename']);
        }

        $img->destroy();
        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $thumbPath = public_path('images/thumbnail/') . $imagename;
        $mainPath = public_path('images/main/') . $imagename;
        $listingPath = public_path('images/listing/') . $imagename;
        if (file_exists($thumbPath)) {
            unlink($thumbPath);
        }

        if (file_exists($mainPath)) {
            unlink($mainPath);
        }

        if (file_exists($listingPath)) {
            unlink($listingPath);
        }

        return;
    }
}
