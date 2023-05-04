<?php

namespace App\Controller\Admin;

use App\Entity\RoomManagement;
use Doctrine\DBAL\Types\DateTimeType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class RoomManagementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RoomManagement::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Gestion de la salle');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            yield NumberField::new('number_of_guest', 'Nombre de convives'),
            yield Field::new('maxThreshold', 'Seuil max')
                ->setFormTypeOptions([
                    'widget' => 'single_text',
                    'minutes' => range(0, 45, 15),
                    'html5' => false,
                    'attr' => ['class' => 'timepicker'],
                ])
        ];
    }
}
