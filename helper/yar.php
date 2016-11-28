<?php

/*
YAR在php.ini中的设置：

yar.packager 设置Yar的打包工具, 可以是PHP(serialize), JSON, Msgpack(这个需要编译的时候指定--enable-msgpack).
yar.debug 打开的时候, Yar会把请求过程的日志都打印出来(到stderr).
yar.connect_timeout 连接超时(毫秒为单位)
yar.timeout 处理超时(毫秒为单位)
yar.expose_info 如果关闭, 则当通过浏览器访问Server的时候, 不会出现Server Info信息.
 */
const YAR_VERSION = '2.0.1';
const YAR_CLIENT_PROTOCOL_HTTP = 1;
const YAR_PACKAGER_PHP = 'PHP';
const YAR_PACKAGER_JSON = 'JSON';
const YAR_ERR_OKEY = 0;
const YAR_ERR_OUTPUT = 8;
const YAR_ERR_TRANSPORT = 16;
const YAR_ERR_REQUEST = 4;
const YAR_ERR_PROTOCOL = 2;
const YAR_ERR_PACKAGER = 1;
const YAR_ERR_EXCEPTION = 64;

class Yar_Server
{
    /**
     *  创建一个Yar的HTTP RPC服务，参数 $obj 对象的所有公开方法都会被注册为服务函数， 可以被RPC调用。
     * @param object $obj 一个对象实例, 这个对象的所有公开方法都会被注册为服务函数.
     */
    public function __construct($obj)
    {
    }

    /**
     *  启动服务, 开始接受客户端的调用请求.
     *  来自客户端的调用, 都是通过POST请求发送过来的.
     *  如果一个GET请求访问到这个Server, 那在yar.expose_info开启的情况下, 这个服务的Server Info信息会被展现.
     */
    public function handle()
    {
    }
}

class  Yar_Client
{
    protected $_protocol;
    protected $_uri;
    protected $_options;
    protected $_running;


    /**
     * 创建一个Yar_Client 到一个 Yar_Server的实例.
     * @param string $url 服务端的HTTP URL路径.
     */
    public function __construct(string $url)
    {
    }

    /**
     * 当访问某个action时触发，此时的action实际上是创建Yar_Server传入的类中的一个方法
     * 发起一个RPC调用, 并且得到返回值. 如果服务端的远程调用抛出异常, 那么本地也会相应的抛出一个Yar_Server_Exception异常.
     * @param string $method 远程服务的名字
     * @param array $parameters 调用参数
     */
    public function __call(string $method, array $parameters)
    {
    }

    /**
     *  设置调用远程服务的一些配置, 比如超时值, 打包类型等.
     * @param number $name 可以是:
     * YAR_OPT_PACKAGER,
     * YAR_OPT_PERSISTENT (需要服务端支持keepalive),
     * YAR_OPT_TIMEOUT 运行超时
     * YAR_OPT_CONNECT_TIMEOUT 连接超时
     * @param $value
     */
    public function setOpt(number $name, $value)
    {

    }
}

class  Yar_Concurrent_Client
{
    static $_callstack;
    static $_callback;
    static $_error_callback;

    /**
     * 注册一个并行的(异步的)远程服务调用,
     * 不过这个调用请求不会被立即发出, 而是会在接下来调用 Yar_Concurrent_Client::loop()的时候才真正的发送出去.
     * @param string $uri RPC 服务的 URI(http 或 tcp).
     * @param string $method 调用的服务名字(也就是服务方法名)
     * @param array $parameters 调用的参数，按顺序被$method接收，若数组元素少于$method的参数，则参数值为null
     * @param callable $callback 回调函数, 在远程服务的返回到达的时候被Yar调用, 从而可以处理返回内容
     * @return int  唯一 ID， 可用于区分到底是那个调用的返回.
     */
    public static function call(string $uri, string $method, array $parameters, callable $callback = null)
    {
        /**
         * 若需要签名，则签名串放在$parameters中
         */
        return 0;
    }

    /**
     *  发送所有的已经通过 Yar_Concurrent_Client::call()注册的并行调用, 并且等待返回.
     * @param callable $callback 如果这个回掉函数被设置, 那么Yar在发送出所有的请求之后立即调用一次这个回掉函数(此时还没有任何请求返回),
     * 调用的时候$callinfo参数是NULL.
     *  如果在注册并行调用的时候制定了callback, 那么那个callback有更高的优先级.
     * @param callable $error_callback 错误回掉函数, 如果设置了, 那么Yar在出错的时候会调用这个回掉函数.
     * @return bool
     */
    public static function loop(callable $callback = null, callable $error_callback = null)
    {
        /**
         * $callback 若不提供，则得到数据时会echo这个值，所以要么保证返回的是字串或数字而不能是数组，要么至少提供一个空的回调
         * $error_callback 若不提供，出错时仍会显示，但若提供了，则是否显示由这个回调决定，所以也可以是个空回调
         */
        return true;
    }

    /**
     * 清除所有已注册的call
     */
    public static function reset()
    {
    }
}

class  Yar_Server_Exception extends Exception
{
    protected $_type;

    public function getType()
    {
    }
}


class  Yar_Client_Exception extends Exception
{
    protected $_type;

    public function getType()
    {
    }
}

