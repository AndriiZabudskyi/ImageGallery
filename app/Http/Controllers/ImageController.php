<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImagesPostRequest;
use App\Services\Interfaces\ImageGalleryInterface;

class ImageController extends Controller
{
    /**
     * @var ImageGalleryInterface
     */
    protected $imageGalleryService;

    /**
     * ImageController constructor.
     * @param ImageGalleryInterface $imageGalleryService
     */
    public function __construct(ImageGalleryInterface $imageGalleryService)
    {
        $this->imageGalleryService = $imageGalleryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filterQuery = request('tag');

        if($filterQuery) {
            $images = $this->imageGalleryService->getImagesByFilter($filterQuery);
        } else {
            $images = $this->imageGalleryService->getAllImages();
        }

        return view('image.index', compact(
            'images',
            'filterQuery'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreImagesPostRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreImagesPostRequest $request)
    {
        $this->imageGalleryService->addImagesToGallery($request->validated());

        $message = 'Successfully uploaded';

        return response()->json([
            'message' => $message,
        ]);
    }
}
