<?php
namespace common\components;


use Yii;
use yii\web\User;
use yii\base\Module;
use yii\di\Instance;
use yii\base\ActionFilter;
use yii\web\ForbiddenHttpException;

/*
@ref https://github.com/mdmsoft/yii2-admin/blob/master/components/AccessControl.php
*/

class ProfileFilter extends ActionFilter
{
        /**
     * @var User User for check access.
     */
    private $_user = 'user';
    /**
     * @var array List of action that not need to check access.
     */
    public $allowActions = [];

    /**
     * Get user
     * @return User
     */
    public function getUser()
    {
        if (!$this->_user instanceof User) {
            $this->_user = Instance::ensure($this->_user, User::className());
        }
        return $this->_user;
    }

    /**
     * Set user
     * @param User|string $user
     */
    public function setUser($user)
    {
        $this->_user = $user;
    }

    public function beforeAction($action)
    {
        $actionId = $action->getUniqueId();
        $user = $this->getUser();
        if(!$user->getIsGuest()){
            if(empty($user->identity->profile->hcode)){
                Yii::$app->session->setFlash('warning', 'คุณยังไม่ได้กรอกข้อมูลส่วนตัวและโรงพยาบาลที่สังกัด!..');
                Yii::$app->getResponse()->refresh();
                Yii::$app->getResponse()->redirect(['/user/settings/profile']);
                return false;
            }
        }

        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    protected function isActive($action)
    {
        $uniqueId = $action->getUniqueId();
        if ($uniqueId === Yii::$app->getErrorHandler()->errorAction) {
            return false;
        }

        $user = $this->getUser();

        if ($this->owner instanceof Module) {
            // convert action uniqueId into an ID relative to the module
            $mid = $this->owner->getUniqueId();
            $id = $uniqueId;
            if ($mid !== '' && strpos($id, $mid . '/') === 0) {
                $id = substr($id, strlen($mid) + 1);
            }
        } else {
            $id = $action->id;
        }

        foreach ($this->allowActions as $route) {
            if (substr($route, -1) === '*') {
                $route = rtrim($route, "*");
                if ($route === '' || strpos($id, $route) === 0) {
                    return false;
                }
            } else {
                if ($id === $route) {
                    return false;
                }
            }
        }

        if ($action->controller->hasMethod('allowAction') && in_array($action->id, $action->controller->allowAction())) {
            return false;
        }

        return true;
    }
}