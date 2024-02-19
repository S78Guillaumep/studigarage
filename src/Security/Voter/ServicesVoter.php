<?php

namespace App\Security\Voter;

use App\Entity\Services;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;

class ServicesVoter extends Voter
{
    const EDIT = 'SERVICE_EDIT';
    const DELETE = 'SERVICE_DELETE';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $service): bool 
    {
        if(!in_array($attribute, [self::EDIT, self::DELETE])){
            return false;
        }
        if(!$service instanceof Services){
            return false;
        }
        return true;
    }

    protected function voteOnAttribute($attribute, $service, TokenInterface $token): bool
    {
        //récupération de l'utilisateur via le token
        $user = $token->getUser();

        if(!$user instanceof UserInterface) return false;

        //vérification si l'utilisateur est admin
        if($this->security->isGranted('ROLE_ADMIN')) return true;

        //vérification des permissions
        switch($attribute){
            case self::EDIT:
                //si l'utilisateur peut éditer
                return $this->canEdit();
                break;
            case self::DELETE:
                //si l'utilisateur peut supprimer
                return $this->canDelete();
                break;
        }
    }

    private function canEdit(){
        return $this->security->isGranted('ROLE_ADMIN');
    }
    private function canDelete(){
        return $this->security->isGranted('ROLE_ADMIN');
    }
}