<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un client')
            ->setPageTitle(Crud::PAGE_INDEX, 'Listes des clients');
    }


    public function configureFields(string $pageName): iterable
    {
        $roles = ['ROLE_SUPER_ADMIN', 'ROLE_ADMIN', 'ROLE_MODERATOR', 'ROLE_USER'];

        return [
            yield ChoiceField::new('civility', 'Civilité')
                ->setChoices(
                    [
                        'Monsieur' => 'Mr',
                        'Madame' => 'Mme',
                        'Mademoiselle' => 'Melle'
                    ]
                ),
            yield TextField::new('lastname', 'Nom'),
            yield TextField::new('firstname', 'Prénom'),
            yield TextField::new('email'),
            yield ChoiceField::new('roles', 'Type d\'utilisateur')
                ->setHelp('Types disponible: ROLE_SUPER_ADMIN, ROLE_ADMIN, ROLE_MODERATOR, ROLE_USER')
                ->setChoices(array_combine($roles, $roles))
                ->allowMultipleChoices()
                ->renderExpanded()
                ->renderAsBadges()
        ];
    }
}
