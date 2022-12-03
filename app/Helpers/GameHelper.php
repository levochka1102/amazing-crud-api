<?php

namespace App\Helpers;

use App\Models\Developer;
use App\Models\Genre;

trait GameHelper
{
    use ModelsHelper;

    private function getStoreData()
    {

    }

    private function prepareShowData(array $data): array
    {
        return [
            'page' => $data['page'],
            'limit' => $data['limit'],
            'search' => $data['search'],
            'genres' => $this->convertToModel(Genre::class, $data['genres']),
            'developers' => $this->convertToModel(Developer::class, $data['developers']),
        ];
    }

    private function prepareStoreData(array $data): array
    {
        return [
            'name' => $data['name'],
            'developer' => $this->convertToModel(Developer::class, $data['developer']),
            'genres' => $this->convertToModel(Genre::class, $data['genres']),
        ];
    }
}
