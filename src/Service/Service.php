<?php

namespace Orangecode\Helpers\Service;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface Service
{
    /**
     * @param int|null $id
     * @param Builder|null $query
     * @return Collection|Model|null
     */
    public function find(int $id = null, ?Builder $query = null): Collection | Model | null;

    /**
     * @param Request $request
     * @return mixed
     */
    public function manager(Request $request): void;

    /**
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request): void;

    /**
     * @param Request $request
     * @return array
     */
    public function validated(Request $request): array;
}
