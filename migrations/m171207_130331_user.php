
<?php

use yii\db\Migration;

/**
 * Class m171207_120001_init_rbac
 */
class m171207_130331_user  extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

$auth = Yii::$app->authManager;

         $auth = Yii::$app->authManager;

        $auth->removeAll();
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
         $auth = Yii::$app->authManager;

        $auth->removeAll();

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171207_120001_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
