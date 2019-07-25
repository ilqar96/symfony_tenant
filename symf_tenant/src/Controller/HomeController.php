<?php

namespace App\Controller;

use App\Entity\UserTenant;
use App\Repository\UserTenantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {

//        dd($request->getSession()->get('tenantId'));

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/tenant/add", name="new_company")
     */
    public function newCompany(EntityManagerInterface $em)
    {
        $tenant = new UserTenant();
        $tenant->setUser($this->getUser());
        $tenant->setTenantId(rand(999999,100000000));

        $em->persist($tenant);
        $em->flush();


        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/members", name="members")
     */
    public function membersOfCompany(UserTenantRepository $userTenantRepository,Request $request)
    {

        $users = $userTenantRepository->findBy(['tenantId'=>$request->getSession()->get('tenantId')]);


        return $this->render('home/members.html.twig', [
            'users' => $users,
        ]);
    }




    /**
     * @Route("/tenant/change/{id}", name="change_tenant")
     */
    public function changeTenant($id,SessionInterface $session)
    {
        $session->set('tenantId', $id);

        return $this->redirectToRoute('home');
    }

}
