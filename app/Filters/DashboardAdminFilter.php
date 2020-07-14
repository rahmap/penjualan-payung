<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class DashboardAdminFilter implements FilterInterface
{
  public function before(RequestInterface $request)
  {
    if (!session()->has('user_id')) {
      return redirect()->route('admin_login');
    } else {
      if(session()->role != 'ADMIN'):
        return redirect()->route('admin_login');
      endif;
    }
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response)
  {
    // Do something here
  }
}