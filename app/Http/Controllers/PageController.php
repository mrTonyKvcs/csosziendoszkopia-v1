<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
// use App\Models\Page;

class PageController extends Controller
{
    protected $prices;

    public function __construct()
    {
        $this->prices = config('site.services');
    }

    // public function index($slug = '/')
    public function index()
    {
        // $page = Page::where('url', $slug)->firstOrFail();
        //
        // return view('page.index', ['page' => $page]);

        $services = collect(config('site.services'))->where('section', true);

        $doctors = config('site.doctors');

        $prices = $this->prices;

        return view('page.index', compact('doctors', 'services', 'prices'));
    }

    public function doctor($slug)
    {
        $doctor = collect(config('site.doctors'))->where('slug', $slug)->first();

        return view('page.doctors', compact('doctor'));
    }

    public function prices()
    {
        $prices = $this->prices;

        return view('page.prices', compact('prices'));
    }

    public function greeting(Appointment $appointment)
    {
        return view('page.greeting', [
            'appointment' => $appointment
        ]);
    }
}
