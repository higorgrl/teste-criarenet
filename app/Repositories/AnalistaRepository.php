<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class AnalistaRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
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

    public function paginateRequest(array $requestParameters = null)
    {

        if (!empty($requestParameters['field']) && !empty($requestParameters['sort'])) {
            $field = $requestParameters['field'];
            $sort = $requestParameters['sort'];
        } else {
            $field = 'usr_email';
            $sort =  'asc';
        }

        if (!empty($requestParameters['quantidade'])) {
            $quantidade = $requestParameters['quantidade'];
        } else {
            $quantidade = 25;
        }
        return ['field' => $field, 'sort' => $sort, 'quantidade' => $quantidade];
    }


    public function paginate(array $requestParameters)
    {
        $request = $this->paginateRequest($requestParameters);
        $field = $request['field'];
        $sort = $request['sort'];
        $quantidade = $request['quantidade'];

        $listas = RoleUser::where('rus_rol_id', '=', 3)->get();
        $ids_analistas = array();
        foreach ($listas as $item) {
            $ids_analistas[] = $item->rus_usr_id;
        }
        $result = $this->model->whereIn('usr_id', $ids_analistas);
        $Users = $result->orderBy($field, $sort)->paginate($quantidade);
        return $Users;
    }


}
