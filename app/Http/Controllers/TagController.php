<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TagRepositoryInterface;

class TagController extends Controller
{
    /**
     * @var TagRepositoryInterface
     */
    private $tagRepository;

    /**
     * @param TagRepositoryInterface $tagRepository
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * Fetch all tags
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllTags() {
        return response()->json([
            'tags' => $this->tagRepository->getAllTags()
        ]);
    }
}
