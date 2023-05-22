<?php

namespace App\DataFixtures;

use App\Entity\Dish;
use App\Entity\Formules;
use App\Entity\Image;
use App\Entity\MealCategory;
use App\Entity\Menus;
use App\Entity\RoomManagement;
use App\Entity\ScheduleDate;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture

{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        //load User Data Json
        $userDatas = json_decode(file_get_contents(__DIR__ . '/json/user.json'), true);

        //Create Users
        foreach ($userDatas as $userData) {

            $user = new User();

            $user->setCivility($userData['civility'])
                ->setFirstname($userData['firstname'])
                ->setLastname($userData['lastname'])
                ->setEmail($userData['email']);

            if (!$userData['roles'] == '') {
                $user->setRoles($userData['roles']);
            }

            $password = $this->hasher->hashPassword($user, $userData['password']);
            $user->setPassword($password);
            $manager->persist($user);
        }

        //load menus Data Json
        $menuDatas = json_decode(file_get_contents(__DIR__ . '/json/menus.json'), true);

        //load Formules Data Json
        $formuleDatas = json_decode(file_get_contents(__DIR__ . '/json/formules.json'), true);


        //Create Menus
        foreach ($menuDatas as $menuData) {

            $menu = new Menus();

            $menu->setTitle($menuData['title']);
            $this->setReference('menu', $menu);
            $manager->persist($menu);

            //Create Formules
            foreach ($formuleDatas as $formuleData) {

                $formule = new Formules();

                $formule->setTitle($formuleData['title'])
                    ->setDescription($formuleData['description'])
                    ->setPrice($formuleData['price']);
                $formule->addMenus($menu);
                $manager->persist($formule);
            }
        }

        //load Meals Data Json
        $mealDatas = json_decode(file_get_contents(__DIR__ . '/json/meal-category.json'), true);

        //Create Meals
        foreach ($mealDatas as $id => $mealData) {

            $meal = new MealCategory();

            $meal->setName($mealData['name']);
            $this->setReference("meal" . $id, $meal);
            $manager->persist($meal);
        }

        //load Dish Data Json
        $dishDatas = json_decode(file_get_contents(__DIR__ . '/json/dish.json'), true);

        //Create Meals
        foreach ($dishDatas as $dishData) {

            $dish = new Dish();

            $dish->setTitle($dishData['title'])
                ->setDescription($dishData['description'])
                ->setPrice($dishData['price'])
                ->setCategory($meal);


            $manager->persist($dish);
        }
        dd($meal);

        //load Image Data Json
        $imageDatas = json_decode(file_get_contents(__DIR__ . '/json/images.json'), true);

        //Create Image
        foreach ($imageDatas as $imageData) {

            $image = new Image();

            $image->setName($imageData['name'])
                ->setUrl($imageData['url']);

            $manager->persist($image);
        }

        //load Schedule Data Json
        $scheduleDatas = json_decode(file_get_contents(__DIR__ . '/json/schedule-date.json'), true);

        //Create Schedule Date
        foreach ($scheduleDatas as $scheduleData) {

            $schedule = new ScheduleDate();

            $openHourAM = \DateTime::createFromFormat("Y-m-d H:i:s", $scheduleData['openHourAM']);
            $closeHourAM = \DateTime::createFromFormat("Y-m-d H:i:s", $scheduleData['closeHourAM']);
            $openHourPM = \DateTime::createFromFormat("Y-m-d H:i:s", $scheduleData['openHourPM']);
            $closeHourPM = \DateTime::createFromFormat("Y-m-d H:i:s", $scheduleData['closeHourPM']);

            $schedule->setDayOfTheWeek($scheduleData['dayOfTheWeek'])
                ->setOpen($scheduleData['open'])
                ->setOpenHourAM($openHourAM)
                ->setCloseHourAM($closeHourAM)
                ->setOpenHourPM($openHourPM)
                ->setCloseHourPM($closeHourPM);

            $manager->persist($schedule);
        }

        //load room management Data Json
        $roomDatas = json_decode(file_get_contents(__DIR__ . '/json/room.json'), true);

        //Create Schedule Date
        foreach ($roomDatas as $roomData) {

            $roomManagement = new RoomManagement();

            $maxTreshold = \DateTime::createFromFormat("Y-m-d H:i:s", $roomData['maxTreshold']);

            $roomManagement->setNumberOfGuest($roomData['numberOfGuest'])
                ->setMaxThreshold($maxTreshold);

            $manager->persist($roomManagement);
        }



        $manager->flush();
    }
}
