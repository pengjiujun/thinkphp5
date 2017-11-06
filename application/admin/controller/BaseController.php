<?php
/**
 * Created by PhpStorm.
 * User: chen
 * Date: 17-11-5
 * Time: 下午9:52
 */

namespace app\admin\controller;


use app\admin\model\User;
use think\Controller;

class BaseController extends Controller
{
    public function _initialize()
    {
        $isLogined = User::isLogined();
        if ($this->needLogin && !$isLogined) {
            $this->redirect('login/index');
            exit();
        }

        $adm_uid = session('adm_uid');

        if($adm_uid == 1) {
            return true;
        }

        $module = $this->request->module();
        $controller = $this->request->controller();
        $action = $this->request->action();

//        $auth = new Auth();
//        $result = $auth->check($module.'/'.$controller.'/'.$action, $adm_uid);
//        if(!$result) {
//            $this->error('你没有该操作权限！');
//        }
    }

    protected $needLogin = true;
}