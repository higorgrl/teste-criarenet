<?php

namespace App\Repositories;

use App\Models\BaseModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

abstract class BaseRepository
{
    protected $model;

    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function update(array $data, $id, $attribute = null)
    {
        if (!$attribute) {
            $attribute = $this->model->getKeyName();
        }

        $collection = $this->model->where($attribute, '=', $id)->get();

        if ($collection) {
            foreach ($collection as $obj) {
                $obj->fill($data)->save();
            }

            return $collection->count();
        }

        return 0;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function restore($id)
    {
        $this->model->withTrashed()->find($id)->restore();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function lists($identifier, $field)
    {
        return $this->model->orderBy($identifier, 'desc')->pluck($field, $identifier);
    }

    public function listsOrdem($identifier, $field)
    {
        return $this->model->orderBy($field, 'asc')->pluck($field, $identifier);
    }

    public function search(array $options, array $select = null)
    {
        $query = $this->model;
        foreach ($options as $op) {
            $query = $query->where($op[0], $op[1], $op[2]);
        }

        if (!is_null($select)) {
            $query = $query->select(implode(',', $select));
        }

        return $query->get();
    }

    public function paginate(array $requestParameters)
    {
        $result = $this->model;

        $request = $this->paginateRequest($requestParameters);
        $sort = $request['sort'];
        $search = $request['search'];
        $quantidade = $request['quantidade'];

        if (!empty($search)) {
            foreach ($search as $key => $value) {
                switch ($value['type']) {
                    case 'like':
                        $result = $result->where($value['field'], "i" . $value['type'], "%{$value['term']}%");
                        break;
                    default:
                        $result = $result->where($value['field'], $value['type'], $value['term']);
                }
            }
        }

        if (!empty($sort)) {
            $result = $result->orderBy($sort['field'], $sort['sort']);
        } else {
            $result = $result->orderBy('created_at', 'asc');
        }

        return $result->paginate($quantidade);
    }

    public function paginateRequest(array $requestParameters = null)
    {
        $sort = [];
        if (!empty($requestParameters['field']) and !empty($requestParameters['sort'])) {
            $sort = [
                'field' => $requestParameters['field'],
                'sort' => $requestParameters['sort'],
            ];
        }
        if (!empty($requestParameters['quantidade'])) {
            $quantidade = $requestParameters['quantidade'];
        } else {
            $quantidade = 20;
        }

        $searchable = $this->model->searchable();
        $search = [];
        foreach ($requestParameters as $key => $value) {
            if (array_key_exists($key, $searchable) and !empty($value)) {
                $search[] = [
                    'field' => $key,
                    'type' => $searchable[$key],
                    'term' => $value,
                ];
            }
        }
        return ['sort' => $sort, 'search' => $search, 'quantidade' => $quantidade];
    }

    public function deletados(array $requestParameters = null)
    {
        $request = $this->paginateRequest($requestParameters);
        $sort = $request['sort'];
        $search = $request['search'];
        $quantidade = $request['quantidade'];
        $result = $this->model->onlyTrashed();
        if (!empty($search)) {
            foreach ($search as $key => $value) {
                switch ($value['type']) {
                    case 'like':
                        $result = $result->where($value['field'], $value['type'], "%{$value['term']}%");
                        break;
                    default:
                        $result = $result->where($value['field'], $value['type'], $value['term']);
                }
            }
        }

        if (!empty($sort)) {
            $result = $result->orderBy($sort['field'], $sort['sort']);
        } else {
            $result = $result->orderBy('created_at', 'asc');
        }
        $result = $result->paginate($quantidade);
        return $result;
    }


    public function getFillableModelFields()
    {
        return $this->model->getFillable();
    }

    public function count()
    {
        return $this->model->count();
    }

    public function findWhere(array $data)
    {
        return $this->model->where($data);
    }

    public function findWhereIn($input, array $data)
    {
        return $this->model->whereIn($input, $data)->get();
    }

    public function where($field, $type, $value)
    {
        return $this->model->where($field, $type, $value);
    }

    public function whereDate($field, $operator, $date)
    {
        return $this->model->whereDate($field, $operator, $date);
    }

    public function download($pasta, $subpasta, $nome)
    {
        $path = $pasta . '/' . $subpasta . "/" . $nome;
        return Storage::download($path);
    }

    public function guardaArquivo($request, $pasta, $subpasta, $nome)
    {
        $path = $pasta . '/' . $subpasta . '/' . $nome;

        // algoritmo pra encontrar todo o caminho sem o tipo do arquivo pra eu apagar o que tiver salvo anteriormente
        $looping = true;
        $position = 0;
        $i = 0;
        while ($looping) {
            if ($nome[$i] == ".") {
                $looping = false;
                $position = $i;
            }
            $i++;
        }
        $deletePath = $pasta . '/' . $subpasta . "/" . substr($nome, 0, $position);

        $deleteFileTypes = ['.jpg','.pdf','.png','.jpeg','.cgi'];
        foreach ($deleteFileTypes as $type) {
            if (Storage::exists($deletePath . $type)) {
                Storage::delete($deletePath . $type);
            }
        }

        $nome = $subpasta . "/" . $nome;
        //aux para guardar a img
        $request->storeAs($pasta.'/', $nome);
        return $path;
    }
}
