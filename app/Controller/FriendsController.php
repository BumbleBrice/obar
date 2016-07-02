<?php
namespace Controller;


use \W\Controller\Controller;

class FriendsController extends Controller
{
    public function amis(){
        $usersModel = new \W\Model\UsersModel();
        $auth = new \W\Security\AuthentificationModel();

        $loggedUser = $auth->getLoggedUser();

        $auth->refreshUser(); // actualise les données de l'utilisateur

        $params = [];
        $params['listUsers'] = $usersModel->findall();
        $listFriends = explode(',', $loggedUser['friends']);
        $params['listFriends'] = $listFriends;


        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));

            if(isset($post['amiselect']) && is_numeric($post['amiselect']) && !in_array($post['amiselect'], $listFriends)){
                if(!empty($loggedUser['friends'])){
                    $friends = $loggedUser['friends'].','.$post['amiselect'];
                }
                else{
                    $friends = $post['amiselect'];
                }

                $data = [
                    'friends' => $friends
                ];

                $usersModel->update($data, $loggedUser['id']);
                $auth->refreshUser(); // actualise les données de l'utilisateur
            }
        }

        $this->show('default/friends', $params);
    }
}
