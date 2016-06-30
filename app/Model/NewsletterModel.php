<?php /* app/Model/BarModel.php */
    namespace Model;

    class NewsletterModel extends \W\Model\Model
    {
        public function __construct(){
            $app = getApp();
            // Définit la table en fonction de la config
            $this->setTable($app->getConfig('news_table'));
            $this->dbh = ConnectionModel::getDbh();
        }
    }
?>
