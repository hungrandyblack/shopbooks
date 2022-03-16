<?php 
namespace App\Services\Impl;

use App\Repositories\SliderRepository;
use App\Services\SliderService;

class SliderServiceImpl implements SliderService 
{
    protected $sliderRepository;


    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    public function getAll()
    {
        $slider = $this->sliderRepository->getAll();

        return $slider;
    }

    public function findById($id)
    {
        $slider= $this->sliderRepository->findById($id);

        return $slider;
    }

    public function create($request)
    {
        $slider = $this->sliderRepository->create($request);
        return $slider;
    }

    public function update($request, $id)
    {
        $slider = $this->sliderRepository->update($request, $id);

        return $slider;
    }

    public function destroy($id)
    {
        $slider = $this->sliderRepository->destroy($id);
        return $slider;
    }
    
    public function paginate()
    {
        $slider = $this->sliderRepository->paginate();
        return $slider;
    }
}