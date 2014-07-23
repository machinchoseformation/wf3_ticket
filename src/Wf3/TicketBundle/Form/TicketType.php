<?php

namespace Wf3\TicketBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TicketType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('level', 'choice', array(
                    "label" => false,
                    "choices" => array(
                        "1"=>"Prioritaire",
                        "2"=>"Important",
                        "3"=>"Secondaire"
                    ),
                    "expanded" => true
                ))
            ->add('note', null, array(
                "required" => "false",
                "label" => "Commentaire ?"

                ))
            ->add('Envoyer la demande !', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wf3\TicketBundle\Entity\Ticket'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wf3_ticketbundle_ticket';
    }
}
