<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Xinyuan\Captcha;

class LoginController extends CommonController
{
    protected $checkLoginExclude = ['index', 'login', 'captcha', 'logout'];

    public function index()
    {
        return $this->fetch('admin/login');
    }

    public function login(User $user)
    {
        $username = $this->request->post('username', '');
        $password = $this->request->post('password', '');
        $captcha = $this->request->post('captcha', '');
        if(!$this->checkCaptcha($captcha)) {
            $this->error('登入失敗：驗證碼有誤');
        }
        
        $data = $user->where(['username' => $username])->first();
        if(!$data) {
            $this->error('用戶不存在');
        }
        if($data['password'] != $this->passwordMD5($password, $data['salt'])) {
            $this->error('用戶名或密碼不正確');
        }
        $this->setLogin(['id' => $data['id'], 'name' => $data['username']]);
        $this->success('登入成功');

    }

    protected function passwordMD5($password, $salt)
    {
        return md5(md5($password) . $salt);
    }

    protected function setLogin(array $user = [])
    {
        $_SESSION['cms']['admin'] = $user;
    }

    public function logout()
    {
        $this->setLogin([]);
        $this->redirect('/admin/login/index');
    }

    public function captcha(Captcha $captcha)
    {
        $captcha->create();
        $this->setCaptcha($captcha->getCode());
        $captcha->output();
    }

    protected function setCaptcha($code)
    {
        $_SESSION['cms']['captcha'] = $code;
    }

    protected function checkCaptcha($code)
    {
        if (isset($_SESSION['cms']['captcha'])) {
            $captcha = $_SESSION['cms']['captcha'];
            unset($_SESSION['cms']['captcha']);
            return strtolower($code) === strtolower($captcha);
        }
        return false;
    }
}