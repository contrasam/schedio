<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PradeepSamuel
 * Date: 07/11/13
 * Time: 6:51 PM
 * To change this template use File | Settings | File Templates.
 */

class WebUser extends CWebUser{
    public function checkAccess($operation, $params=array())
    {
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        $role = $this->getState("roles");

        if ($role === 'ADMIN') {
            return true; // admin role has access to everything
        }
        // allow access if the operation request is the current user's role
        return ($operation === $role);
    }
}