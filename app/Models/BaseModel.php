<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;
    protected $searchable = [];

    public static function boot()
    {
        parent::boot();
    }

    public function searchable()
    {
        return $this->searchable;
    }

    public static function create(array $attributes = [])
    {
        $attributes = parent::setUpperCaseItensModel($attributes);

        $model = new static($attributes);

        $model->save();

        return $model;
    }

    public function update(array $attributes = [], array $options = [])
    {
        $attributes = $this->setUpperCaseItensModel($attributes);

        if (!$this->exists) {
            return false;
        }

        return $this->fill($attributes)->save($options);
    }

    public function setUpperCaseItensModel($data)
    {
        if (is_null($this->itensUpperCase)) {
            return $data;
        }

        $itensUpperCase = $this->itensUpperCase;

        foreach ($itensUpperCase as $key => $item) {
            if (array_key_exists($item, $data)) {
                $data[$item] = mb_strtoupper(mb_strtolower($data[$item]));
            }
        }

        return $data;
    }

    public function setLowerCaseItensModel($data)
    {
        if (is_null($this->itensLowerCase)) {
            return $data;
        }

        $itensLowerCase = $this->itensLowerCase;

        foreach ($itensLowerCase as $key => $item) {
            if (array_key_exists($item, $data)) {
                $data[$item] = mb_strtolower(mb_strtoupper($data[$item]));
            }
        }

        return $data;
    }
}
