<?php
namespace App\Http\Controllers\Admin;

use Xinyuan\Controller;

class CommonController extends Controller
{
    protected $checkLoginExclude = [];
    
    protected function initialize()
    {
        session_start();
        if (! isset($_SESSION['cms'])) {
            $_SESSION = ['cms' => []];
        }

        $action = $this->request->action();
        if (in_array($action, $this->checkLoginExclude)) {
            return;
        }

        if (empty($_SESSION['cms']['admin'])) {
            $this->redirect('/admin/login/index');
        } else {
            $user = $_SESSION['cms']['admin'];
            $this->assign(['user' => $user]);
        }
        if (!$this->request->isAjax()) {
            $this->display('admin/layout');
        }
    }
}