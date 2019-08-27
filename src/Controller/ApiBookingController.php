<?php

namespace App\Controller;

use App\Service\BookingService;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class ApiBookingController
 * @package App\Controller
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */
final class ApiBookingController extends AbstractController
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var BookingService */
    private $bookingService;

    /**
     * ApiBookingController constructor.
     * @param SerializerInterface $serializer
     * @param BookingService $bookingService
     */
    public function __construct(SerializerInterface $serializer, BookingService $bookingService)
    {
        $this->serializer = $serializer;
        $this->bookingService = $bookingService;
    }

    /**
     * @Rest\Post("/api/booking/create", name="createBooking")
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $params = $request->request->all();
        $postEntity = $this->bookingService->createBooking($params);
        $data = $this->serializer->serialize($postEntity, 'json');
        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @Rest\Get("/api/bookings", name="getAllBookings")
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $postEntities = $this->bookingService->getAll();
        $data = $this->serializer->serialize($postEntities, 'json');

        return new JsonResponse($data, 200, [], true);
    }
}