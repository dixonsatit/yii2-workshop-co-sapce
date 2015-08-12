<?php
namespace console\controllers;

use common\models\User;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        /**
         * ********** Permission ****************************
         */

        $loginToBackend = $auth->createPermission('loginToBackend');
        $loginToBackend->description = 'ยอมให้เข้าใช้งานหลังบ้าน';
        $auth->add($loginToBackend);

        $report1 = $auth->createPermission('Report1');
        $report1->description = 'ดูรายงานส่วนที่ 1';
        $auth->add($report1);





        /**
         * ********** Role ****************************
         */
        $user = $auth->createRole('User');
        $auth->add($user);
        $auth->addChild($user,$report1);

        $manager = $auth->createRole('Manager');
        $auth->add($manager);

        $provinceial = $auth->createRole('Provinceial');
        $auth->add($provinceial);

        $country = $auth->createRole('Country');
        $auth->add($country);

        $reports = $auth->createRole('Reports');
        $auth->add($reports);

        $administrator = $auth->createRole('Administrator');
        $auth->add($administrator);

        /**
         * ********** addChild ****************************
         */
        $auth->addChild($administrator,$user);
        $auth->addChild($administrator,$manager);
        $auth->addChild($manager,$user);
        $auth->addChild($administrator,$provinceial);
        $auth->addChild($administrator,$country);
        $auth->addChild($administrator,$reports);

        $auth->addChild($administrator,$loginToBackend);



        /**
         * ********** Assignment ****************************
         */
        $auth->assign($administrator, 1);
        $auth->assign($user, 2);
        $auth->assign($manager, 3);

        Console::output('Success! RBAC roles has been added.');
    }
}
