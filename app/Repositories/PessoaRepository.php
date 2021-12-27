<?php

namespace App\Repositories;

use App\Models\Pessoa;

class PessoaRepository extends BaseRepository
{
    public function __construct(Pessoa $model)
    {
        parent::__construct($model);
    }

    public function delete($id)
    {
        parent::delete($id);
    }

    public function restore($id)
    {
        parent::restore($id);
    }
}
