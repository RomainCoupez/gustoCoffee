<?php

namespace App\Controller;

use App\Entity\Room;
use App\Service\RoomService;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ApiRoomController
 * @package App\Controller
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */
final class ApiRoomController extends AbstractController
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var RoomService */
    private $roomService;

    /**
     * ApiRoomController constructor.
     * @param SerializerInterface $serializer
     * @param RoomService $roomService
     */
    public function __construct(SerializerInterface $serializer, RoomService $roomService)
    {
        $this->serializer = $serializer;
        $this->roomService = $roomService;
    }

    /**
     * @Rest\Post("/api/room/create", name="createRoom")
     * @param Request $request
     * @return JsonResponse
     * @IsGranted("ROLE_FOO")
     */
    public function create(Request $request): JsonResponse
    {
        $message = $request->request->get('message');
        $postEntity = $this->roomService->createRoom($message);
        $data = $this->serializer->serialize($postEntity, 'json');
        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @Rest\Get("/api/rooms", name="getAllRooms")
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $postEntities = $this->roomService->getAll();
        $data = $this->serializer->serialize($postEntities, 'json');

        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @Rest\Get("/api/rooms/{name}", name="getRoomByName")
     * @return JsonResponse
     */
    public function getByName(Room $room): JsonResponse
    {
        $data = $this->serializer->serialize([$room], 'json');
        return new JsonResponse($data, 200, [], true);
    }
}