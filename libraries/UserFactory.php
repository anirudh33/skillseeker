<?php
/*
 ************************** Creation Log *****************************
File Name                   -  Userfactory.php
Project Name                -  ulearn
Description                 -  Creates users according to type sent
Version                     -  1.0
Created by                  -  Anirudh Pandita
Created on                  -  April 4, 2013
* **************************** Update Log ********************************
*/




/* Creates users according to type sent */
class UserFactory
{

    /* Returns a user object depending on type received */
    public static function createUser ($type)
    {
        $baseClass = 'AUser';
        $targetClass = ucfirst($type);
        
        
        if (class_exists($targetClass) && is_subclass_of($targetClass, $baseClass)) {
            return new $targetClass();
        } else {
            throw new Exception("The User type '$type' is not recognized.");
        }
    }
}
?>