<?php

    class Computer {
        private $processor;
        private $graphicCard;
        private $rams;
        private $psu;

        public function __construct(Processor $processor, GraphicCard $graphicCard, array $rams, PSU $psu)
        {
            $this->processor = $processor;
            $this->graphicCard = $graphicCard;
            $this->rams = $rams;
            $this->psu = $psu;
        }
    }

    class Processor {}
    class GraphicCard {}
    class RAM {}
    class PSU {}

    class ComputerFactory {
        static public function load($nbRams = 2) {
            $processor = new Processor();
            $graphic = new GraphicCard();

            $rams = [];
            for ($i = 0; $i < $nbRams; $i++) {
                $ram = new RAM();
                $rams[] = $ram;
            }

            $psu = new PSU();
            $computer = new Computer($processor, $graphic, $rams, $psu);

            return $computer;
        }
    }

    $computer = ComputerFactory::load();
    $computer2 = ComputerFactory::load(4);


    $errorHandler = new ErrorHandle();
    $error->attach();



    $errorHandler->error("connexion bdd");


    $errorHandler->error("entier attendu");

    $errorHandler->error("le nom n'est pas correct");