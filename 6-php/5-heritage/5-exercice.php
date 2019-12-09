<?php
   /*
    * Modéliser les classes suivantes :
    * Dans une entreprise,
    *    - vous avez des personnes avec un nom et un prénom
    *   - le PDG, est une personne, qui peut en plus faire des conferences
    *   - les Salariés, qui sont des personnes, et qui ont un salaire
    *   - les codeurs, qui sont des salariés et qui peuvent coder
    *   - les designeurs, qui sont des salariés et qui peuvent designer
    *   - les chefs, qui sont des salariés et qui peuvent décider
    *
    * Faites une interface avec une fonction : embaucher
    * Le PDG et les chefs doivent pouvoir embaucher, implémenter cette interface
    * sur les bonnes classes
    *
    * - Les classes avec :
    *   - propriétés
    *   - constructeurs
    *   - getters / setters
    *   - autre méthodes
    */

   class Person {
       private $firstName;
       private $lastName;

       public function __construct($fn, $ln)
       {
           $this->setFirstName($fn);
           $this->setLastName($ln);
       }

       public function getFirstName()
       {
           return $this->firstName;
       }

       public function setFirstName($firstName)
       {
           $this->firstName = $firstName;
       }

       public function getLastName()
       {
           return $this->lastName;
       }

       public function setLastName(string $lastName)
       {
           /*
           if (is_string($lastName)) {
               $this->lastName = $lastName;
           }
           */
           $this->lastName = $lastName;
       }
   }

   class CEO extends Person implements Hiring {
        public function conference() {
            echo "Salut tout le monde, mon produit va tout révolutionner";
        }

       public function hire($fn, $ln)
       {
           // TODO: Implement hire() method.
       }
   }

   class Salaried extends Person {
       private $salary;

       /**
        * Salaried constructor.
        * @param $salary
        */
       public function __construct($fn, $ln, $salary)
       {
           parent::__construct($fn, $ln);
           $this->setSalary($salary);
       }


       public function getSalary()
       {
           return $this->salary;
       }

       public function setSalary($salary)
       {
           $this->salary = $salary;
       }
   }

   class Coder extends Salaried {
        public function code() {
            echo "001111001010";
        }
   }

    class Designer extends Salaried {
        public function design() {
            echo "8==>";
        }
    }

   class Chief extends Salaried implements Hiring {
       public function decide() {

       }

       public function hire($fn, $ln)
       {

       }

   }

   interface Hiring {
       public function hire($fn, $ln);
   }

   class Company {
       /*
        * l'entreprise a besoin de quelqu'un pour embaucher :
        * on type la variable Hirer avec l'interface Hiring. De cette manière,
        * la variable passé dans le paramètre $hirer implémente forcément la méthode hire()
        */
       public function hire(Hiring $hirer, $persons) {
           foreach ($persons as $person) {
               $chance = rand(1,10);
               if ($chance > 8) {
                   $hirer->hire($person->getFirstName(), $person->getLastName());
               }
           }
       }
   }

    $person = new Person("Toto", "Dujardin");
    $person->setFirstName("Jacques");

    $ceo = new CEO("Trouduc", "Coucou");
    $ceo->conference();

    $salaried = new Salaried("Philippe", "Le grand", 19000);

    $coder = new Coder("Jean", "Lourd", 15000);
    $designer = new Designer("Jean2", "Lourd2", 15000);
    $chief = new Chief("Jean3", "Lourd3", 15000);

    $company = new Company();

    $person1 = new Person("Gerard", "Magueule");
    $person2 = new Person("Gerard2", "Magueule2");
    $person3 = new Person("Gerard3", "Magueule3");
    $person4 = new Person("Gerard4", "Magueule4");

    $persons = [];
    $persons[] = $person1;
    $persons[] = $person2;
    $persons[] = $person3;
    $persons[] = $person4;

    $company->hire($chief, $persons);
    $company->hire($ceo, $persons);

