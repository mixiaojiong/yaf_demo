<?php
// yaf引导类，初始化app的时候，在启动应用前执行
// 所有以_init开头的函数都会被执行
class Bootstrap extends Yaf_Bootstrap_Abstract {
    // 设置本地类库路径, 如果不设置找不到
    public function _initLoader(Yaf_Dispatcher $dispathcer)
    {
        Yaf_Loader::getInstance()->registerLocalNamespace(
            array('Comm', 'Tool')
        );
    }
    // 默认路由规则，默认就挺好的
    public function _initRoute(Yaf_Dispatcher $dispatcher)
    {
        // 注册简单 || 兼容默认的
        $router = $dispatcher->getRouter();
        $route = new Yaf_Route_Simple('m', 'c', 'a');
        $router->addRoute('name', $route);
    }
    // 设置配置文件
    public function _initConfig()
    {
        $appConfig = Yaf_Application::app()->getConfig();
        Yaf_Registry::set('appconfig', $appConfig);
        // other config
        $config = new Yaf_Config_Ini($appConfig->get('application')->get('conf') . 'conf.ini');
        Yaf_Registry::set('config', $config);
    }
    // 设置默认路由名，也可以在config.ini中设置
    public function __initDefaultName(Yaf_Dispather $dispather)
    {
        $dispather->setDefaultModel('Index')->setDefaultController('Index')->setDefaultAction('index');
    }
    // 注册插件
    public function _initPlugin(Yaf_Dispatcher $dispatcher)
    {
		$defaultPlugin = new DefaultPlugin();
		$dispatcher->registerPlugin($defaultPlugin);

    }
    // 设置视图，smarty什么的
    public function _initView(Yaf_Dispatcher $dispathcer)
    {
    }

}


