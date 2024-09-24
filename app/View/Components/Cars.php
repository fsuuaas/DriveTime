<?php

namespace App\View\Components;

use App\Models\Car;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cars extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $brands = Car::distinct()->pluck('brand');
        $models = Car::distinct()->pluck('model');
        $years = Car::distinct()->pluck('year');
        $types = Car::distinct()->pluck('car_type');
        return view('components.cars', compact('brands', 'models', 'years', 'types'));
    }
}
