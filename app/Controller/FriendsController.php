<?php
namespace Controller;


use \W\Controller\Controller;

class FriendsController extends Controller
{
    public function amis(){
        $usersModel = new \W\Model\UsersModel();
        $auth = new \W\Security\AuthentificationModel();

        $auth->refreshUser(); // actualise les données de l'utilisateur
        $loggedUser = $auth->getLoggedUser();

        if(!$loggedUser){
            $this->redirectToRoute('default_home');
        }

        $params = [];
        $params['listFriends'] = [];
        $params['success'] = [];
        $params['success']['search'] = false;
        $params['success']['add'] = false;
        $params['errors'] = [];
        $params['errors']['search'] = [];
        $params['errors']['add'] = [];

        $listFriends = explode(',', $loggedUser['friends']);

        if(!empty($_POST)){
            $post = array_map('trim', array_map('strip_tags', $_POST));

            if(isset($post['form'])){
                if($post['form'] == 'search'){
                    if(isset($post['search'])){
                        $search = [
                            'nickname' => $post['search']
                        ];

                        if($friends = $usersModel->search($search)){
                            $params['listFriends'] = $friends;
                            $params['success']['search'] = true;
                        }
                        else{
                            $params['errors']['search'][] = 'Aucain utilisateur trouver';
                        }
                    }
                }

                if($post['form'] == 'add'){
                    if(isset($post['friendadd']) && is_numeric($post['friendadd']) && $post['friendadd'] != $loggedUser['id']){
                        if(!in_array($post['friendadd'], $listFriends)){
                            if(!empty($loggedUser['friends'])){
                                $friends = $loggedUser['friends'].','.$post['friendadd'];
                            }
                            else{
                                $friends = $post['friendadd'];
                            }

                            $data = [
                                'friends' => $friends
                            ];

                            if($usersModel->update($data, $loggedUser['id'])){
                                $auth->refreshUser(); // actualise les données de l'utilisateur
                                $params['success']['add'] = true;

                                $params['pseudoFriendAdd'] = $usersModel->find($post['friendadd'])['nickname'];

                            }
                        }
                        else{
                            $params['errors']['add'][] = 'Déja amis';
                        }
                    }
                }
            }
        }

        $this->show('default/friends', $params);
    }
}
