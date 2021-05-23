<?php
namespace App\Http\Controllers;
use App\Service;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ServiceController extends BaseController{
    public function detail($slug="",$id)
    {
        $service = Service::findOrFail($id);
        if ($slug !== $service->slug) {
            return redirect()->to($service->url);
        }
        return view('pages.service_detail_page')
            ->withService($service)
            ->withCanonical($service->url);
    }
}
