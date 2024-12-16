<?php

namespace Linxi\ExceptionHelper;

use Illuminate\Config\Repository;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Log;

class ExceptionHelper
{
    protected $session;
    protected $config;

    public function __construct(SessionManager $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
    }

    public function exceptionEcho($msg = '', $data = [], $level = 'INFO')
    {
        if (!empty($data) && $data instanceof \Exception) {
            $data = [
                'echoLog报错信息' => $data->getMessage(),
                'echoLog报错文件' => $data->getFile(),
                'echoLog报错行号' => $data->getLine(),
                '文件堆栈' => $data->getTraceAsString(),
            ];
        }
        $result['msg'] = $msg;
        if (!empty($data)) {
            $result['data'] = $data;
        }
        //记录日志
        Log::$level($msg, $result);

        //如果是error 级别，则飞书报警
        if ($level == 'error') {
            //飞书报警
            // 发飞书消息
        }

        if ($this->config->get('exception-helper.is_dump')) {//获取配置参数
            echo PHP_EOL . json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
        }
    }


}
