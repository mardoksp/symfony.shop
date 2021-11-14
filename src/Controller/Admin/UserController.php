<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\Admin\EditUserFormType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/user", name="admin_user_")
 */

class UserController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function list(UserRepository $userRepository): Response
    {
        $users = $userRepository->findBy(['isDeleted' => false], ['id' => 'DESC']);

        return $this->render('admin/user/list.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     * @Route("/add", name="add")
     */
    public function edit(Request $request, User $user = null): Response
    {

        if (!$user) {
            $user = new User();
        }

        $form = $this->createForm(EditUserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dd($user);
            /*
            $category = $categoryFormHandler->processEditForm($editCategoryModel);

            $this->addFlash('success', 'Your changes were saved!');
*/
            return $this->redirectToRoute('admin_user_edit', ['id' => $user->getId()]);
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('warning', 'Something went wrong. Please check your form!');
        }

        return $this->render('admin/category/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(User $user, CategoryManager $categoryManager): Response
    {
        /*$categoryManager->remove($category);

        $this->addFlash('warning', 'This category has been successfully deleted!');
*/
        return $this->redirectToRoute('admin_category_list');
    }
}
