<?php

class TheCollectiveMind_Listener_SpoilerBbCode
{
    /**
     * [listen description]
     * 
     * @param string $class   Name of class to listen for
     * @param array  &$extend [description]
     *
     * @return void
     */
    public static function listen($class, array &$extend)
    {
        if ($class == 'XenForo_BbCode_Formatter_Base') {
            $extend[] = 'TheCollectiveMind_BbCode_Formatter';
        }
    }
}