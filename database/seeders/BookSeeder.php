<?php

namespace Database\Seeders;

use App\Domains\Author\Models\Author;
use App\Domains\Book\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::query()
            ->whereIn('nombre', [
                'Gabriel Garcia Marquez',
                'Julio Cortazar',
                'Mario Vargas Llosa',
                'Isabel Allende',
                'Jorge Luis Borges',
                'Paulo Coelho',
                'Stephen King',
                'J.K. Rowling',
                'George Orwell',
                'Franz Kafka',
                'Ernest Hemingway',
                'William Shakespeare',
            ])
            ->get()
            ->keyBy('nombre');

        $books = [
            // Gabriel Garcia Marquez (9)
            ['autor' => 'Gabriel Garcia Marquez', 'titulo' => 'Cien anos de soledad', 'descripcion' => 'Saga familiar en Macondo que explora la soledad, el tiempo y el destino.', 'fecha_publicacion' => '1967-05-30', 'genero' => 'Realismo magico'],
            ['autor' => 'Gabriel Garcia Marquez', 'titulo' => 'El amor en los tiempos del colera', 'descripcion' => 'Historia de amor persistente que atraviesa decadas y transformaciones sociales.', 'fecha_publicacion' => '1985-09-05', 'genero' => 'Romance'],
            ['autor' => 'Gabriel Garcia Marquez', 'titulo' => 'Cronica de una muerte anunciada', 'descripcion' => 'Relato coral sobre un crimen anunciado que nadie logra evitar.', 'fecha_publicacion' => '1981-03-01', 'genero' => 'Misterio'],
            ['autor' => 'Gabriel Garcia Marquez', 'titulo' => 'El coronel no tiene quien le escriba', 'descripcion' => 'Retrato de la espera y la dignidad en medio de la pobreza.', 'fecha_publicacion' => '1961-01-01', 'genero' => 'Drama'],
            ['autor' => 'Gabriel Garcia Marquez', 'titulo' => 'La hojarasca', 'descripcion' => 'Primera novela del universo de Macondo sobre memoria y decadencia.', 'fecha_publicacion' => '1955-01-01', 'genero' => 'Literatura clasica'],
            ['autor' => 'Gabriel Garcia Marquez', 'titulo' => 'El otono del patriarca', 'descripcion' => 'Vision poetica del poder absoluto y su corrupcion.', 'fecha_publicacion' => '1975-01-01', 'genero' => 'Drama'],
            ['autor' => 'Gabriel Garcia Marquez', 'titulo' => 'Del amor y otros demonios', 'descripcion' => 'Novela sobre fanatismo, pasion y diferencia cultural en la colonia.', 'fecha_publicacion' => '1994-01-01', 'genero' => 'Realismo magico'],
            ['autor' => 'Gabriel Garcia Marquez', 'titulo' => 'Memoria de mis putas tristes', 'descripcion' => 'Reflexion sobre el deseo y la vejez con tono intimista.', 'fecha_publicacion' => '2004-10-20', 'genero' => 'Drama'],
            ['autor' => 'Gabriel Garcia Marquez', 'titulo' => 'Relato de un naufrago', 'descripcion' => 'Cronica basada en hechos reales sobre supervivencia en el mar.', 'fecha_publicacion' => '1970-01-01', 'genero' => 'Aventura'],

            // Julio Cortazar (8)
            ['autor' => 'Julio Cortazar', 'titulo' => 'Rayuela', 'descripcion' => 'Novela abierta que invita al lector a elegir distintos recorridos narrativos.', 'fecha_publicacion' => '1963-06-28', 'genero' => 'Literatura clasica'],
            ['autor' => 'Julio Cortazar', 'titulo' => 'Bestiario', 'descripcion' => 'Coleccion de cuentos que mezcla lo cotidiano con lo inquietante.', 'fecha_publicacion' => '1951-01-01', 'genero' => 'Misterio'],
            ['autor' => 'Julio Cortazar', 'titulo' => 'Final del juego', 'descripcion' => 'Relatos sobre la infancia, el deseo y las fisuras de la realidad.', 'fecha_publicacion' => '1956-01-01', 'genero' => 'Drama'],
            ['autor' => 'Julio Cortazar', 'titulo' => 'Las armas secretas', 'descripcion' => 'Cuentos emblematicos con exploraciones psicologicas y fantasticas.', 'fecha_publicacion' => '1959-01-01', 'genero' => 'Filosofia'],
            ['autor' => 'Julio Cortazar', 'titulo' => 'Historias de cronopios y de famas', 'descripcion' => 'Textos breves, ludicos y satiricos sobre la condicion humana.', 'fecha_publicacion' => '1962-01-01', 'genero' => 'Filosofia'],
            ['autor' => 'Julio Cortazar', 'titulo' => '62 Modelo para armar', 'descripcion' => 'Novela experimental construida como rompecabezas literario.', 'fecha_publicacion' => '1968-01-01', 'genero' => 'Literatura clasica'],
            ['autor' => 'Julio Cortazar', 'titulo' => 'Todos los fuegos el fuego', 'descripcion' => 'Cuentos que entrelazan tiempos y pasiones en tension constante.', 'fecha_publicacion' => '1966-01-01', 'genero' => 'Drama'],
            ['autor' => 'Julio Cortazar', 'titulo' => 'Un tal Lucas', 'descripcion' => 'Prosa hibrida de humor y reflexion sobre la vida moderna.', 'fecha_publicacion' => '1979-01-01', 'genero' => 'Filosofia'],

            // Mario Vargas Llosa (8)
            ['autor' => 'Mario Vargas Llosa', 'titulo' => 'La ciudad y los perros', 'descripcion' => 'Novela sobre disciplina militar, violencia y formacion juvenil.', 'fecha_publicacion' => '1963-01-01', 'genero' => 'Drama'],
            ['autor' => 'Mario Vargas Llosa', 'titulo' => 'La casa verde', 'descripcion' => 'Historia coral sobre poder, deseo y marginalidad en el Peru.', 'fecha_publicacion' => '1966-01-01', 'genero' => 'Literatura clasica'],
            ['autor' => 'Mario Vargas Llosa', 'titulo' => 'Conversacion en La Catedral', 'descripcion' => 'Radiografia politica y moral de una epoca autoritaria.', 'fecha_publicacion' => '1969-01-01', 'genero' => 'Drama'],
            ['autor' => 'Mario Vargas Llosa', 'titulo' => 'Pantaleon y las visitadoras', 'descripcion' => 'Satira sobre burocracia militar y moral publica.', 'fecha_publicacion' => '1973-01-01', 'genero' => 'Drama'],
            ['autor' => 'Mario Vargas Llosa', 'titulo' => 'La guerra del fin del mundo', 'descripcion' => 'Epicentro historico sobre fanatismo y conflicto social en Brasil.', 'fecha_publicacion' => '1981-01-01', 'genero' => 'Aventura'],
            ['autor' => 'Mario Vargas Llosa', 'titulo' => 'La fiesta del chivo', 'descripcion' => 'Novela politica sobre dictadura, memoria y trauma colectivo.', 'fecha_publicacion' => '2000-01-01', 'genero' => 'Drama'],
            ['autor' => 'Mario Vargas Llosa', 'titulo' => 'Travesuras de la nina mala', 'descripcion' => 'Historia romantica marcada por obsesion y desencuentros.', 'fecha_publicacion' => '2006-01-01', 'genero' => 'Romance'],
            ['autor' => 'Mario Vargas Llosa', 'titulo' => 'El sueno del celta', 'descripcion' => 'Novela historica sobre derechos humanos y colonialismo.', 'fecha_publicacion' => '2010-11-03', 'genero' => 'Aventura'],

            // Isabel Allende (8)
            ['autor' => 'Isabel Allende', 'titulo' => 'La casa de los espiritus', 'descripcion' => 'Saga familiar con elementos fantasticos y contexto politico.', 'fecha_publicacion' => '1982-01-01', 'genero' => 'Realismo magico'],
            ['autor' => 'Isabel Allende', 'titulo' => 'De amor y de sombra', 'descripcion' => 'Novela de amor y denuncia en tiempos de represion.', 'fecha_publicacion' => '1984-01-01', 'genero' => 'Romance'],
            ['autor' => 'Isabel Allende', 'titulo' => 'Eva Luna', 'descripcion' => 'Historia de vida y narracion oral en una Latinoamerica convulsa.', 'fecha_publicacion' => '1987-01-01', 'genero' => 'Drama'],
            ['autor' => 'Isabel Allende', 'titulo' => 'Cuentos de Eva Luna', 'descripcion' => 'Relatos sobre deseo, justicia y supervivencia.', 'fecha_publicacion' => '1989-01-01', 'genero' => 'Literatura clasica'],
            ['autor' => 'Isabel Allende', 'titulo' => 'Paula', 'descripcion' => 'Memoria autobiografica escrita desde el dolor y el amor filial.', 'fecha_publicacion' => '1994-01-01', 'genero' => 'Drama'],
            ['autor' => 'Isabel Allende', 'titulo' => 'Hija de la fortuna', 'descripcion' => 'Aventura historica sobre identidad y viaje personal.', 'fecha_publicacion' => '1999-01-01', 'genero' => 'Aventura'],
            ['autor' => 'Isabel Allende', 'titulo' => 'Retrato en sepia', 'descripcion' => 'Continuacion genealogica marcada por secretos familiares.', 'fecha_publicacion' => '2000-01-01', 'genero' => 'Drama'],
            ['autor' => 'Isabel Allende', 'titulo' => 'Ines del alma mia', 'descripcion' => 'Novela historica sobre conquista y resistencia.', 'fecha_publicacion' => '2006-01-01', 'genero' => 'Aventura'],

            // Jorge Luis Borges (8)
            ['autor' => 'Jorge Luis Borges', 'titulo' => 'Ficciones', 'descripcion' => 'Cuentos filosoficos sobre laberintos, espejos y realidad.', 'fecha_publicacion' => '1944-01-01', 'genero' => 'Filosofia'],
            ['autor' => 'Jorge Luis Borges', 'titulo' => 'El Aleph', 'descripcion' => 'Relatos sobre infinito, memoria y metafisica.', 'fecha_publicacion' => '1949-01-01', 'genero' => 'Filosofia'],
            ['autor' => 'Jorge Luis Borges', 'titulo' => 'El libro de arena', 'descripcion' => 'Cuentos tardios sobre objetos imposibles y paradojas.', 'fecha_publicacion' => '1975-01-01', 'genero' => 'Misterio'],
            ['autor' => 'Jorge Luis Borges', 'titulo' => 'Historia universal de la infamia', 'descripcion' => 'Perfiles literarios de criminales y aventureros.', 'fecha_publicacion' => '1935-01-01', 'genero' => 'Aventura'],
            ['autor' => 'Jorge Luis Borges', 'titulo' => 'El informe de Brodie', 'descripcion' => 'Coleccion de cuentos con tono sobrio y reflexivo.', 'fecha_publicacion' => '1970-01-01', 'genero' => 'Literatura clasica'],
            ['autor' => 'Jorge Luis Borges', 'titulo' => 'Elogio de la sombra', 'descripcion' => 'Poesia y prosa sobre ceguera, tiempo y destino.', 'fecha_publicacion' => '1969-01-01', 'genero' => 'Filosofia'],
            ['autor' => 'Jorge Luis Borges', 'titulo' => 'Nueve ensayos dantescos', 'descripcion' => 'Ensayos sobre Dante desde una mirada erudita y personal.', 'fecha_publicacion' => '1982-01-01', 'genero' => 'Filosofia'],
            ['autor' => 'Jorge Luis Borges', 'titulo' => 'Discusion', 'descripcion' => 'Ensayos sobre literatura, historia y pensamiento.', 'fecha_publicacion' => '1932-01-01', 'genero' => 'Filosofia'],

            // Paulo Coelho (8)
            ['autor' => 'Paulo Coelho', 'titulo' => 'El alquimista', 'descripcion' => 'Fabula sobre destino personal y busqueda interior.', 'fecha_publicacion' => '1988-01-01', 'genero' => 'Filosofia'],
            ['autor' => 'Paulo Coelho', 'titulo' => 'Brida', 'descripcion' => 'Historia de iniciacion espiritual y autodescubrimiento.', 'fecha_publicacion' => '1990-01-01', 'genero' => 'Filosofia'],
            ['autor' => 'Paulo Coelho', 'titulo' => 'Veronika decide morir', 'descripcion' => 'Novela sobre salud mental, libertad y sentido de vida.', 'fecha_publicacion' => '1998-01-01', 'genero' => 'Drama'],
            ['autor' => 'Paulo Coelho', 'titulo' => 'A orillas del rio Piedra me sente y llore', 'descripcion' => 'Romance espiritual sobre fe y reconciliacion.', 'fecha_publicacion' => '1994-01-01', 'genero' => 'Romance'],
            ['autor' => 'Paulo Coelho', 'titulo' => 'Once minutos', 'descripcion' => 'Reflexion sobre deseo, intimidad y dignidad.', 'fecha_publicacion' => '2003-01-01', 'genero' => 'Romance'],
            ['autor' => 'Paulo Coelho', 'titulo' => 'El Zahir', 'descripcion' => 'Busqueda existencial atravesada por obsesion y perdida.', 'fecha_publicacion' => '2005-01-01', 'genero' => 'Filosofia'],
            ['autor' => 'Paulo Coelho', 'titulo' => 'El vencedor esta solo', 'descripcion' => 'Critica al exito superficial en la industria cultural.', 'fecha_publicacion' => '2008-01-01', 'genero' => 'Drama'],
            ['autor' => 'Paulo Coelho', 'titulo' => 'Aleph', 'descripcion' => 'Viaje fisico y espiritual inspirado en experiencias personales.', 'fecha_publicacion' => '2010-01-01', 'genero' => 'Filosofia'],

            // Stephen King (9)
            ['autor' => 'Stephen King', 'titulo' => 'Carrie', 'descripcion' => 'Historia de terror sobre acoso escolar y poderes telequineticos.', 'fecha_publicacion' => '1974-04-05', 'genero' => 'Terror'],
            ['autor' => 'Stephen King', 'titulo' => 'El resplandor', 'descripcion' => 'Novela de horror psicologico en un hotel aislado.', 'fecha_publicacion' => '1977-01-28', 'genero' => 'Terror'],
            ['autor' => 'Stephen King', 'titulo' => 'It', 'descripcion' => 'Grupo de amigos enfrenta una entidad maligna en su ciudad.', 'fecha_publicacion' => '1986-09-15', 'genero' => 'Terror'],
            ['autor' => 'Stephen King', 'titulo' => 'Misery', 'descripcion' => 'Thriller claustrofobico sobre obsesion y cautiverio.', 'fecha_publicacion' => '1987-06-08', 'genero' => 'Misterio'],
            ['autor' => 'Stephen King', 'titulo' => 'Cementerio de animales', 'descripcion' => 'Relato inquietante sobre duelo y consecuencias sobrenaturales.', 'fecha_publicacion' => '1983-11-14', 'genero' => 'Terror'],
            ['autor' => 'Stephen King', 'titulo' => 'La milla verde', 'descripcion' => 'Drama carcelario con elementos fantasticos y humanistas.', 'fecha_publicacion' => '1996-01-01', 'genero' => 'Drama'],
            ['autor' => 'Stephen King', 'titulo' => '22/11/63', 'descripcion' => 'Viaje temporal para impedir un magnicidio historico.', 'fecha_publicacion' => '2011-11-08', 'genero' => 'Ciencia ficcion'],
            ['autor' => 'Stephen King', 'titulo' => 'Doctor Sleep', 'descripcion' => 'Secuela de El resplandor sobre trauma y redencion.', 'fecha_publicacion' => '2013-09-24', 'genero' => 'Terror'],
            ['autor' => 'Stephen King', 'titulo' => 'El instituto', 'descripcion' => 'Ninos con habilidades especiales enfrentan una institucion secreta.', 'fecha_publicacion' => '2019-09-10', 'genero' => 'Ciencia ficcion'],

            // J.K. Rowling (9)
            ['autor' => 'J.K. Rowling', 'titulo' => 'Harry Potter y la piedra filosofal', 'descripcion' => 'Inicio de la saga del joven mago en Hogwarts.', 'fecha_publicacion' => '1997-06-26', 'genero' => 'Fantasia'],
            ['autor' => 'J.K. Rowling', 'titulo' => 'Harry Potter y la camara secreta', 'descripcion' => 'Segundo curso de Harry con amenazas ocultas en el castillo.', 'fecha_publicacion' => '1998-07-02', 'genero' => 'Fantasia'],
            ['autor' => 'J.K. Rowling', 'titulo' => 'Harry Potter y el prisionero de Azkaban', 'descripcion' => 'Aparicion de nuevos secretos sobre el pasado de Harry.', 'fecha_publicacion' => '1999-07-08', 'genero' => 'Fantasia'],
            ['autor' => 'J.K. Rowling', 'titulo' => 'Harry Potter y el caliz de fuego', 'descripcion' => 'Torneo magico marcado por peligros y regreso de un enemigo.', 'fecha_publicacion' => '2000-07-08', 'genero' => 'Fantasia'],
            ['autor' => 'J.K. Rowling', 'titulo' => 'Harry Potter y la Orden del Fenix', 'descripcion' => 'Resistencia estudiantil frente a la negacion institucional.', 'fecha_publicacion' => '2003-06-21', 'genero' => 'Fantasia'],
            ['autor' => 'J.K. Rowling', 'titulo' => 'Harry Potter y el misterio del principe', 'descripcion' => 'Revelaciones clave en la lucha contra las artes oscuras.', 'fecha_publicacion' => '2005-07-16', 'genero' => 'Fantasia'],
            ['autor' => 'J.K. Rowling', 'titulo' => 'Harry Potter y las reliquias de la muerte', 'descripcion' => 'Cierre epico de la saga y enfrentamiento final.', 'fecha_publicacion' => '2007-07-21', 'genero' => 'Fantasia'],
            ['autor' => 'J.K. Rowling', 'titulo' => 'Animales fantasticos y donde encontrarlos', 'descripcion' => 'Compendio del universo magico con criaturas extraordinarias.', 'fecha_publicacion' => '2001-03-01', 'genero' => 'Fantasia'],
            ['autor' => 'J.K. Rowling', 'titulo' => 'Los cuentos de Beedle el Bardo', 'descripcion' => 'Recopilacion de cuentos tradicionales del mundo magico.', 'fecha_publicacion' => '2008-12-04', 'genero' => 'Fantasia'],

            // George Orwell (8)
            ['autor' => 'George Orwell', 'titulo' => '1984', 'descripcion' => 'Distopia sobre vigilancia total, propaganda y control del lenguaje.', 'fecha_publicacion' => '1949-06-08', 'genero' => 'Ciencia ficcion'],
            ['autor' => 'George Orwell', 'titulo' => 'Rebelion en la granja', 'descripcion' => 'Fabula politica sobre el poder y la corrupcion revolucionaria.', 'fecha_publicacion' => '1945-08-17', 'genero' => 'Drama'],
            ['autor' => 'George Orwell', 'titulo' => 'Homenaje a Cataluna', 'descripcion' => 'Testimonio de su experiencia en la Guerra Civil espanola.', 'fecha_publicacion' => '1938-01-01', 'genero' => 'Aventura'],
            ['autor' => 'George Orwell', 'titulo' => 'Sin blanca en Paris y Londres', 'descripcion' => 'Cronica social sobre pobreza y trabajo precario.', 'fecha_publicacion' => '1933-01-01', 'genero' => 'Drama'],
            ['autor' => 'George Orwell', 'titulo' => 'La hija del clerigo', 'descripcion' => 'Novela sobre alienacion, fe y exclusión social.', 'fecha_publicacion' => '1935-01-01', 'genero' => 'Drama'],
            ['autor' => 'George Orwell', 'titulo' => 'Que no muera la aspidistra', 'descripcion' => 'Critica a la sociedad de consumo y al conformismo.', 'fecha_publicacion' => '1936-01-01', 'genero' => 'Filosofia'],
            ['autor' => 'George Orwell', 'titulo' => 'Subir a por aire', 'descripcion' => 'Reflexion sobre nostalgia y amenaza de guerra.', 'fecha_publicacion' => '1939-01-01', 'genero' => 'Drama'],
            ['autor' => 'George Orwell', 'titulo' => 'Los dias de Birmania', 'descripcion' => 'Novela sobre colonialismo, racismo y decadencia moral.', 'fecha_publicacion' => '1934-01-01', 'genero' => 'Literatura clasica'],

            // Franz Kafka (8)
            ['autor' => 'Franz Kafka', 'titulo' => 'La metamorfosis', 'descripcion' => 'Relato simbolico sobre alienacion y perdida de identidad.', 'fecha_publicacion' => '1915-10-01', 'genero' => 'Filosofia'],
            ['autor' => 'Franz Kafka', 'titulo' => 'El proceso', 'descripcion' => 'Novela sobre burocracia absurda y culpa sin causa aparente.', 'fecha_publicacion' => '1925-01-01', 'genero' => 'Drama'],
            ['autor' => 'Franz Kafka', 'titulo' => 'El castillo', 'descripcion' => 'Historia incompleta sobre poder opaco e inaccesible.', 'fecha_publicacion' => '1926-01-01', 'genero' => 'Misterio'],
            ['autor' => 'Franz Kafka', 'titulo' => 'America', 'descripcion' => 'Novela sobre desarraigo y desconcierto en el mundo moderno.', 'fecha_publicacion' => '1927-01-01', 'genero' => 'Aventura'],
            ['autor' => 'Franz Kafka', 'titulo' => 'En la colonia penitenciaria', 'descripcion' => 'Cuento perturbador sobre castigo y violencia institucional.', 'fecha_publicacion' => '1919-01-01', 'genero' => 'Terror'],
            ['autor' => 'Franz Kafka', 'titulo' => 'Un medico rural', 'descripcion' => 'Relatos de tono onirico y angustiante.', 'fecha_publicacion' => '1919-01-01', 'genero' => 'Misterio'],
            ['autor' => 'Franz Kafka', 'titulo' => 'Carta al padre', 'descripcion' => 'Texto autobiografico sobre autoridad y conflicto familiar.', 'fecha_publicacion' => '1919-11-01', 'genero' => 'Drama'],
            ['autor' => 'Franz Kafka', 'titulo' => 'Contemplacion', 'descripcion' => 'Breves piezas sobre soledad, ciudad y extraneza.', 'fecha_publicacion' => '1912-01-01', 'genero' => 'Filosofia'],

            // Ernest Hemingway (8)
            ['autor' => 'Ernest Hemingway', 'titulo' => 'El viejo y el mar', 'descripcion' => 'Lucha de un pescador contra la naturaleza y su propio orgullo.', 'fecha_publicacion' => '1952-09-01', 'genero' => 'Aventura'],
            ['autor' => 'Ernest Hemingway', 'titulo' => 'Adios a las armas', 'descripcion' => 'Novela sobre guerra, amor y desilusion.', 'fecha_publicacion' => '1929-01-01', 'genero' => 'Romance'],
            ['autor' => 'Ernest Hemingway', 'titulo' => 'Por quien doblan las campanas', 'descripcion' => 'Historia de sacrificio y compromiso durante la guerra civil.', 'fecha_publicacion' => '1940-10-21', 'genero' => 'Drama'],
            ['autor' => 'Ernest Hemingway', 'titulo' => 'Fiesta', 'descripcion' => 'Retrato de la generacion perdida en la Europa de entreguerras.', 'fecha_publicacion' => '1926-10-22', 'genero' => 'Literatura clasica'],
            ['autor' => 'Ernest Hemingway', 'titulo' => 'Tener y no tener', 'descripcion' => 'Novela social sobre supervivencia y desigualdad.', 'fecha_publicacion' => '1937-01-01', 'genero' => 'Drama'],
            ['autor' => 'Ernest Hemingway', 'titulo' => 'Las nieves del Kilimanjaro', 'descripcion' => 'Cuento sobre memoria, arte y arrepentimiento.', 'fecha_publicacion' => '1936-01-01', 'genero' => 'Drama'],
            ['autor' => 'Ernest Hemingway', 'titulo' => 'Paris era una fiesta', 'descripcion' => 'Memorias sobre su juventud literaria en Paris.', 'fecha_publicacion' => '1964-01-01', 'genero' => 'Literatura clasica'],
            ['autor' => 'Ernest Hemingway', 'titulo' => 'Muerte en la tarde', 'descripcion' => 'Ensayo narrativo sobre tauromaquia y sentido estetico.', 'fecha_publicacion' => '1932-01-01', 'genero' => 'Filosofia'],

            // William Shakespeare (9)
            ['autor' => 'William Shakespeare', 'titulo' => 'Hamlet', 'descripcion' => 'Tragedia sobre venganza, duda y corrupcion moral.', 'fecha_publicacion' => '1603-01-01', 'genero' => 'Drama'],
            ['autor' => 'William Shakespeare', 'titulo' => 'Macbeth', 'descripcion' => 'Tragedia politica sobre ambicion, culpa y destino.', 'fecha_publicacion' => '1606-01-01', 'genero' => 'Drama'],
            ['autor' => 'William Shakespeare', 'titulo' => 'Romeo y Julieta', 'descripcion' => 'Historia de amor tragico entre familias rivales.', 'fecha_publicacion' => '1597-01-01', 'genero' => 'Romance'],
            ['autor' => 'William Shakespeare', 'titulo' => 'Otelo', 'descripcion' => 'Tragedia sobre celos, manipulacion y honor.', 'fecha_publicacion' => '1604-01-01', 'genero' => 'Drama'],
            ['autor' => 'William Shakespeare', 'titulo' => 'El rey Lear', 'descripcion' => 'Drama familiar y politico sobre poder y locura.', 'fecha_publicacion' => '1608-01-01', 'genero' => 'Drama'],
            ['autor' => 'William Shakespeare', 'titulo' => 'La tempestad', 'descripcion' => 'Obra final sobre perdon, magia y reconciliacion.', 'fecha_publicacion' => '1611-01-01', 'genero' => 'Fantasia'],
            ['autor' => 'William Shakespeare', 'titulo' => 'Sueno de una noche de verano', 'descripcion' => 'Comedia fantastica sobre amor y enredos.', 'fecha_publicacion' => '1595-01-01', 'genero' => 'Fantasia'],
            ['autor' => 'William Shakespeare', 'titulo' => 'Julio Cesar', 'descripcion' => 'Tragedia historica sobre conspiracion y retorica politica.', 'fecha_publicacion' => '1599-01-01', 'genero' => 'Literatura clasica'],
            ['autor' => 'William Shakespeare', 'titulo' => 'El mercader de Venecia', 'descripcion' => 'Drama judicial sobre justicia, deuda y prejuicio.', 'fecha_publicacion' => '1600-01-01', 'genero' => 'Drama'],
        ];

        $rows = [];

        foreach ($books as $index => $book) {
            $author = $authors->get($book['autor']);

            if (! $author) {
                continue;
            }

            $rows[] = [
                'titulo' => $book['titulo'],
                'descripcion' => $book['descripcion'],
                'fecha_publicacion' => $book['fecha_publicacion'],
                'genero' => $book['genero'],
                'isbn' => $this->generateIsbn($index + 1),
                'portada' => null,
                'autor_id' => $author->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach ($rows as $row) {
            Book::updateOrCreate(
                ['isbn' => $row['isbn']],
                $row
            );
        }
    }

    private function generateIsbn(int $sequence): string
    {
        $group = str_pad((string) (($sequence % 97) + 1), 2, '0', STR_PAD_LEFT);
        $publisher = str_pad((string) (($sequence * 13) % 10000), 4, '0', STR_PAD_LEFT);
        $title = str_pad((string) (($sequence * 37) % 10000), 4, '0', STR_PAD_LEFT);
        $check = ($sequence * 7) % 10;

        return "978-{$group}-{$publisher}-{$title}-{$check}";
    }
}
