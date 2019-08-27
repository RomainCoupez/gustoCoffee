<?php

namespace App\Service;

use App\Entity\Booking;
use App\Repository\BookingRepository;
use App\Repository\RoomRepository;
use Doctrine\ORM\EntityManagerInterface;

final class BookingService
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * BookingService constructor.
     * @param EntityManagerInterface 		$em
     * @param BookingRepository 			$repoBooking
     * @param RoomRepository                $repoRoom
     */
    public function __construct(EntityManagerInterface $em, BookingRepository $repoBooking, 
    RoomRepository $repoRoom)
    {
        $this->em = $em;
        $this->repoBooking = $repoBooking;
        $this->repoRoom = $repoRoom;
    }

    /**
     * @param array $params
     * @return Booking
     */
    public function createBooking(array $params): Booking
    {
        $booking = new Booking();
        $booking->setStartDate(new \DateTime($params['startDate']));
        $booking->setEndDate(new \DateTime($params['endDate']));
        $booking->setRoom($this->repoRoom->find($params['room']));
        $this->em->persist($booking);
        $this->em->flush();
        return $booking;
    }

    /**
     * @return Booking[]
     */
    public function getAll(): array
    {
        return $this->repoBooking->findBy([], ['id' => 'DESC']);
    }
}
