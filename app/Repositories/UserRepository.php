<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function __construct(User $model)
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
        $user = $this->find($id);

        if ($data['usr_email'] != null) {
            $user->usr_email = $data['usr_email'];
        }
        if ($data['password'] != null) {
            $user->password =  bcrypt($data['password']);
        }
        $user->save();
    }

    public function password($senha)
    {
        $user = $this->find(Auth::user()->usr_id);
        $user->password = bcrypt($senha);
        $user->save();
    }

    public function delete($id)
    {
        $this->model->destroy($id);
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
            $field = 'created_at';
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
        $Users = $this->model->orderBy($field, $sort)->paginate($quantidade);
        return $Users;
    }

    public function deletados(array $requestParameters = null)
    {
        $request = $this->paginateRequest($requestParameters);
        $field = $request['field'];
        $sort = $request['sort'];
        $quantidade = $request['quantidade'];
        $result = $this->model->onlyTrashed();
        $Users = $result->orderBy($field, $sort)->paginate($quantidade);
        return $Users;
    }
}
