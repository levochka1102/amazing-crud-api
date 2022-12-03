<?php

namespace App\Helpers;

use Error;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

trait ModelsHelper
{

    private function convertToModel(string $qualifiedClass, array|int|null $id): Collection|Model
    {
        if (!(bool)$id) {
            return new Collection();
        }

        if (!class_exists($qualifiedClass)) {
            throw new Error('Given invalid class', 500);
        }

        if (!is_subclass_of($qualifiedClass, Model::class)) {
            throw new Error('Given class isn\'t subclass of Model class', 500);
        }

        if (is_array($id)) {
            $id = array_map(fn($var) => $var['id'], $id);
        }

        return $qualifiedClass::query()->findOrFail($id);
    }

}
