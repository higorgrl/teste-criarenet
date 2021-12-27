<?php

namespace App\Models;

class Pessoa extends BaseModel
{
    protected $table = 'pessoas';

    protected $primaryKey = 'pes_id';

    protected $fillable = [
        'pes_nome',
        'pes_cpf',
        'pes_telefone',
        'pes_email',
    ];

    protected $itensUpperCase = [
    ];

    protected $searchable = [
        'pes_id' => '=',
        'pes_nome' => 'like',
        'pes_email' => 'like',
    ];

}
