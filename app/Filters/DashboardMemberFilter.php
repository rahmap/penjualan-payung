<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class DashboardMemberFilter implements FilterInterface
{
  public function before(RequestInterface $request)
  {
    if (!session()->has('user_id')) {
      return redirect()->route('home');
    } else {
      if(session()->role != 'MEMBER'):
        return redirect()->route('home');
      endif;
    }
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response)
  {
    // Do something here
  }
}