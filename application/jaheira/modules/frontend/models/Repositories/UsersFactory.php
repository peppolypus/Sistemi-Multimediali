<?php
class Frontend_Model_Repositories_UsersFactory
{
    protected static $_repository;

    public static function setRepository($repository)
    {
        self::$_repository = $repository;
    }

    public static function factory()
    {
        if(self::$_repository !== null)
        {
            return self::$_repository;
        }
        
        $user_entity = new Frontend_Model_Entities_User();
        return new Frontend_Model_Repositories_Users($user_entity);
    }
}
