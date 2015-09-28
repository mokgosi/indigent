<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * PaymentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PaymentRepository extends EntityRepository
{

    public function findAll()
    {
        return $this->getEntityManager()
                        ->createQuery('SELECT p FROM AppBundle:Payment p ORDER BY p.updated DESC')
                        ->setMaxResults(100)
                        ->getResult();
    }

    public function getCurrentBalance($erfId)
    {
        $results = $this->getEntityManager()
                ->createQuery(
                        'SELECT p FROM AppBundle:Payment p '
                        . 'WHERE p.erfId = :erf_id '
                        . 'ORDER BY p.created DESC')
                ->setParameter('erf_id', $erfId)
                ->setMaxResults(1)
                ->getOneOrNullResult();

        return $results;
    }

    public function updateCurrentBalance($id, $balance)
    {
        $qb = $this->getEntityManager()->createQueryBuilder('AppBundle:Erf');

        $qb->update('AppBundle:Erf e')
                ->set('e.balance', ':balance')
                ->where('e.id = :id')
                ->setParameter('id', $id)
                ->setParameter('balance', $balance)
                ->getQuery()
                ->execute();
    }

    public function getRecent()
    {
        $results = $this->getEntityManager()
                ->createQuery('SELECT p FROM AppBundle:Payment p ORDER BY p.created DESC')
                ->setMaxResults(10)
                ->getResult();

        return $results;
    }

    public function getBarGraphValues()
    {
        $results = $this->getEntityManager()
                ->createQuery(
                        'SELECT MONTHNAME(p.created), count(p) '
                        . 'FROM AppBundle:Payment p '
                        . 'GROUP BY p.created '
                        . 'ORDER BY p.created ASC')
                ->getResult(Query::HYDRATE_ARRAY);

        $array = array();

        foreach ($results as $result) {
            $array[] = [$result[1], (int) $result[2]];
        }

        return $array;
    }

    public function getPieGraphValues($start = null, $end = null)
    {
        if (is_null($start)) {
            $start = date('m');
            $end = date('m');
        }

        $results = $this->getEntityManager()
                ->createQuery(
                        'SELECT count(p) AS cont, s.name, s.id '
                        . 'FROM AppBundle:Payment p '
                        . 'LEFT JOIN AppBundle:Erf e With e.id = p.erfId '
                        . 'LEFT JOIN AppBundle:Section s With s.id = e.sectionId '
                        . 'WHERE MONTH(p.created) BETWEEN :start AND :end '
                        . 'GROUP BY s.id')
                ->setParameter('start', $start)
                ->setParameter('end', $end)
                ->getResult(Query::HYDRATE_ARRAY);

        $array = array();

        foreach ($results as $result) {
            $array[] = array('label' => $result['name'], 'data' => $result['cont'], 'id' => $result['id']);
        }

        return $array;
    }

    

    public function getAllPayments($start = null, $end = null)
    {
         if (is_null($start)) {
            $start = date('m');
            $end = date('m');
        }

        $results = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('COUNT(p)')
                ->from('AppBundle:Payment', 'p')
                ->where('MONTH(p.created) BETWEEN :start AND :end')
                ->setParameter('start', $start)
                ->setParameter('end', $end)
                ->getQuery()
                ->getSingleScalarResult();
    
        return $results;
    }
    
    public function getCompleted($start = null, $end = null)
    {
         if (is_null($start)) {
            $start = date('m');
            $end = date('m');
        }

        $results = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('COUNT(p)')
                ->from('AppBundle:Payment', 'p')
                ->where('MONTH(p.created) BETWEEN :start AND :end')
                ->andWhere('p.paymentStatusId = :status')
                ->setParameter('status', 1)
                ->setParameter('start', $start)
                ->setParameter('end', $end)
                ->getQuery()
                ->getSingleScalarResult();
    
        return $results;
    }
    
    public function getCancelled($start = null, $end = null)
    {
         if (is_null($start)) {
            $start = date('m');
            $end = date('m');
        }

        $results = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('COUNT(p)')
                ->from('AppBundle:Payment', 'p')
                ->where('MONTH(p.created) BETWEEN :start AND :end')
                ->andWhere('p.paymentStatusId = :status')
                ->setParameter('status', 2)
                ->setParameter('start', $start)
                ->setParameter('end', $end)
                ->getQuery()
                ->getSingleScalarResult();
    
        return $results;
    }
    
    public function getRevenue($start = null, $end = null)
    {
         if (is_null($start)) {
            $start = date('m');
            $end = date('m');
        }

        $results = $this->getEntityManager()
                ->createQueryBuilder()
                ->select('Sum(p.amountReceived)')
                ->from('AppBundle:Payment', 'p')
                ->where('MONTH(p.created) BETWEEN :start AND :end')
                ->andWhere('p.paymentStatusId = :status')
                ->setParameter('status', 1)
                ->setParameter('start', $start)
                ->setParameter('end', $end)
                ->getQuery()
                ->getSingleScalarResult();
    
        return $results;
    }
    
    public function getErfReport($id, $start = null, $end = null)
    {
        $results = $this->getEntityManager()
                ->createQuery(
                        'SELECT p.amountDue, p.amountReceived, p.amountOutstanding, s.name, '
                        . 'p.totalOutstanding, p.created, MONTHNAME(p.created) as month, '
                        . 'e.erfNo, e.address as address '
                        . 'FROM AppBundle:Payment p '
                        . 'LEFT JOIN AppBundle:Erf e With e.id = p.erfId '
                        . 'LEFT JOIN AppBundle:PaymentStatus s With s.id = p.paymentStatusId '
                        . 'WHERE e.erfNo = :id '
                        . 'AND p.created BETWEEN :start AND :end ')
                
                ->setParameter('id', $id)
                ->setParameter('start', $start)
                ->setParameter('end', $end)
                ->getResult();

        return $results;
    }
    
    public function getSectionReport($id, $start = null, $end = null)
    {

        $results = $this->getEntityManager()
                ->createQuery(
                        'SELECT p.amountReceived, p.created, MONTHNAME(p.created) as month, e.erfNo, '
                        . 'e.address as address, s.name as section, st.name '
                        . 'FROM AppBundle:Payment p '
                        . 'LEFT JOIN AppBundle:Erf e With e.id = p.erfId '
                        . 'LEFT JOIN AppBundle:Section s With s.id = e.sectionId '
                        . 'LEFT JOIN AppBundle:PaymentStatus st With st.id = p.paymentStatusId '
                        . 'WHERE s.id = :id '
                        . 'AND p.created BETWEEN :start AND :end ')
                
                ->setParameter('id', $id)
                ->setParameter('start', $start)
                ->setParameter('end', $end)
                ->getResult();

        return $results;
    }

    public function getSectionBarGraph($id)
    {
        $results = $this->getEntityManager()
                ->createQuery(
                        'SELECT MONTHNAME(p.created), count(p) '
                        . 'FROM AppBundle:Payment p '
                        . 'LEFT JOIN AppBundle:Erf e With e.id = p.erfId '
                        . 'WHERE e.sectionId = :id '
                        . 'GROUP BY p.created '
                        . 'ORDER BY p.created ASC')
                ->setParameter('id', $id)                
                ->getResult(Query::HYDRATE_ARRAY);

        $array = array();

        foreach ($results as $result) {
            $array[] = [$result[1], (int) $result[2]];
        }

        return $array;
    }

    public function getLocationReport($id, $start = null, $end = null)
    {
        $str ='SELECT name, '
                    . 'COALESCE(sum(completed),0.00) as revenue, '
                    . 'COALESCE(count(completed),0) as completed, '
                    . 'COALESCE(count(cancelled),0) as cancelled, '
                    . 'COALESCE(count(pending),0) as pending '
                    . 'FROM (SELECT s.name, '
                    . "case when ps.name = 'Completed' then p.amount_received end AS completed, "
                    . "case when ps.name = 'Cancelled' then p.amount_received end as cancelled, "
                    . "case when ps.name = 'Pending' then p.amount_received end as pending "
                    . 'FROM payment p '
                    . 'LEFT JOIN payment_status ps ON ps.id = p.payment_status_id '
                    . 'LEFT JOIN erf e ON e.id = p.erf_id '
                    . 'LEFT JOIN section s ON s.id = e.section_id '
                    . 'LEFT JOIN location l ON l.id = s.location_id '
                    . "WHERE l.id = '".$id->getId(). "'"
                    . "AND p.created BETWEEN '".$start."' AND '".$end."') As T Group by name ";

        $conn = $this->getEntityManager()->getConnection();
        $stmt = $conn->executeQuery($str);
        $results = $stmt->fetchAll();
        
        $data = [];
        
        $data['data'] = $results;

        return $data;
    }

    public function getLocationGraphReport($id, $start = null, $end = null)
    {
        $str = 'SELECT name, month, '
            . 'COALESCE(count(completed),0) as completed '
            . 'FROM (SELECT s.name, MONTHNAME(p.created) as month, '
            . "case when ps.name = 'Completed' then p.amount_received end AS completed "
            . 'FROM payment p '
            . 'LEFT JOIN payment_status ps ON ps.id = p.payment_status_id '
            . 'LEFT JOIN erf e ON e.id = p.erf_id '
            . 'LEFT JOIN section s ON s.id = e.section_id '
            . 'LEFT JOIN location l ON l.id = s.location_id '
            . "WHERE l.id = '" . $id->getId() . "'"
            . "AND p.created BETWEEN '" . $start . "' AND '" . $end . "') As T Group by name, month ";

        $conn = $this->getEntityManager()->getConnection();
        $stmt = $conn->executeQuery($str);
        $results = $stmt->fetchAll();

        $array = [];

        foreach ($results as $result) {
            $timestamp = strtotime('01-'.$result['month'].'-'.date('Y')) * 1000;
            $key=str_replace(' ', '',$result['name']);
            $array[$key][] = [$timestamp, (int) $result['completed']];
        }
        return $array;
    }

    public function checkout($email) 
    {
        $date = date('Y-m-d');

        $results = $this->getEntityManager()
            ->createQuery('SELECT p.refNo, p.amountReceived, p.created, e.erfNo '
                .'FROM AppBundle:Payment p '
                .'LEFT JOIN AppBundle:Erf e With e.id = p.erfId '
                .'WHERE p.staffEmail = :email ' 
                .'AND p.created LIKE :date')
                
        ->setParameter('email', $email)
        ->setParameter('date', '%'.$date.'%')
        ->getResult();
        
        return $results;      
    }
    
}
    