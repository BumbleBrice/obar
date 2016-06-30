<?php /* app/Model/BarModel.php */
    namespace Model;
    use \W\Model\ConnectionModel;

    class newsModel extends \W\Model\Model
    {
            public function __construct(){
            $app = getApp();
            // Définit la table en fonction de la config
            $this->setTable($app->getConfig('news_table'));
            $this->dbh = ConnectionModel::getDbh();
        }
    }
?>
