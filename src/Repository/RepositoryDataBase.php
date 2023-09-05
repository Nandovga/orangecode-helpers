<?php

namespace Orangecode\Helpers\Repository;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

trait RepositoryDataBase
{
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param array $data
     * @return int
     */
    public function save(array $data): int
    {
        $model = empty($data["id"])
            ? $this->model
            : $this->model::findOrFail($data["id"]);
        foreach ($data as $key => $value)
            $model->$key = $value;
        $model->save();
        return $model->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function remove(int $id): void
    {
        $data = $this->model::findOrFail($id);
        $data->delete();
    }

    /**
     * @param int|null $id
     * @param Builder|null $query
     * @return Collection|Model|null
     */
    public function find(int $id = null, ?Builder $query = null): Collection | Model | null
    {
        if (!empty($id))
            return $this->model::findOrFail($id);
        if (empty($where))
            return $this->model::all();
        return $query->get();
    }
}
