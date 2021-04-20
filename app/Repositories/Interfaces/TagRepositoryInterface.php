<?php

namespace App\Repositories\Interfaces;

interface TagRepositoryInterface
{
    /**
     * Create new Tag or get first by name
     *
     * @param string $name
     * @return mixed
     */
    public function getOrCreateTag(string $name);

    /**
     * Fetch all tags
     *
     * @return mixed
     */
    public function getAllTags();
}