<?php
namespace AppBundle\Controller;

use AppBundle\Entity\CronTask;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/crontasks")
 */
class CronTaskController extends Controller
{
    /**
     * @Route("/cron", name="cronjobs")
     */
    public function cronAction()
    {
        $entity = new CronTask();

        $entity
            ->setName('Clearing Cache Example')
            ->setInterval(3600) // Run once every hour
            ->setCommands(array(
                'cache:clear'
            ));

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();

        return new Response('OK!');
    }
}