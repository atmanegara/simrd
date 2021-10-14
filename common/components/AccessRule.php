<?php
 
namespace common\components;
 
use common\models\User;
class AccessRule extends \yii\filters\AccessRule {
 
    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role == '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } 
//            if ($role == User::ROLE_ADMIN_PTSP){ //|| $role == User::ROLE_ADMIN_BPPRD || $role == User::ROLE_SUPER_ADMIN) {
//                if (!$user->getIsGuest()) {
//                    return true;               
//                    
//                }
//            }
             if ($role == User::ROLE_GUEST){ //|| $role == User::ROLE_ADMIN_BPPRD || $role == User::ROLE_SUPER_ADMIN) {
                if (!$user->getIsGuest()) {
                    return true;               
                    
                }
             }
 // Check if the user is logged in, and the roles match
           
            if (!$user->getIsGuest() && $role == $user->identity->role) {
                return true;
            }
        }
 
        return false;
    }
}