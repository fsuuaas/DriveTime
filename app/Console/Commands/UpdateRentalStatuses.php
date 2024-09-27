<?php

namespace App\Console\Commands;

use App\Enums\RentalStatusEnum;
use Illuminate\Console\Command;
use App\Models\Rental;

class UpdateRentalStatuses extends Command
{
    protected $signature = 'rentals:update-statuses';
    protected $description = 'Update rental statuses based on their start and end dates.';

    public function handle()
    {
        $rentals = Rental::whereIn('status', [RentalStatusEnum::Booked, RentalStatusEnum::Ongoing])->get();
        foreach ($rentals as $rental) {
            $rental->updateStatusBasedOnDate();
        }

        $this->info('Rental statuses updated successfully.');
    }
}
