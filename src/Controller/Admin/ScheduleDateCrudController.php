<?php

namespace App\Controller\Admin;

use App\Entity\ScheduleDate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class ScheduleDateCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return ScheduleDate::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un horaire')
            ->setPageTitle(Crud::PAGE_INDEX, 'Horaires du restaurant');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('dayOfTheWeek', 'jour')
                ->setChoices(
                    [
                        'Lundi' => 'lundi',
                        'Mardi' => 'mardi',
                        'Mercredi' => 'mercredi',
                        'Jeudi' => 'jeudi',
                        'Vendredi' => 'vendredi',
                        'Samedi' => 'samedi',
                        'Dimanche' => 'dimanche'
                    ]
                ),
            BooleanField::new('open', 'Ouvert')->renderAsSwitch(false),
            TimeField::new('open_hour_am', 'Ouverture matin'),
            TimeField::new('open_hour_am', 'Ouverture matin'),
            TimeField::new('close_hour_am', 'Fermeture matin'),
            TimeField::new('open_hour_pm', 'Ouverture soir')
        ];
    }
}
