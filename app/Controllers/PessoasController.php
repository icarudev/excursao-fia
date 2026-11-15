<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PessoasController extends BaseController
{
    public function index()
    {
        return view('pessoas/index');
    }
}
