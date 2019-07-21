<?php

namespace App\Controller;

use App\Entity\UserTenant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
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

        return $this->render('home/index.html.twig');
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
