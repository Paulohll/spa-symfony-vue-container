<?php

namespace App\DataFixtures;

use App\Entity\Vivienda;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       
            $v1 = new Vivienda();
            $v1->setShortdescription('Chalet adosado en venta en Calle Cádiz, 8, 21005, San Bartolomé De La Torre (Huelva)');
            $v1->setDescription('Vivienda unifamiliar adosado de dos plantas situada en la localidad de San Bartolomé de la Torre, provincia de Huelva. Núcleo autónomo de tamaño pequeño. Tipología de edificación de viviendas entre medianeras simultaneando con otras viviendas aisladas. Las dos plantas se comunican por escalera interior. Se accede a ella a través de antejardín. Forma parte del núcleo urbano de la localidad, contando con todos los servicios e infraestructuras.');
            $v1->setCodereference('7344724');
            $v1->setLocation('Calle Cádiz, 8, 21005, San Bartolomé De La Torre (Huelva)');
            $v1->setOwner('Inversor Privado');
            $v1->setCreatedat(new DateTime('now'));
            $v1->setValue(99000);
            $v1->settype('C');

            $manager->persist($v1);


            $v2 = new Vivienda();
            $v2->setShortdescription('Chalet independiente en venta en Calle Forte Xeixeda, 36140, Vilaboa (Pontevedra)');
            $v2->setDescription('Vivienda unifamiliar que consta de dos plantas sobre rasante y una planta sótano, situada en un entorno rural del municipio de Vilaboa, en la provincia de Pontevedra. La vivienda está compuesta de tres plantas. La planta sótano tiene una superficie de 40 m2 y está destinada a almacén. La planta baja, de 120 m2 de superficie, y consta de amplio salón, cocina, aseo y 1 dormitorio. La planta alta cuenta con un altillo de 40 m2. Cuenta además con una terraza.Se encuentra en una zona tranquila, muy próxima a la Base Militar General Morillo.');
            $v2->setCodereference('7237142');
            $v2->setLocation('Calle Forte Xeixeda, 36140, Vilaboa (Pontevedra)');
            $v2->setOwner('Inversor Privado');
            $v2->setCreatedat(new DateTime('now'));
            $v2->setValue(44000);
            $v2->settype('C');

            $manager->persist($v2);


            $v3 = new Vivienda();
            $v3->setShortdescription('Dúplex en calle Camarillas. Madrid, Madrid');
            $v3->setDescription('Vivienda piso en edificio de 3 plantas sobre rasante, y 1 bajo rasante, sin ascensor, en el municipio y provincia de Madrid. Tiene una superficie construida de 98,63 m² aproximadamente, según catastro. Madrid es un municipio y una ciudad de España, con categoría histórica de villa. ​Constituye la capital del Estado​ y de la Comunidad de Madrid. En su término municipal, el más poblado de España, viven 3 334 730 personas empadronadas, según el INE de 2020. El área metropolitana asociada tiene una población de 6 779 888 habitantes,​ la segunda de la Unión Europea, según la fuente, tras la de París');
            $v3->setCodereference('7812345');
            $v3->setLocation('Madrid');
            $v3->setOwner('Inversor Privado');
            $v3->setCreatedat(new DateTime('now'));
            $v3->setValue(900 );
            $v3->settype('A');

            $manager->persist($v3);


            $v4 = new Vivienda();
            $v4->setShortdescription('Estudio/loft en alquiler en Calle Rodio, 5º, 28045, Madrid (Madrid)');
            $v4->setDescription('VPROMOCIÓN DE OCTUBRE: 1 MES GRATIS si reservas antes del 31 de Octubre. Y además, ¡sin comisiones de agencia! Excelente en la cuarta planta de un edificio seis alturas sobre rasante y dos plantas sótano con ascensor. Se ubica en la localidad y provincia de Madrid. Consta de cocina amueblada y equipada, amplio y luminoso salón con armario empotrado, dormitorio y cuarto de baño. Superficie construida aproximada de 51,00 m².');
            $v4->setCodereference('7036918');
            $v4->setLocation('Madrid');
            $v4->setOwner('Inversor Privado');
            $v4->setCreatedat(new DateTime('now'));
            $v4->setValue(810 );
            $v4->settype('A');

            $manager->persist($v4);
        $manager->flush();
    }
}
