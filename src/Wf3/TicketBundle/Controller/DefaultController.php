<?php

namespace Wf3\TicketBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Wf3\TicketBundle\Entity\Ticket;
use Wf3\TicketBundle\Form\TicketType;

class DefaultController extends Controller
{
    public function homeAction(){
        $request = $this->getRequest();
        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        $params = array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
        return $this->render('Wf3TicketBundle:Default:home.html.twig', $params);
    }

    public function mainAction(Request $request){

        $ticket = new Ticket();
        $form = $this->createForm(new TicketType, $ticket);

        $this->handleCreateTicketForm($request, $form, $ticket);

        $params = array(
            "form" => $form->createView()
        );
        return $this->render('Wf3TicketBundle:Default:main.html.twig', $params);
    }

    public function currentTicketAction(){
        $repo = $this->getDoctrine()->getRepository("Wf3TicketBundle:Ticket");
        $currentTickets = $repo->getCurrentTickets();
        $params = array(
            "tickets" => $currentTickets
        );
        return $this->render('Wf3TicketBundle:Default:current_ticket.html.twig', $params);
    }


    public function markAsResolveAction(Request $request, $id){

        $repo = $this->getDoctrine()->getRepository("Wf3TicketBundle:Ticket");
        $ticket = $repo->find($id);

        if ($ticket){
            if (
                $this->getUser()->getUsername() == $ticket->getStudent() || 
                $this->get('security.context')->isGranted('ROLE_ADMIN')
                ){
                $ticket->setIsResolved(true);
                $ticket->setDateResolved(new \DateTime());

                $em = $this->getDoctrine()->getManager();
                $em->persist($ticket);
                $em->flush();
            }
        }

        if ($request->isXmlHttpRequest()){
            return new Response("ok");
        }
        else {
            return $this->redirect($this->generateUrl('wf3_ticket_main'));
        }
    }

    public function countResolvedAction(){
        $repo = $this->getDoctrine()->getRepository("Wf3TicketBundle:Ticket");
        $count = $repo->countResolved();
        return $this->render('Wf3TicketBundle:Default:count_resolved.html.twig', array("count" => $count));
    }

    public function countResolvedByDayAction(){
        $repo = $this->getDoctrine()->getRepository("Wf3TicketBundle:Ticket");
        $counts = $repo->countResolvedByDay();
        return $this->render('Wf3TicketBundle:Default:count_resolved_by_day.html.twig', array("counts" => $counts));
    }

    private function handleCreateTicketForm($request, $form, $ticket){
        $form->handleRequest($request);

        if ($form->isValid()){
            $user = $this->getUser();
            $username = $user->getUsername();
            $ticket->setStudent($username);

            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();

        }
    }
}
