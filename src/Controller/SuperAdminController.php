<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\EditUserType;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/super_admin", name="app_super_admin_")
 */
class SuperAdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('super_admin/index.html.twig', [
            'controller_name' => 'SuperAdminController',
            ]);
        }
    /**
     * Liste les utilisateurs du site
     * @Route("/utilisateurs", name="app_utilisateurs")
     */
    public function usersList(UsersRepository $users){
        return $this->render("super_admin/users.html.twig",[
            'users' => $users ->findALL()
        ]);
    }

    /**
     * Modifier un utilisateur
     * 
     * @Route("/utilisateur/edit/{id}", name="app_edit_utilisateur")
     */
    public function editUser(Users $user, Request $request){
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);
        
        if($form ->isSubmitted()&& $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager ->persist($user);
            $entityManager ->flush();
            
            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('app_super_admin_app_utilisateurs');
        }
        return $this->render('/super_admin/edituser.html.twig', [
            'userForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/utilisateur/del/{id}", name="app_delete_utilisateur")
     */
    public function deleteUtilisateur($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(Users::class)->find($id);
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_super_admin_app_utilisateurs');
}
    

}
