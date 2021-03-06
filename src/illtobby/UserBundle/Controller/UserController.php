<?php

namespace illtobby\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $users = $em->getRepository('illtobbyUserBundle:User')->findAll();
        
        $res = 'Lista de usuarios: <br />';
        
        foreach($users as $user)
        {
            $res .= 'Usuario: ' .$user->getUsername() . ' -Email: ' . $user->getEmail() .'<br />';
        }
        
        return new Response($res);
    }
    
    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('illtobbyUserBundle:User');
        
        $user = $repository->find($id);
        
        return new Response('Usuario: ' . $user->getUsername() . ' con email: ' .$user->getEmail());
    }

     public function articlesAction($page)
    {
        return new Response('Este es mi articulo ' . $page);
    }
}
