<?php /* app/Model/BarModel.php */
namespace Model;
use \W\Model\ConnectionModel;

class PresentationModel extends \W\Model\Model 
{
	/* Le framework W déduit automatiquement le nom de la table de données en fonction di nom du modèle.
	Par exemple :
	- BarModel => bar
	*/

		public function __construct() {
	    $app = getApp();
	    // Définit la table en fonction de la config
	    $this->setTable($app->getConfig('presentation_table'));
	    $this->dbh = ConnectionModel::getDbh();
	}
}
