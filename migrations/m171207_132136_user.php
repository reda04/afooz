<?php

use yii\db\Migration;

/**
 * Class m171207_132136_user
 */
class m171207_132136_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {$auth = Yii::$app->authManager;

          $user =  $auth->createRole('root');
          $auth->add($user);
          $user =  $auth->createRole('admin');
          $auth->add($user);
          $user =  $auth->createRole('manager');
          $auth->add($user);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171207_132136_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171207_132136_user cannot be reverted.\n";

        return false;
    }
    */
}
