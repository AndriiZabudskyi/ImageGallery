<?php

namespace App\Repositories\Interfaces;

interface TagRepositoryInterface
{
    /**
     * @param string $name
     * @return mixed
     */
    public function getOrCreateTag(string $name);

    /**
     * @return mixed
     */
    public function getAllTags();
}