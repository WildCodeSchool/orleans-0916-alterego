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
        $users = $em->getRepository('ApplicationSonataUserBundle:User')->findAll();
        foreach($users as $user) {
            $reservations = $em->getRepository('AlterEgoBundle:Reservation')->findBy(array('user'=>$user, 'ispresent' => 1, 'noteCoach' => null, 'checkmail' => null));






            if ($reservations) {

                // envoie de mail

                $message = \Swift_Message::newInstance()
                    ->setSubject('Veuillez noter vos séances')
                    ->setFrom('mail@site.fr')
//                    ->setTo('guillaumecuriel@gmail.com')
                    ->setTo($user->getEmail())
                    ->setBody(
                        $this->getContainer()->get('templating')->render(
                            'AlterEgoBundle:Default:mail.html.twig',
                            array('user'=>$user,
                                'reservations' => $reservations
                            )

                        ),
                        'text/html'
                    );


                $this->getContainer()->get('mailer')->send($message);

                $mailer = $this->getContainer()->get('mailer');
            }

            foreach ($reservations as $reservation) {
                $reservation->setCheckmail(1);
                $em->persist($reservation);
            }
            $em->flush();


//        $transport = $mailer->getTransport();
//        if ($transport instanceof Swift_Transport_SpoolTransport) {
//            $spool = $transport->getSpool();
//            $sent = $spool->flushQueue($this->getContainer()->get('swiftmailer.transport.real'));
        }
    }
}

