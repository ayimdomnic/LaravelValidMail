<?php
/**
 * Created by IntelliJ IDEA.
 * User: ayim
 * Date: 9/14/18
 * Time: 11:12 AM
 */

namespace Ayim\LaravelValidMail\Facades;


use Illuminate\Support\Facades\Facade;

class ValidMail extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LaravelValidMailService';
    }
}