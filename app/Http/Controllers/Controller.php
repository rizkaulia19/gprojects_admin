<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Controller extends BaseController
{
    private array $dataView;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string $viewName 
     * @param array $data 
     * @return View 
     * @throws BindingResolutionException 
     */

    public function setDataView(array $data = []): void
    {
        $this->dataView = $data;
    }

    protected function returnView(string $viewName): View
    {
        return view($viewName, $this->dataView);
    }
}
