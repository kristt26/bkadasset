<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mylib
{
    /**
     *    @author K.Gautam
     *    @version 0.1
     *    @todo ability to add configuration.
     */

    public function hashing($password)
    {
        $pepper = "kristt26";
        $pwd_peppered = hash_hmac("sha256", $password, $pepper);
        return password_hash($pwd_peppered, PASSWORD_ARGON2ID);
    }
}
