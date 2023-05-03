<?php

namespace App\Controller\Admin;

use App\Entity\ScheduleDate;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            ->setEntityLabelInSingular('un horaire');
    }


    public function configureFields(string $pageName): iterable
    {

        return [
            ChoiceField::new('dayOfTheWeek')
                ->setLabel('Jour')
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
            BooleanField::new('open')->setLabel('Ouvert'),
            TimeField::new('open_hour_am')->setLabel('Ouverture matin'),
            TimeField::new('close_hour_am')->setLabel('Fermeture matin'),
            TimeField::new('open_hour_pm')->setLabel('Ouverture soir'),
            TimeField::new('close_hour_pm')->setLabel('Fermeture soir')
        ];
    }
}
