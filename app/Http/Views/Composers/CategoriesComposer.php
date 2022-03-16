<?php

namespace App\Http\Views\Composers;

use Illuminate\View\View;
// use App\Repositories\UserRepository;
use App\Services\CategoriesService;
use App\Services\CartService;
use App\Services\SliderService;

class CategoriesComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $categoriesService;
    protected $cartService;
    protected $sliderService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(CategoriesService $categoriesService, CartService $cartService,SliderService $sliderService)
    {
        // Dependencies automatically resolved by service container...
        // $this->users = $users;
        $this->categoriesService = $categoriesService;
        $this->cartService       = $cartService;
        $this->sliderService       = $sliderService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $value              = (empty(session('cart_code'))) ? "" : session('cart_code');
        $categoriesCurrent  = $this->categoriesService->getAll();
        $carts              = $this->cartService->cartCode($value);
        $sliders    = $this->sliderService->getAll();
        if(count($carts) === 0){
            $count = 0;
        }else{
            $count = count($carts);
        }
        $view->with('count', $count);
        $view->with('sliders', $sliders);
        $view->with('categoriesCurrent', $categoriesCurrent);
        $view->with('value', $value);
    }
}   