<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Support;

use Vdhicts\Cyberfusion\ClusterApi\Contracts\Filter;

class ListFilter implements Filter
{
    private int $skip = 0;
    private int $limit = 100;
    private array $filter = [];
    private array $sort = [];

    /**
     * @return int
     */
    public function getSkip(): int
    {
        return $this->skip;
    }

    /**
     * @param int $skip
     * @return ListFilter
     */
    public function setSkip(int $skip): ListFilter
    {
        $this->skip = $skip;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return ListFilter
     */
    public function setLimit(int $limit): ListFilter
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return array
     */
    public function getFilter(): array
    {
        return $this->filter;
    }

    /**
     * @param array $filter
     * @return ListFilter
     */
    public function setFilter(array $filter): ListFilter
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return array
     */
    public function getSort(): array
    {
        return $this->sort;
    }

    /**
     * @param array $sort
     * @return ListFilter
     */
    public function setSort(array $sort): ListFilter
    {
        $this->sort = $sort;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'skip' => $this->skip,
            'limit' => $this->limit,
            'filter' => $this->filter,
            'sort' => $this->sort,
        ];
    }
}
