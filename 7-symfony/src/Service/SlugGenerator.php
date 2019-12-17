<?php
    /**
     * Created by PhpStorm.
     * User: Administrateur
     * Date: 17/12/2019
     * Time: 15:16
     */

    namespace App\Service;
    use Symfony\Component\Routing\RouterInterface;

    class SlugGenerator
    {
        protected $routing;

        public function __construct(RouterInterface $routing)
        {
            $this->routing = $routing;
        }

        public function slugify($string) {
            // transforme une chaine en slug (un truc ok pour une URL)
            $oldLocale = setlocale(LC_ALL, '0');
            setlocale(LC_ALL, 'en_US.UTF-8');
            $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
            $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
            $clean = strtolower($clean);
            $clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
            $clean = trim($clean, '-');
            setlocale(LC_ALL, $oldLocale);

            return $clean;
        }

        public function slugifyAndGenerateURL($routeName, $string, $paramName) {
            $slug = $this->slugify($string);
            $url = $this->routing->generate($routeName, [$paramName => $slug]);

            return $url;
        }
    }