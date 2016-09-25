<?php
Class IndexController extends Yaf_Controller_Abstract {
    // 换一种action写法
    public $actions = array(
        'change' => 'actions/index/Change.php',
    );

    // 不支持构造函数， 会报错
    /*
    public function __construct() {
        echo "this is construct".PHP_EOL;
    }
     */
    // 构造函数的正确姿势
    public function init() {
        Yaf_Dispatcher::getInstance()->disableView();
        echo "this is init<br>";
    }
    public function indexAction() {
        Yaf_Dispatcher::getInstance()->enableView();
        $this->getView()->assign("content", "Hello World");
    }
    // 获取配置和对象表
    // 存储全局的配置(不需要多次加载配置文件，读取配置文件)
    // 存储全局的引用对象, 上下文
    // 在任何地方都可以使用
    // 一般会自行封装一下get和set
    public function getIniAction() {
        // 一般我们php程序员不习惯读取对象，所以贴心的鸟哥给我们一个toArray()方法
        $configObj = Yaf_Registry::get('config')->get();
        // 数组模式
        $configArr = Yaf_Registry::get('appconfig')->get()->toArray();
        // 读取一个临时的配置, 之前没有加载的
        $config = new Yaf_Config_Ini($configArr["application"]["conf"]. 'env.ini');
        Yaf_Registry::set('env', $config);
        $configEnv = Yaf_Registry::get('env')->get()->toArray();
        // 从Context_Plugin 中获取$_SERVER中的值, has函数判断是否存在, 还有del用于删除
        if (Yaf_Registry::has('server')) {
            $server = Yaf_Registry::get('server');
        }
        Comm_Tools::Trace($configObj, $configArr, $configEnv, $server);
    }

    // 服务器抛500，一般连接不上mysql神马的,
    // 即使上面没有catch，yaf的全局异常模式也会给你捕捉到
    public function serverErrAction() {
        // 建议用Yaf_Exception
		throw new Yaf_Exception('mysql connect faild');
    }

    // 常用参数获取，注意这里你重新给$_GET/$_POST赋值
    // 不会影响$request->getQuery()的结果
    // 也就是说$_GET/$_POST的结果
    public function paramAction() {
        $request = $this->getRequest();
        echo "<pre>";
        echo "getRequestUri".PHP_EOL;
        var_dump($request->getRequestUri());     //   输出：/test/test
        echo "getBaseUri".PHP_EOL;
        var_dump($request->getBaseUri());        //   输出：''
        echo "getMethod".PHP_EOL;
        var_dump($request->getMethod());         //   输出GET
        echo "getPost".PHP_EOL;
        var_dump($request->getPost());           //
        echo "getQuery".PHP_EOL;
        var_dump($request->getQuery());          //   输出: array()
        echo "getParam".PHP_EOL;
        var_dump($request->getParam('id'));      //   输出：NULL
        echo "getParams".PHP_EOL;
        var_dump($request->getParams());         //   输出：array()
        $_GET["aaa"] = "bbb";
        echo "重新赋值GET".PHP_EOL;
        var_dump($request->getQuery());          //   输出: array()
    }

    // 导入第三方文件，比如sdk, 官方体检替换require_once
    public function testImportAction() {
        Yaf_Loader::import(APP_PATH.'/sdk/demo.php');
        $demoSdkObj = new Demo_sdk();
        $demoSdkObj->run();
    }

    // 内部跳转, 官方示例中放在init中的场景比较合适，这里是为了突出说明
    public function forwardAction() {
        print_r($_GET);
        // 如果跳转以后解析来的代码不执行。切记后面要加return !!!!
        $this->forward("test", "index", array("from" => "forward"));
        //return false;
        echo "this is forwardAction<br>";
        sleep(2);
        echo "sleep finish<br>";
    }

    // redirect
    public function redirectAction() {
        // 如果跳转以后解析来的代码不执行。切记后面要加return !!!!
        $this->redirect("http://yaf.me:8080/test/index");
        //return false;
        echo "this is redirectAction<br>";
        sleep(2);
        echo "sleep finish<br>";
    }
    // composer
    public function composerAction() {
        Yaf_Loader::import(APP_PATH.'/vendor/autoload.php');
        $hello = new Xiaojiong\Demo\Hello();
        echo $hello->hello().PHP_EOL;
        echo "<br>";
        $hiGirl = new Xiaojiong\Demo\Hello('My Goddess');
        echo $hiGirl->hello();
    }
    // 全局类库
    public function gloAction() {
        echo Glo_Ip::GetClientIp();
    }
    // 读取model数据
    public function getUserInfoAction() {
        $userModel = new UserModel();
        $userInfo = $userModel->getUserInfo();
        print_r($userInfo);
    }
    public function dynamicRouteAction() {
        echo "dy";
    }
}
