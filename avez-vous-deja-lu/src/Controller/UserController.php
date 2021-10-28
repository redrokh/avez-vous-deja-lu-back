<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/backoffice/user", name="backoffice_user_")
 */
class UserController extends AbstractController
{
    /**
     * method which list users
     * 
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(UserRepository $userRepository): Response
    {
        // transfert informations to the view
        return $this->render('user/browse.html.twig', [
            'user_list' => $userRepository->findAll()
        ]);
    }

    /**
     * method which read one user
     * 
     * @Route("/read/{id}", name="read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read($id, UserRepository $userRepository): Response
    {
        // transfert informations to the view
        return $this->render('user/read.html.twig', [
            'user' => $userRepository->find($id),
        ]);
    }

    /**
     * method which edit one user
     * 
     * @Route("/edit/{id}", name="edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        // Create a form for user edition
        $userForm = $this->createForm(UserType::class, $user);

        // Handle listener for user form
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            // If the form is submitted and valid
            // Use EntityManager
            $entityManager = $this->getDoctrine()->getManager();

            $user->setUpdatedAt(new DateTimeImmutable());

            $clearPassword = $request->request->get('user')['password'];
            // if password is submitted
            if (! empty($clearPassword))
            {
                // hash password user
                $hashedPassword = password_hash($clearPassword ,PASSWORD_BCRYPT);
                $user->setPassword($hashedPassword);
            }
            //EntityManager edit the user object in database
            $entityManager->flush();

            // Post a flash message in the view
            $this->addFlash('success', "The user `{$user->getPseudo()}` is update");

            // Redirection after update
            return $this->redirectToRoute('backoffice_user_browse');
        }

        // Transfert the form to the view
        return $this->render('user/add.edit.html.twig', [
            'user_form' => $userForm->createView(),
            'user' => $user,
        ]);
    }

    /**
     * method which add one user
     * 
     * @Route("/add", name="add", methods={"GET", "POST"})
     */
    public function add(Request $request): Response
    {
        $user = new user();

        // Create a virgin form (because the object is empty)
        $userForm = $this->createForm(UserType::class, $user);

        // Handle listerner for user form
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {
            // If the form is submitted and valid
            // Use EntityManager
            $entityManager = $this->getDoctrine()->getManager();
            
            $clearPassword = $request->request->get('user')['password'];
            // if password is submitted
            if (! empty($clearPassword))
            {
                // hash password user
                $hashedPassword = password_hash($clearPassword ,PASSWORD_BCRYPT);
                $user->setPassword($hashedPassword);
            }

            // Persist the new object user
            $entityManager->persist($user);
            //EntityManager edit the user object in database
            $entityManager->flush();

            // Post a flash message in the view
            $this->addFlash('success', "User `{$user->getPseudo()}` created successfully");

            // redirection
            return $this->redirectToRoute('backoffice_user_browse');
        }

        // Transfert the form to the view
        return $this->render('user/add.edit.html.twig', [
            'user_form' => $userForm->createView(),
        ]);
    }

    /**
     * method which delete one user
     * 
     * @Route("/delete/{id}", name="delete", methods={"GET"})
     */
    public function delete(User $user, EntityManagerInterface $entityManager): Response
    {
        // Post a flash message in the view
        $this->addFlash('success', "User {$user->getId()} deleted successfully");

        // Delete the anecdote
        $entityManager->remove($user);
        //EntityManager delete the anecdote object in database
        $entityManager->flush();

        // Redirection after delete
        return $this->redirectToRoute('backoffice_user_browse');
    }
}
