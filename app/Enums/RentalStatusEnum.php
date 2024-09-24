<?php

namespace App\Enums;

enum RentalStatusEnum: int
{
    case Booked = 1;
    case Ongoing = 2;
    case Completed = 3;
    case Cancelled = 4;

    public function isBooked(): bool
    {
        return $this === self::Booked;
    }

    public function isOngoing(): bool
    {
        return $this === self::Ongoing;
    }

    public function isCompleted(): bool
    {
        return $this === self::Completed;
    }

    public function isCancelled(): bool
    {
        return $this === self::Cancelled;
    }

    public function getLabelText(): string
    {
        return match ($this) {
            self::Booked => 'Booked',
            self::Ongoing => 'Ongoing',
            self::Completed => 'Completed',
            self::Cancelled => 'Cancelled'
        };
    }

    public function getLabelColor(): string
    {
        return match ($this) {
            self::Booked => 'bg-label-primary',
            self::Ongoing => 'bg-label-warning',
            self::Completed => 'bg-label-success',
            self::Cancelled => 'bg-label-danger'
        };
    }

    //use <span @class(['badge', 'bg-primary' => $employee->status->Active, 'bg-warning' => $employee->status->Resigned, 'bg-danger' => $employee->status->Terminated])>{{$employee->status}}</span>

    public function getLabelHTML(): string
    {
        return sprintf('<span class="badge rounded-pill %s">%s</span>', $this->getLabelColor(), $this->getLabelText());
    }

    //use {!! $employee->status->getLabelHTML() !!}

    public static function options(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
