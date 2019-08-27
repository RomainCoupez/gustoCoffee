<?php 

namespace App\Serializer;

class CircularIdHandler
{
    public function __invoke($entity)
    {
        return $entity->getId();
    }
}