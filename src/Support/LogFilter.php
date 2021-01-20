<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Support;

use Carbon\Carbon;
use DateTimeInterface;
use Vdhicts\Cyberfusion\ClusterApi\Contracts\Filter;

class LogFilter implements Filter
{
    private DateTimeInterface $timestamp;
    private int $limit = 100;
    private bool $showRawMessage = false;

    public function __construct()
    {
        $this->timestamp = Carbon::today();
    }

    /**
     * @return DateTimeInterface
     */
    public function getTimestamp(): DateTimeInterface
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeInterface $timestamp
     * @return LogFilter
     */
    public function setTimestamp(DateTimeInterface $timestamp): LogFilter
    {
        $this->timestamp = $timestamp;

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
     * @return LogFilter
     */
    public function setLimit(int $limit): LogFilter
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return bool
     */
    public function isShowRawMessage(): bool
    {
        return $this->showRawMessage;
    }

    /**
     * @param bool $showRawMessage
     * @return LogFilter
     */
    public function setShowRawMessage(bool $showRawMessage): LogFilter
    {
        $this->showRawMessage = $showRawMessage;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'timestamp' => $this->timestamp->format('c'),
            'limit' => $this->limit,
            'show_raw_message' => $this->showRawMessage,
        ];
    }
}
