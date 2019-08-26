<?php 
namespace App\EventListener;

use App\Entity\User;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordHasher
{
	/**
	 * @var UserPasswordEncoderInterface
	 */
	private $passwordEncoder;

	/**
	 * PasswordHasher constructor.
	 * @param UserPasswordEncoderInterface $passwordEncoder
	 */
	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	{
		$this->passwordEncoder = $passwordEncoder;
	}

	/**
	 * @return void
	 */
    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        if (!$entity instanceof User) 
            return;
        $this->encodePassword($entity);
    }

    /**
     * @return void
     */
    public function preUpdate(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        if (!$entity instanceof User) 
            return;
        $this->encodePassword($entity);
    }

    /**
     * @return void
     */
    private function encodePassword(User $entity): void
    {
        if (\is_null($entity->getPlainPassword()))
            return;
        $encoded = $this->passwordEncoder->encodePassword($entity,$entity->getPlainPassword());
        $entity->setPassword($encoded);
    }
}