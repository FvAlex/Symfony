<?php

namespace App\Controller;

use App\Entity\SchoolYearB;
use App\Form\SchoolYearBType;
use App\Repository\SchoolYearBRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/school/year/b")
 */
class SchoolYearBController extends AbstractController
{
    /**
     * @Route("/", name="school_year_b_index", methods={"GET"})
     */
    public function index(SchoolYearBRepository $schoolYearBRepository): Response
    {
        return $this->render('school_year_b/index.html.twig', [
            'school_year_bs' => $schoolYearBRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="school_year_b_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $schoolYearB = new SchoolYearB();
        $form = $this->createForm(SchoolYearBType::class, $schoolYearB);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($schoolYearB);
            $entityManager->flush();

            return $this->redirectToRoute('school_year_b_index');
        }

        return $this->render('school_year_b/new.html.twig', [
            'school_year_b' => $schoolYearB,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="school_year_b_show", methods={"GET"})
     */
    public function show(SchoolYearB $schoolYearB): Response
    {
        return $this->render('school_year_b/show.html.twig', [
            'school_year_b' => $schoolYearB,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="school_year_b_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SchoolYearB $schoolYearB): Response
    {
        $form = $this->createForm(SchoolYearBType::class, $schoolYearB);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('school_year_b_index');
        }

        return $this->render('school_year_b/edit.html.twig', [
            'school_year_b' => $schoolYearB,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="school_year_b_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SchoolYearB $schoolYearB): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schoolYearB->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($schoolYearB);
            $entityManager->flush();
        }

        return $this->redirectToRoute('school_year_b_index');
    }
}
