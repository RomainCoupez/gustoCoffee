<?php

namespace App\Service;

use App\Entity\Room;
use App\Repository\RoomRepository;
use Doctrine\ORM\EntityManagerInterface;

final class RoomService
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * RoomService constructor.
     * @param EntityManagerInterface 		$em
     * @param RoomRepository 			$repoRoom
     */
    public function __construct(EntityManagerInterface $em, RoomRepository $repoRoom)
    {
        $this->em = $em;
        $this->repoRoom = $repoRoom;
    }

    /**
     * @param string $message
     * @return Room
     */
    public function createRoom(string $message): Room
    {
        $room = new Room();
        $this->em->persist($room);
        $this->em->flush();
        return $room;
    }

    /**
     * @return Room[]
     */
    public function getAll(): array
    {
        return $this->repoRoom->findBy([], ['id' => 'DESC']);
    }
}
