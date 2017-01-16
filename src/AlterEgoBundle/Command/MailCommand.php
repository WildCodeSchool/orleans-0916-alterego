<?php

namespace AlterEgoBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MailCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('alterego:envoi-mail')
            ->setDescription('Envoie de mail')
            ->setHelp('Cette commande envoie un email');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->Writeln(['TEST COMMANDE']);
        $output->Writeln(['--------------']);
        $em = $this->getContainer()->get('doctrine')->getManager();
        $seance = $em->getRepository('AlterEgoBundle:Reservation')->findBy(['user' => $user, 'ispresent' => 1]);

        // envoie de mail

        $message = \Swift_Message::newInstance()
            ->setSubject('sujet')
            ->setFrom('mail@site.fr')
            ->setTo(guillaumecuriel@gmail.com->getEmail())
          //  ->setTo($user->getEmail())
            ->setBody(
                $this->getContainer()->get('templating')->render(
                    'AlterEgoBundle:Default:mail.html.twig',
                    array('reservations'=>$reservations)

                ),
                'text/html'
            );


        $this->getContainer()->get('mailer')->send($message);

        $mailer = $this->getContainer()->get('mailer');

        $transport = $mailer->getTransport();
        if ($transport instanceof Swift_Transport_SpoolTransport) {
            $spool = $transport->getSpool();
            $sent = $spool->flushQueue($this->getContainer()->get('swiftmailer.transport.real'));

    }
}
