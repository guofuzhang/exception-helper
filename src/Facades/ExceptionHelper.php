<?php

namespace Linxi\ExceptionHelper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Desc:
 * User: zhangguofu@douyuxingchen.com
 * Date: 2024/12/16 11:11
 * Class ExceptionHelper
 * @package Linxi\ExceptionHelper\Facades
 * @version V1.0
 *
 *  * 输出异常信息并报警
 * @method static exceptionEcho($msg = '', $data = [], $level = 'INFO')
 */
class ExceptionHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'exception-helper';
    }
}
