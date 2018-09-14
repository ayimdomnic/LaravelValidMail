<?php
/**
 * Created by IntelliJ IDEA.
 * User: ayim
 * Date: 9/14/18
 * Time: 10:53 AM
 */

namespace Ayim\LaravelValidMail;


class LaravelValidMailService
{

    public function  validate($email)
    {
        $validator = new Validator();

        return $validator->validate($email);
    }
}