<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $id = IdField::new('id');
        $name = TextField::new('name', 'Nombre');
        $surname = TextField::new('surname', 'Apellidos');
        $fullName = TextField::new('getFullName');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $fullName];
        } elseif(Crud::PAGE_DETAIL === $pageName) {
            return  [$name, $surname];
        } elseif(Crud::PAGE_NEW === $pageName) {
            return  [$name, $surname];
        } else {
            return [$fullName];
        }
    }

}
