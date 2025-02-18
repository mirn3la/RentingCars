<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class UserAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session('logged_in'))
            return redirect()->to(site_url('login'));
        elseif (session('user')->role == "a")
            return redirect()->to(site_url('user/unauthorized'));
}
public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
?>