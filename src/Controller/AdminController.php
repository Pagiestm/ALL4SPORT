<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{

    /**
     * @IsGranted("ROLE_ADMIN")
     * Panel de l'administrateur
     * 
     * @Route("/admin", name="app_panel")
     */
    public function Panel(UserRepository $users)
    {
        return $this->render("admin/panel.html.twig", [
            'users' => $users->findAll()
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * Liste des utilisateurs du site 
     * 
     * @Route("/admin/utilisateurs", name="app_utilisateurs")
     */
    public function usersList(UserRepository $users)
    {
        return $this->render("admin/users.html.twig", [
            'users' => $users->findAll()
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * Modifier un utilisateur
     * 
     * @Route("/admin/modifierUtilisateur/{id}", name="app_modifierUtilisateurs")
     */
    public function editUser(User $user, Request $request, ManagerRegistry $doctrine)
    {
        $form = $this->createForm(EditUserType::class, $user);

        $manager = $doctrine->getManager();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user->setDateInscription(new \DateTime());
            $manager->persist($user);
            $manager->flush();

            $this->addFlash('message', 'Utilisateur modifié avec succès');
            return $this->redirectToRoute('app_utilisateurs');
        }

        return $this->render('admin/editUser.html.twig', [
            'userForm' => $form->createView()
        ]);
    }
}
