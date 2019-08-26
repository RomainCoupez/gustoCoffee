<?php

namespace App\Service;

use App\Entity\Booking;
use App\Repository\BookingRepository;
use Doctrine\ORM\EntityManagerInterface;

final class BookingService
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * BookingService constructor.
     * @param EntityManagerInterface 		$em
     * @param BookingRepository 			$repoBooking
     */
    public function __construct(EntityManagerInterface $em, BookingRepository $repoBooking)
    {
        $this->em = $em;
        $this->repoBooking = $repoBooking;
    }

    /**
     * @param string $message
     * @return Booking
     */
    public function createBooking(string $message): Booking
    {
        $booking = new Booking();
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
