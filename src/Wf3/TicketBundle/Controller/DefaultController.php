<?php

namespace Wf3\TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Wf3\TicketBundle\Entity\Ticket;
use Wf3\TicketBundle\Form\TicketType;

class DefaultController extends Controller
{
    public function homeAction(){
        $params = array();
        return $this->render('Wf3TicketBundle:Default:home.html.twig', $params);
    }

    public function mainAction(Request $request){

        $ticket = new Ticket();
        $form = $this->createForm(new TicketType, $ticket);

        $this->handleCreateTicketForm($request, $form, $ticket);

        $params = array(
            "form" => $form->createView(),
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
        $ticket = $repo->findOneBy(array(
                "id" => $id,
                "student" => $this->getUser()->getUsername()
            ));

        if ($ticket){
            $ticket->setIsResolved(true);
            $ticket->setDateResolved(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();
        }

        if ($request->isXmlHttpRequest()){
            return new Response("ok");
        }
        else {
            return $this->redirect($this->generateUrl('wf3_ticket_main'));
        }
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
