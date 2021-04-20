<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TagRepositoryInterface;

class TagController extends Controller
{
    /**
     * @var TagRepositoryInterface
     */
    protected $tagRepository;

    /**
     * TagController constructor.
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * @return mixed
     */
    public function getAllTags() {
        return response()->json([
            'tags' => $this->tagRepository->getAllTags()
        ]);
    }
}
