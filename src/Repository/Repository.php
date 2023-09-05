<?php

namespace Orangecode\Helpers\Repository;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface Repository
{
    /**
     * @return Model
     */
    public function getModel(): Model;

    /**
     * @param array $data
     * @return int
     */
    public function save(array $data): int;

    /**
     * @param int $id
     * @return void
     */
    public function remove(int $id): void;

    /**
     * @param int|null $id
     * @param Builder|null $query
     * @return Collection|Model|null
     */
    public function find(int $id = null, ?Builder $query = null): Collection | Model | null;
}
