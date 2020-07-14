<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class DashboardFilter implements FilterInterface
{
  public function before(RequestInterface $request)
  {
    if (!session()->has('user_id')) {
      return redirect()->route('home');
    }
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response)
  {
    // Do something here
  }
}