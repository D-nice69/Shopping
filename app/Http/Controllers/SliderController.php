<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Http\Requests\SliderCreateRequest;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        return view('admin.slider.index');
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(SliderCreateRequest $request)
    {
        try {
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description,
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataImageSlider)) {
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }
}
