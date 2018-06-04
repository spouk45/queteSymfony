<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 28/05/18
 * Time: 15:13
 */

namespace AppBundle\Service;


use AppBundle\Entity\User;
use Swift_RfcComplianceException;
use Psr\Log\LoggerInterface;
use Swift_Mailer;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;


class Mailer
{

    const RESERVATION = 'Réservation Flyaround';
    private $mailer;
    private $templating;

    /**
     * Mailer constructor.
     * @param \Swift_Mailer $mailer
     * @param \Twig_Environment $templating
     */
    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    /**
     * @param User $user
     * @param string $title
     * @param $body
     */
    public function sendMail(User $user, $title = self::RESERVATION , $body)
    {
        $template  = $this->templating->render('email/reservation.html.twig',['body'=> $body]);
        $message = (new \Swift_Message($title))
            ->setFrom('spouk45@gmail.com')
            ->setTo($user->getEmail())
            ->setBody($template,'text/html');
            $this->mailer->send($message);

    }


}


