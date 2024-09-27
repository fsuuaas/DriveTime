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
            self::Booked => 'shade-blue',
            self::Ongoing => 'shade-yellow',
            self::Completed => 'shade-green',
            self::Cancelled => 'shade-red'
        };
    }

    public function getLabelHTML(): string
    {
        return sprintf('<span class="badge %s">%s</span>', $this->getLabelColor(), $this->getLabelText());
    }


    public static function options(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
