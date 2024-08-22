<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('art_styles')->insert([
            [
                'name' => 'minimaliste',
                'description' => 'Les tatouages minimalistes sont une belle façon de s\'exprimer sans avoir besoin de grands motifs élaborés. Ces pièces d\'art corporel subtiles mais significatives peuvent être étonnamment puissantes et accrocheuses si elles sont bien faites. Que vous souhaitiez quelque chose de petit ou de complexe, les tatouages minimalistes offrent un éventail d\'options qui vous laisseront avec une œuvre d\'art unique qui en dit long sur qui vous êtes et ce qui compte le plus pour vous. Dans cette présentation, nous allons explorer les différents types de tatouages minimalistes et jeter un coup d\'œil à quelques exemples inspirants pour que vous puissiez trouver le motif parfait !',
                'img_style' => 'tatouage-minimaliste.jpg'
            ],
            [
                'name' => 'realiste',
                'description' => 'Un tatouage réaliste peut être une image vraiment étonnante qui se détache sur le corps et ressemble à une photographie réelle. Il est souvent créé avec des détails complexes, des couleurs vives et des ombres réalistes, ce qui lui donne un aspect incroyablement réaliste. Un tatouage réaliste peut représenter tout ce que l\'on peut imaginer - le portrait d\'un animal de compagnie ou d\'un membre de la famille bien-aimé, une photo pittoresque d\'une ville ou d\'un village, etc',
                'img_style' => 'tatouage-realiste.jpg'
            ],
            [
                'name' => 'polynésien',
                'description' => 'Tatouage polynesien, ou tatouage maori, est une forme d\'art corporel qui remonte aux temps anciens. Il était traditionnellement pratiqué par les tribus des îles du Pacifique pour célébrer leurs héros et illustrer leur histoire. Les Polynésiens ont développé un système de symboles complexes pour représenter leurs traditions et la spiritualité de leur culture. Aujourd\'hui, les tatouages maoris sont très populaires à travers le monde entier et servent à montrer sa fierté envers l\'héritage polynésien ainsi qu\'à exprimer son individualité.',
                'img_style' => 'tatouage-polynesien.jpg'
            ],
            [
                'name' => 'japonais',
                'description' => 'Le tatouage japonais est une forme d\'art qui se caractérise par des motifs géométriques et abstraits, ainsi que par de riches couleurs. Cet art est très ancien et remonte à l\'ère du Japon féodal. En plus de représenter la beauté artistique, le tatouage japonais peut également être considéré comme un moyen puissant pour exprimer les sentiments intimes et profonds des personnes qui le portent. Les différentes techniques utilisées pour créer ces tatouages sont variées et complexes, ce qui en fait une forme d\'art unique et prisée partout dans le monde.',
                'img_style' => 'tatouage-japonais.jpg'
            ],
            [
                'name' => 'aquarelle',
                'description' => 'Les tatouages aquarelle sont devenus très populaires ces dernières années, et il n\'est pas difficile de comprendre pourquoi. Ces designs élégants et subtils apportent une touche artistique à votre peau qui est à la fois unique et durable. Les tatouages aquarelle donnent l\'impression que vous portez un tableau ou une œuvre d\'art sur votre corps, ce qui en fait l\'un des styles les plus recherchés aujourd\'hui. Avec leur look doux mais distinctif, les tatouages aquarelle offrent aux amateurs de tatouage un moyen intéressant d’exprimer leurs goûts personnels. Dans cette présentation, nous allons examiner en détail ce qu’est un style de tatouage aquarelle et comment choisir celui qui convient le mieux à votre individualité! ',
                'img_style' => 'tatouage-aquarelle.jpg'
            ],
            [
                'name' => 'old school',
                'description' => 'Le tatouage old shool est un style classique et impressionnant qui remonte à des siècles. Les tatouages d\'école antique sont généralement caractérisés par des figures simples, telles que des oiseaux, des poissons, des papillons et des étoiles, représentées dans des combinaisons audacieuses de couleurs vives. Les tatoueurs modernes qui se spécialisent dans le style old school peuvent prendre ces motifs classiques et les interpréter d\'une manière moderne et unique. ',
                'img_style' => 'tatouage-old-school.jpg'
            ],
            [
                'name' => 'mandala',
                'description' => 'Le tatouage mandala est une forme de tatouage intemporelle et élégante qui combine des motifs circulaires complexes pour créer un design unique. Il s\'agit d\'une forme artistique riche en symboles qui peuvent être interprétés de différentes manières. ',
                'img_style' => 'tatouage-mandala.jpg'
            ],
            [
                'name' => 'graphique',
                'description' => 'Les tatouages graphiques sont une forme populaire d\'art corporel qui combine des formes et des lignes audacieuses avec des éléments abstraits pour créer une œuvre d\'art accrocheuse. Plutôt que de s\'appuyer sur des symboles ou des motifs traditionnels, les tatouages graphiques utilisent des formes géométriques comme les carrés, les triangles et les cercles, ainsi que des formes plus abstraites pour créer des visuels uniques. En combinant ces éléments de manière créative, les tatouages graphiques peuvent être utilisés pour exprimer un style personnel tout en faisant une déclaration audacieuse. Que vous recherchiez quelque chose de subtil ou de frappant, les tatouages graphiques offrent des possibilités infinies lorsqu\'il s\'agit de s\'exprimer à travers l\'art corporel.',
                'img_style' => 'tatouage-graphique.jpg'
            ],
            [
                'name' => 'ornemental',
                'description' => 'Tatouage ornemental est une forme d\'art corporel qui remonte à des milliers d\'années. Cette pratique a traversé les âges et les cultures, mais elle reste l’une des plus anciennes formes de communication et de déclaration personnelle. Les gens ont utilisé le tatouage ornemental pour exprimer leur identité, leurs croyances ou simplement comme un acte créatif. Aujourd’hui, il s’agit encore d’un art très populaire car il permet aux personnes de partager leurs histoires et de montrer leur individualité au monde entier. Le tatouage ornemental est généralement mieux adapté pour les conceptions simples et minimalistes car il est plus facile de voir l\'esthétique globale. Les designs peuvent être simplement tracés à la main ou avec des outils spécialisés pour créer des lignes précises et des motifs complexes. Les tatoueurs peuvent également utiliser des couleurs ou des encres spéciales pour faire ressortir le dessin.',
                'img_style' => 'tatouage-ornemental.jpg'
            ],
            [
                'name' => 'celtique',
                'description' => 'Les tatouages existent depuis des siècles, et le tatouage celtique est l\'un des motifs les plus anciens et les plus populaires. Représentant la force, la protection et l\'orientation spirituelle, ces tatouages complexes sont imprégnés d\'histoire et de symbolisme. Des nœuds complexes aux marques tribales audacieuses, les tatouages celtiques se déclinent dans une variété de styles qui les rendent à la fois significatifs et beaux. Que vous recherchiez un rappel subtil de votre héritage ou une œuvre d\'art accrocheuse, un tatouage celtique est peut-être ce qu\'il vous faut. Voici tout ce que vous devez savoir sur ce motif intemporel. Les tatouages celtiques présentent souvent des nœuds complexes, avec des motifs élaborés qui s\'entrelacent et s\'enroulent les uns autour des autres. Les nœuds celtiques sont censés réunir les domaines physique et spirituel, symbolisant l\'interconnexion de toutes les choses. Il représente également l\'éternité et l\'infini, ce qui peut être réconfortant pour les personnes qui traversent des moments difficiles ou qui cherchent à se guider.',
                'img_style' => 'tatouage-celtique.jpg'
            ],
            [
                'name' => 'biomecanique',
                'description' => 'Le tatouage biomecanique est un style de tatouage qui combine des éléments d\'art mécanique et biologique pour créer des designs complexes. Les idées derrière ce genre de tatouage peuvent être liées aux images métaphoriques d\'une société moderne qui fonctionne en même temps sur des principes biologiques et mécaniques. Les thèmes généralement abordés sont la technologie, l’humanité et la nature, souvent avec une touche d’horreur et de science-fiction. Les designs sont souvent réalisés avec des lignes minutieuses qui se mélangent pour créer une esthétique complexe, mais puissante. Des éléments comme des engrenages, des pivots, des membres mécaniques, des organes biologiques et autres sont utilisés pour créer le tatouage biomecanique. Les motifs peuvent être très variés et vont de l\'abstrait à très réaliste.',
                'img_style' => 'tatouage-biomecanique.jpg'
            ],
            [
                'name' => 'tribal',
                'description' => 'Le tatouage tribal est un style de tatouage qui représente une culture ancestrale et est très identifiable par sa forme géométrique distinctive. Il a été développé par des tribus indigènes d\'Amérique, d\'Afrique, d\'Océanie et même des régions asiatiques. Le but principal du tatouage tribal était de montrer l\'appartenance à un groupe particulier, de communiquer les croyances spirituelles ou religieuses ou encore pour la protection contre le mauvais œil. Les motifs comprennent souvent des lignes compliquées et intriquées qui racontent une histoire ou expriment des sentiments profonds.',
                'img_style' => 'tatouage-tribal.jpg'
            ],
            [
                'name' => 'fineline',
                'description' => 'Le tatouage fineline est un style de tatouage qui se caractérise par des lignes fines et droites ou courbées. Il ne comprend aucune gradation d\'ombre, couleur ou texture, ce qui le rend relativement simple à exécuter. Cependant, cette simplicité peut être utilisée pour créer des œuvres d\'art incroyablement détaillées. Les tatouages délicats créés grâce au style fineline sont très appréciés car ils mettent en valeur la forme et les contours plutôt que la couleur, l\'ombrage ou la texture. De plus, ce style de tatouage est souvent associé à des œuvres d\'art minimalistes qui n\'ajoutent pas de polluants visuels à l\'ensemble du design. Le tatouage fineline peut être utilisé pour créer des motifs complexes avec beaucoup de détails sans alourdir le rendu final. Les artistes tatoueurs qui excellents dans cette technique sont capables de créer des tatouages subtils et élégants qui peuvent durer toute une vie. Si vous cherchez à obtenir un look minimal et raffiné, le tatouage fineline est la meilleure option pour vous. Grâce à lui, vous pouvez créer des œuvres d\'art magnifiquement détaillées qui marqueront votre peau pour toujours.',
                'img_style' => 'tatouage-fineline.jpg'
            ],
            [
                'name' => 'handpoke',
                'description' => 'Le handpoke est un style de tatouage qui remonte à plusieurs sciècles. Il consiste à utiliser une aiguille pour donner des petits coups à la main sur la peau et créer les dessins souhaités. La technique du handpoke est connue pour être plus précise et précis que le dermographe, car elle n\'utilise pas de machines et se fait entièrement à la main. Cette méthode s\'est avérée hautement efficace pour obtenir un look naturel et discret. ',
                'img_style' => 'tatouage-handpoke.jpg'
            ],
            [
                'name' => 'animaux',
                'description' => 'Le tatouage d\'animaux est une forme de body art qui consiste à appliquer des encres permanentes sur la peau pour créer un motif, souvent en l’honneur d\'un animal. Les gens choisissent leurs motifs préférés, qu’ils soient réels ou fantastiques, et les font tatouer par des artistes qualifiés. Ils représentent généralement la loyauté, la protection ou l’amour que les personnes éprouvent pour ces animaux. Les tatouages d\'animaux peuvent être inspirés par des espèces réelles, comme les chats et les chiens, ou par des animaux plus fantastiques, tels que les dragons et autres créatures mythiques. Les couleurs sont souvent vives et éclatantes pour rendre leur motif encore plus attrayant, mais certaines personnes préfèrent un style plus subtil, en noir et blanc seulement.',
                'img_style' => 'tatouage-animaux.jpg'
            ],
            [
                'name' => 'manga',
                'description' => 'Le tatouage de manga est une forme d\'art qui combine des styles du monde entier pour créer un design unique. Il incorpore des éléments graphiques tels que les personnages, les couleurs et les symboles trouvés dans le style de bande dessinée japonaise connu sous le nom de manga. Le but principal est de capturer l\'essence spécifique des mangas afin qu\'ils reflètent la passion et l\'excitation ressenties par ceux qui apprécient cet art. Les tatouages ​​de manga peuvent être complexes ou simples, mais ils sont souvent remplis de couleurs et de détails. Ils peuvent représenter une signification personnelle ou simplement offrir une œuvre d\'art unique à son porteur. Les tatouages ​​de manga sont parfaits pour ceux qui recherchent un look unique et audacieux.',
                'img_style' => 'tatouage-manga.jpg'
            ],
            [
                'name' => 'lettrage',
                'description' => 'Un tatouage en lettrage est un type de tatouage qui se caractérise par des lettres ou des mots imprimés sur la peau à l\'aide d\'encre spéciale. Les lettrages peuvent être réalisés avec un style manuscrit ou ciselé et sont souvent accompagnés de symboles, de motifs géométriques ou de dessins floraux pour compléter l\'œuvre. Les textes peuvent également être formulés dans une variété de langues et de styles différent.',
                'img_style' => 'tatouage-lettrage.jpg'
            ],
            [
                'name' => 'viking',
                'description' => 'Un tatouage viking est un type de tatouage qui remonte à des milliers d\'années. Les Vikings étaient connus pour leurs styles de tatouages distinctifs, avec des motifs triangulaires et circulaires, souvent inspirés par des symboles liés à la mythologie nordique. Certains disent que ces designs servaient à renforcer la masculinité et la force des guerriers vikings, mais d\'autres supposent qu\'ils représentaient les exploits et l\'identité personnelle du Viking. Ces types de tatouages sont très populaires aujourd\'hui, non seulement pour leur esthétique culturelle unique, mais aussi en raison des nombreux symboles et significations qu\'ils peuvent représenter.',
                'img_style' => 'tatouage-viking.jpg'
            ],
            [
                'name' => 'dotwork',
                'description' => 'Le dotwork est une forme de tatouage qui se distingue des autres techniques par le style plus graphique et minimaliste qu’il offre. Au lieu d’utiliser les lignes habituelles et les courbes, le dotwork remplace ces éléments par une multitude de points minuscules. Cette approche artistique est souvent utilisée pour créer des modèles psychédéliques complexes ou des motifs géométriques. La technique peut être réalisée avec un appareil à tatouer manuel ou électrique, ce qui en fait une pratique populaire auprès des professionnels et des amateurs de tatouage. Les points sont habituellement disposés à plusieurs niveaux pour créer une texture unique et reconnaissable. Les couleurs peuvent également être mélangées pour obtenir un effet intéressant. Le tatouage en dotwork est une forme d\'art particulièrement complexe qui peut prendre du temps à maîtriser, mais qui produit des résultats impressionnants. Il n’est pas surprenant qu’il soit devenu si populaire parmi les artistes et le public.  Il est important de noter que le dotwork nécessite une précision et une patience extrêmes, ce qui en fait un défi de taille pour les tatoueurs expérimentés. Néanmoins, il offre des possibilités complexes et visuellement intéressantes à ceux qui sont prêts à relever le défi.  La patience porte ses fruits quand il s\'agit du tatouage en dotwork car il produit des motifs riches et variés qui ne peuvent pas être obtenus.',
                'img_style' => 'tatouage-dotwork.jpg'
            ],
            [
                'name' => 'trait fin',
                'description' => 'Un tatouage trait fin est une forme de tatouage qui implique l\'utilisation d\'aiguilles fines, ce qu’on appelle des aiguilles «liner». Les artistes tatoueurs peuvent créer des lignes très minces et précises grâce à ces aiguilles à liner. Un tatouage trait fin offre une qualité exceptionnelle et une plus grande résistance que les autres types de tatouages. Ces traits fins sont également souvent utilisés pour développer des détails complexes et intriqués dans un tatouage. Les tatouages trait fin sont généralement plus coûteux que les autres types de tatouages car ils nécessitent une attention particulière et un temps plus long pour être appliqués. Ils peuvent aussi prendre beaucoup plus de temps à guérir, mais le résultat est souvent très satisfaisant. De plus, ces tatouages offrent un design unique et intemporel qui est difficile à reproduire. Les modèles qui ont été conçus dans ce style peuvent durer des années et offriront toujours une apparence nouvelle et fraîche. Les tatouages trait fin peuvent être un excellent choix pour ceux qui recherchent une qualité supérieure et un design unique pour leur tatouage. Ils sont aussi parfaits pour les conceptions détaillées, car ils permettent aux artistes de créer des lignes précises qui donneront vie à votre œuvre.',
                'img_style' => 'tatouage-trait-fin.jpg'
            ],
            [
                'name' => 'cover',
                'description' => 'Un tatouage cover est une technique qui consiste à recouvrir un tatouage existant avec un nouveau motif. Cette méthode peut être utilisée pour modifier complètement l\'aspect d\'un tatouage, ou bien pour le transformer subtilement, en y apportant des changements plus discrets.',
                'img_style' => 'tatouage-cover.jpg'
            ],
            [
                'name' => 'doigt',
                'description' => 'Le tatouage de doigt est une forme de tatouage qui se présente généralement sous la forme d\'un petit motif ou symbole qui peut être appliqué sur les doigts, les mains et/ou les articulations. Ces tattoos sont souvent faits avec des encres spéciales pour l\'environnement humain et sont conçus pour être discrets et intimes. En raison de leur taille relativement petite, ces tatouages ont également tendance à guérir plus rapidement que leurs homologues.',
                'img_style' => 'tatouage-doigt.jpg'
            ],
            [
                'name' => 'cartoon',
                'description' => 'Le style cartoon se concentre sur la désacralisation de l\'art du tatouage traditionnel, en réinterprétant et modernisant les motifs classiques. Les contours sont travaillés et soigneusement détaillés pour donner une sensation de mouvement aux couleurs flashy qui créent des formes dynamiques exagérées. Ce style puise son inspiration dans la culture urbaine et le monde du graffiti, ce qui en fait un choix populaire parmi les jeunes générations cherchant à exprimer leur personnalité. Le tatouage cartoon offre un moyen de s\'exprimer uniquement par le biais de l\'art, tout en exprimant sa personnalité et sa créativité à travers un design unique.',
                'img_style' => 'tatouage-cartoon.jpg'
            ],
            [
                'name' => 'portrait',
                'description' => 'Un tatouage de portrait est une forme de tatouage spécifique qui capture le visage ou d\'autres parties du corps humains dans un style réaliste. Cette discipline demande des années d\'expérience et est considérée comme l\'une des plus difficiles à maîtriser. Les artistes en tatouage doivent être très minutieux et précis pour obtenir les meilleurs résultats possibles, car il s\'agit de reproduire une photo réelle sur la peau. Leur travail est une combinaison de talent artistique, d\'attention aux détails et de patience. Les tatouages portrait peuvent être réalisés sur presque n\'importe quelle partie du corps et peuvent être très expressifs et significatifs. En effet, cela peut représenter des personnes qui vous sont chères ou des souvenirs spéciaux que vous souhaitez garder à jamais. Les tatouages portrait sont un moyen puissant pour exprimer votre individualité et pour immortaliser ce qui est important pour vous. ',
                'img_style' => 'tatouage-portrait.jpg'
            ],
            [
                'name' => 'géométrique',
                'description' => 'Le tatouage géométrique est un style de tatouage qui se caractérise par des lignes nettes, des angles droits et des formes simples, telles que des triangles, des carrés et des cercles. Il peut être utilisé pour créer une variété d\'images complexes liées à la spiritualité ou aux croyances culturelles. Les motifs géométriques sont souvent associés à l\'univers tribal et sont également populaires auprès de ceux qui cherchent à symboliser leur identité individuelle. Ces dessins sont considérés comme une forme de tatouage traditionnel et peuvent être créés avec des encres noires ou colorées. Les motifs géométriques peuvent également être combinés pour créer une image complexe représentant quelque chose de spécifique. Le tatouage géométrique est un choix populaire parmi ceux qui recherchent un design unique et élégant qui peut symboliser leur propre identité et style personnel.',
                'img_style' => 'tatouage-geometrique.jpg'
            ],
            [
                'name' => 'fleur',
                'description' => 'Les tatouages de fleurs ont des designs qui incorporent des motifs floraux et des plantes pour créer un design unique. Ils peuvent être très détaillés, ou plus simples, selon les goûts du porteur. Les variétés de fleurs communément utilisées dans ces types de tatouages sont l\'hibiscus, la rose, le lotus et le jacinthe. Ces designs symbolisent souvent la beauté, la sensibilité et l\'amour éternel. Avec les bonnes couleurs et une conception appropriée, un tatouage floral peut être très élégant et intemporel.  Les tatouages floraux sont parfaits pour ceux qui recherchent quelque chose de subtil et délicat. Ils peuvent être placés dans presque toutes les parties du corps et peuvent être aussi petits ou grands que vous le souhaitez. Ce style de tatouage est également très polyvalent étant donné que vous pouvez l\'adapter à votre personnalité en fonction des fleurs, des couleurs et des designs que vous choisissez. Les tatouages floraux peuvent ajouter une touche de beauté et de sensibilité à n\'importe quel design.',
                'img_style' => 'tatouage-fleur.jpg'
            ],
            [
                'name' => 'calligraphie',
                'description' => 'Le tatouage calligraphie est une forme d\'art qui permet de créer des messages personnels à travers l\'esthétique du lettrage. Ces pièces uniques peuvent être adaptées pour s’adapter aux goûts et styles des différents clients, en fonction de la taille, de la couleur et même du style particulier qu\'ils souhaitent montrer. En effet, le tatouage calligraphie se caractérise par son écriture artistique spéciale qui offre une présentation visuellement harmonieuse et unique. Les artistes tatoueurs utilisent des techniques variées pour créer ces designs, en superposant des couches de lignes et de courbes qui s’enchevêtrent avec grâce. Le résultat est spectaculaire et les œuvres peuvent être portées avec fierté pendant des années. En plus d\'être merveilleusement beau, le tatouage calligraphie permet aux clients d\'exprimer leurs sentiments profonds et personnels à travers un design unique qui parle d\'eux-mêmes.',
                'img_style' => 'tatouage-calligraphie.jpg'
            ],
        ]);
    }
}
