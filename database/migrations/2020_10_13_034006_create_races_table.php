<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('englishname')->nullable();
            $table->uuid('specie')->nullable();
            $table->uuid('genotype')->nullable();
            $table->string('origin')->nullable();
            $table->string('description')->nullable();
            $table->string('grupo')->nullable();
            $table->timestamps();
        });
        if (Schema::hasTable('races'))
        {
            DB::table('races')->insert(array('id'=>1,'name'=>'Abissínio','englishname'=>'Abyssinian','specie'=>2,'origin'=>'Etiópia','description'=>''));
            DB::table('races')->insert(array('id'=>2,'name'=>'Angorá turco','englishname'=>'Turkish angora','specie'=>2,'origin'=>'Turquia','description'=>''));
            DB::table('races')->insert(array('id'=>3,'name'=>'Asiático de Pelo Semi-Longo','englishname'=>'Asian Semi-longhair','specie'=>2,'origin'=>'Reino Unido','description'=>''));
            DB::table('races')->insert(array('id'=>4,'name'=>'Azul Russo','englishname'=>'Russian Blue','specie'=>2,'origin'=>'Rússia','description'=>''));
            DB::table('races')->insert(array('id'=>5,'name'=>'Balinês','englishname'=>'Balinese','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>6,'name'=>'Bambino','englishname'=>'Bambino cat','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>7,'name'=>'Bicolor Oriental','englishname'=>'Oriental Bicolour','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>8,'name'=>'Bobtail americano','englishname'=>'American Bobtail','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>9,'name'=>'Bobtail japonês','englishname'=>'Japanese Bobtail','specie'=>2,'origin'=>'Japão','description'=>''));
            DB::table('races')->insert(array('id'=>10,'name'=>'Bombaim','englishname'=>'Bombay','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            /*DB::table('races')->insert(array('id'=>12,'name'=>'Burmês','englishname'=>'Burmese','specie'=>2,'origin'=>'Tailândia','description'=>''));
            DB::table('races')->insert(array('id'=>13,'name'=>'Burmila','englishname'=>'Burmilla','specie'=>2,'origin'=>'Reino Unido','description'=>''));
            DB::table('races')->insert(array('id'=>14,'name'=>'California Spangled','englishname'=>'California Spangled','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>15,'name'=>'Cingapura','englishname'=>'Singapura','specie'=>2,'origin'=>'Singapura','description'=>''));
            DB::table('races')->insert(array('id'=>16,'name'=>'Chartreux','englishname'=>'Chartreux','specie'=>2,'origin'=>'França','description'=>''));
            DB::table('races')->insert(array('id'=>17,'name'=>'Chausie','englishname'=>'Chausie','specie'=>2,'origin'=>'França','description'=>''));
            DB::table('races')->insert(array('id'=>18,'name'=>'Colorpoint de pelo curto','englishname'=>'Colorpoint Shorthair','specie'=>2,'origin'=>'Estados Unidos /  Inglaterra','description'=>''));
            DB::table('races')->insert(array('id'=>19,'name'=>'Cornish Rex','englishname'=>'Cornish Rex','specie'=>2,'origin'=>'Reino Unido','description'=>''));
            DB::table('races')->insert(array('id'=>20,'name'=>'Curl Americano','englishname'=>'American Curl','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>21,'name'=>'Devon Rex','englishname'=>'Devon Rex','specie'=>2,'origin'=>'Reino Unido','description'=>''));
            DB::table('races')->insert(array('id'=>22,'name'=>'Donskoy','englishname'=>'Donskoy','specie'=>2,'origin'=>'Rússia','description'=>''));
            DB::table('races')->insert(array('id'=>23,'name'=>'Dragon Li','englishname'=>'Dragon Li','specie'=>2,'origin'=>'China','description'=>''));
            DB::table('races')->insert(array('id'=>24,'name'=>'Egeu','englishname'=>'Aegean','specie'=>2,'origin'=>'Grécia','description'=>''));
            DB::table('races')->insert(array('id'=>25,'name'=>'Gato-de-Bengala','englishname'=>'Bengal','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>26,'name'=>'Gato do Chipre','englishname'=>'Cyprus Cat','specie'=>2,'origin'=>'Chipre','description'=>''));
            DB::table('races')->insert(array('id'=>27,'name'=>'Exótico','englishname'=>'Exotic Shorthair','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>28,'name'=>'Gato asiático','englishname'=>'Asian Cat','specie'=>2,'origin'=>'Reino Unido','description'=>''));
            DB::table('races')->insert(array('id'=>29,'name'=>'Gato Siberiano','englishname'=>'Siberian','specie'=>2,'origin'=>'Rússia','description'=>''));
            DB::table('races')->insert(array('id'=>30,'name'=>'Havana marrom','englishname'=>'Havana Brown','specie'=>2,'origin'=>'Reino Unido','description'=>''));
            DB::table('races')->insert(array('id'=>31,'name'=>'Himalaio','englishname'=>'Himalayan','specie'=>2,'origin'=>'Nepal','description'=>''));
            DB::table('races')->insert(array('id'=>32,'name'=>'Javanês','englishname'=>'Javanese','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>33,'name'=>'Korat','englishname'=>'Korat','specie'=>2,'origin'=>'Tailândia','description'=>''));
            DB::table('races')->insert(array('id'=>34,'name'=>'Khao Manee','englishname'=>'Khao Manee','specie'=>2,'origin'=>'Tailândia','description'=>''));
            DB::table('races')->insert(array('id'=>35,'name'=>'Kurilian Bobtail','englishname'=>'Kurilian Bobtail','specie'=>2,'origin'=>'Rússia','description'=>''));
            DB::table('races')->insert(array('id'=>36,'name'=>'LaPerml','englishname'=>'LaPerm','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>37,'name'=>'Levkoy ucraniano','englishname'=>'Ukrainian Levkoy','specie'=>2,'origin'=>'Ucrânia','description'=>''));
            DB::table('races')->insert(array('id'=>38,'name'=>'Lykoi','englishname'=>'Lykoi','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>39,'name'=>'Maine Coon','englishname'=>'Maine Coon','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>40,'name'=>'Manx','englishname'=>'Manx','specie'=>2,'origin'=>'Reino Unido','description'=>''));
            DB::table('races')->insert(array('id'=>41,'name'=>'Manx de pelo longo','englishname'=>'Manx Longhair Cymric cat','specie'=>2,'origin'=>'Canadá','description'=>''));
            DB::table('races')->insert(array('id'=>42,'name'=>'Mau Árabe','englishname'=>'Arabian Mau','specie'=>2,'origin'=>'Arábia Saudita /  Emirados Árabes Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>43,'name'=>'Mau egípcio','englishname'=>'Egyptian Mau','specie'=>2,'origin'=>'Egito','description'=>''));
            DB::table('races')->insert(array('id'=>44,'name'=>'Minskin','englishname'=>'Minskin','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>45,'name'=>'Mist Australiano','englishname'=>'Australian Mist','specie'=>2,'origin'=>'Austrália','description'=>''));
            DB::table('races')->insert(array('id'=>46,'name'=>'Munchkin','englishname'=>'Munchkin cat','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>47,'name'=>'Nebelung','englishname'=>'Nebelung','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>48,'name'=>'Norueguês da Floresta','englishname'=>'Norwergian Forest Cat','specie'=>2,'origin'=>'Noruega','description'=>''));
            DB::table('races')->insert(array('id'=>49,'name'=>'Ocicat','englishname'=>'Ocicat','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>50,'name'=>'Ojos Azules','englishname'=>'Ojos Azules','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>51,'name'=>'Oregon Rex','englishname'=>'Oregon Rex','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>52,'name'=>'Pelo curto americano','englishname'=>'American Shorthair','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>53,'name'=>'Pelo curto brasileiro','englishname'=>'Brazilian Shorthair','specie'=>2,'origin'=>'Brasil','description'=>''));
            DB::table('races')->insert(array('id'=>54,'name'=>'Pelo curto Europeu','englishname'=>'European Shorthair','specie'=>2,'origin'=>'Suécia','description'=>''));
            DB::table('races')->insert(array('id'=>55,'name'=>'Pelo curto inglês','englishname'=>'British Shorthair','specie'=>2,'origin'=>'Reino Unido','description'=>''));
            DB::table('races')->insert(array('id'=>56,'name'=>'Pelo longo Inglês','englishname'=>'British Longhair','specie'=>2,'origin'=>'Reino Unido','description'=>''));
            DB::table('races')->insert(array('id'=>57,'name'=>'Pelo curto Oriental','englishname'=>'Oriental Shorthair','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>58,'name'=>'Pelo longo Oriental','englishname'=>'Oriental Longhair','specie'=>2,'origin'=>'Inglaterra','description'=>''));
            DB::table('races')->insert(array('id'=>59,'name'=>'Persa','englishname'=>'Persian','specie'=>2,'origin'=>'Irão','description'=>''));
            DB::table('races')->insert(array('id'=>60,'name'=>'Peterbald','englishname'=>'Peterbald','specie'=>2,'origin'=>'Rússia','description'=>''));
            DB::table('races')->insert(array('id'=>61,'name'=>'Pixie-bob','englishname'=>'Pixie-bob','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>62,'name'=>'Raas','englishname'=>'Raas','specie'=>2,'origin'=>'Indonésia','description'=>''));
            DB::table('races')->insert(array('id'=>63,'name'=>'Ragamuffin','englishname'=>'Ragamuffin','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>64,'name'=>'Ragdoll','englishname'=>'Ragdoll','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>65,'name'=>'Rex Alemão','englishname'=>'German Rex','specie'=>2,'origin'=>'Alemanha','description'=>''));
            DB::table('races')->insert(array('id'=>66,'name'=>'Sagrado da Birmânia','englishname'=>'Birman','specie'=>2,'origin'=>'Mianmar','description'=>''));
            DB::table('races')->insert(array('id'=>67,'name'=>'Savannah','englishname'=>'Savannah','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>68,'name'=>'Scottish Fold','englishname'=>'Scottish Fold','specie'=>2,'origin'=>'Escócia','description'=>''));
            DB::table('races')->insert(array('id'=>69,'name'=>'Selkirk Rex','englishname'=>'Selkirk Rex','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>70,'name'=>'Serengeti','englishname'=>'Serengeti','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>71,'name'=>'Siamês','englishname'=>'Siamese','specie'=>2,'origin'=>'Tailândia','description'=>''));
            DB::table('races')->insert(array('id'=>72,'name'=>'Singapura','englishname'=>'Singapura','specie'=>2,'origin'=>'Singapura','description'=>''));
            DB::table('races')->insert(array('id'=>73,'name'=>'Snowshoe','englishname'=>'Snowshoe','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>74,'name'=>'Sokoke','englishname'=>'Sokoke','specie'=>2,'origin'=>'Quênia','description'=>''));
            DB::table('races')->insert(array('id'=>75,'name'=>'Somali','englishname'=>'Somali','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>76,'name'=>'Sphynx','englishname'=>'Sphynx','specie'=>2,'origin'=>'Canadá','description'=>''));
            DB::table('races')->insert(array('id'=>77,'name'=>'Suphalak','englishname'=>'Suphalak','specie'=>2,'origin'=>'Tailândia','description'=>''));
            DB::table('races')->insert(array('id'=>78,'name'=>'Thai','englishname'=>'Thai','specie'=>2,'origin'=>'Tailândia','description'=>''));
            DB::table('races')->insert(array('id'=>79,'name'=>'Tiffany-Chantilly','englishname'=>'Chantilly-Tiffany','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>80,'name'=>'Tonquinês','englishname'=>'Tonkinese','specie'=>2,'origin'=>'Canadá','description'=>''));
            DB::table('races')->insert(array('id'=>81,'name'=>'Toyger','englishname'=>'Toyger','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
            DB::table('races')->insert(array('id'=>82,'name'=>'Van Turco','englishname'=>'Turkish Van','specie'=>2,'origin'=>'Turquia','description'=>''));
            DB::table('races')->insert(array('id'=>83,'name'=>'Wirehair Americano','englishname'=>'American Wirehair','specie'=>2,'origin'=>'Estados Unidos','description'=>''));
                    */                                        
            /*DB::table('races')->insert(array('id'=>84,'name'=>'Akita','englishname'=>'Akita','specie'=>1,'origin'=>'','description'=>'Leal, amigo e brincalhão'));
            DB::table('races')->insert(array('id'=>85,'name'=>'Basset hound','englishname'=>'Basset hound','specie'=>1,'origin'=>'','description'=>'Paciente, teimoso e charmoso'));
            DB::table('races')->insert(array('id'=>86,'name'=>'Beagle','englishname'=>'Beagle','specie'=>1,'origin'=>'','description'=>'Alegre, companheiro e aventureiro'));
            DB::table('races')->insert(array('id'=>87,'name'=>'Bichon frisé','englishname'=>'Bichon frisé','specie'=>1,'origin'=>'','description'=>'Brincalhão, curioso e afetivo'));
            DB::table('races')->insert(array('id'=>88,'name'=>'Boiadeiro australiano','englishname'=>'Boiadeiro australiano','specie'=>1,'origin'=>'','description'=>'Alerta, curioso e leal'));
            DB::table('races')->insert(array('id'=>89,'name'=>'Border collie','englishname'=>'Border collie','specie'=>1,'origin'=>'','description'=>'Inteligente, leal e cheio de energia'));
            DB::table('races')->insert(array('id'=>90,'name'=>'Boston terrier','englishname'=>'Boston terrier','specie'=>1,'origin'=>'','description'=>'Amigável, inteligente e vivaz'));
            DB::table('races')->insert(array('id'=>91,'name'=>'Boxer','englishname'=>'Boxer','specie'=>1,'origin'=>'','description'=>'Leal, afetuoso e brincalhão'));
            DB::table('races')->insert(array('id'=>92,'name'=>'Buldogue francês','englishname'=>'Buldogue francês','specie'=>1,'origin'=>'','description'=>'Carinhoso, leal e brincalhão'));
            DB::table('races')->insert(array('id'=>93,'name'=>'Buldogue inglês','englishname'=>'Buldogue inglês','specie'=>1,'origin'=>'','description'=>'Calmo, divertido e dócil'));
            DB::table('races')->insert(array('id'=>94,'name'=>'Bull terrier','englishname'=>'Bull terrier','specie'=>1,'origin'=>'','description'=>'Travesso, brincalhão e leal'));
            DB::table('races')->insert(array('id'=>95,'name'=>'Cane corso','englishname'=>'Cane corso','specie'=>1,'origin'=>'','description'=>'Protetor, leal e inteligente'));
            DB::table('races')->insert(array('id'=>96,'name'=>'Cavalier king charles spaniel','englishname'=>'Cavalier king charles spaniel','specie'=>1,'origin'=>'','description'=>'Companheiro, alegre e afetuoso'));
            DB::table('races')->insert(array('id'=>97,'name'=>'Chihuahua','englishname'=>'Chihuahua','specie'=>1,'origin'=>'','description'=>'Charmoso, animado e atrevido'));
            DB::table('races')->insert(array('id'=>98,'name'=>'Chow chow','englishname'=>'Chow chow','specie'=>1,'origin'=>'','description'=>'Calmo, leal e orgulhoso'));
            DB::table('races')->insert(array('id'=>99,'name'=>'Cocker spaniel inglês','englishname'=>'Cocker spaniel inglês','specie'=>1,'origin'=>'','description'=>'Alegre, carinhoso e cheio de vida'));
            DB::table('races')->insert(array('id'=>100,'name'=>'Dachshund','englishname'=>'Dachshund','specie'=>1,'origin'=>'','description'=>'Corajoso, animado e inteligente'));
            DB::table('races')->insert(array('id'=>101,'name'=>'Dálmata','englishname'=>'Dálmata','specie'=>1,'origin'=>'','description'=>'Atlético, protetor e amável'));
            DB::table('races')->insert(array('id'=>102,'name'=>'Doberman','englishname'=>'Doberman','specie'=>1,'origin'=>'','description'=>'Inteligente, leal e protetor'));
            DB::table('races')->insert(array('id'=>103,'name'=>'Dogo argentino','englishname'=>'Dogo argentino','specie'=>1,'origin'=>'','description'=>'Leal, confiável e corajoso'));
            DB::table('races')->insert(array('id'=>104,'name'=>'Dogue alemão','englishname'=>'Dogue alemão','specie'=>1,'origin'=>'','description'=>'Amigável, paciente e dócil'));
            DB::table('races')->insert(array('id'=>105,'name'=>'Fila brasileiro','englishname'=>'Fila brasileiro','specie'=>1,'origin'=>'','description'=>'Companheiro, corajoso e amoroso'));
            DB::table('races')->insert(array('id'=>106,'name'=>'Golden retriever','englishname'=>'Golden retriever','specie'=>1,'origin'=>'','description'=>'Inteligente, brincalhão e leal'));
            DB::table('races')->insert(array('id'=>107,'name'=>'Husky siberiano','englishname'=>'Husky siberiano','specie'=>1,'origin'=>'','description'=>'Amigável, trabalhador e extrovertido'));
            DB::table('races')->insert(array('id'=>108,'name'=>'Jack russell terrier','englishname'=>'Jack russell terrier','specie'=>1,'origin'=>'','description'=>'Amigável, atlético e alerta'));
            DB::table('races')->insert(array('id'=>109,'name'=>'Labrador retriever','englishname'=>'Labrador retriever','specie'=>1,'origin'=>'','description'=>'Inteligente, carinhoso e brincalhão'));
            DB::table('races')->insert(array('id'=>110,'name'=>'Lhasa apso','englishname'=>'Lhasa apso','specie'=>1,'origin'=>'','description'=>'Esperto, confiante e independente'));
            DB::table('races')->insert(array('id'=>111,'name'=>'Lulu da pomerânia','englishname'=>'Lulu da pomerânia','specie'=>1,'origin'=>'','description'=>'Animado, inteligente e cheio de personalidade'));
            DB::table('races')->insert(array('id'=>112,'name'=>'Maltês','englishname'=>'Maltês','specie'=>1,'origin'=>'','description'=>'Gentil, brincalhão e afetuoso'));
            DB::table('races')->insert(array('id'=>113,'name'=>'Mastiff inglês','englishname'=>'Mastiff inglês','specie'=>1,'origin'=>'','description'=>''));
            DB::table('races')->insert(array('id'=>114,'name'=>'Mastim tibetano','englishname'=>'Mastim tibetano','specie'=>1,'origin'=>'','description'=>'Independente, reservado e inteligente'));
            DB::table('races')->insert(array('id'=>115,'name'=>'Pastor alemão','englishname'=>'Pastor alemão','specie'=>1,'origin'=>'','description'=>'Confiante, corajoso e inteligente'));
            DB::table('races')->insert(array('id'=>116,'name'=>'Pastor australiano','englishname'=>'Pastor australiano','specie'=>1,'origin'=>'','description'=>'Esperto, trabalhador e exuberante'));
            DB::table('races')->insert(array('id'=>117,'name'=>'Pastor de Shetland','englishname'=>'Pastor de Shetland','specie'=>1,'origin'=>'','description'=>'Brincalhão, energético e esperto'));
            DB::table('races')->insert(array('id'=>118,'name'=>'Pequinês','englishname'=>'Pequinês','specie'=>1,'origin'=>'','description'=>'Afetuoso, leal e elegante'));
            DB::table('races')->insert(array('id'=>119,'name'=>'Pinscher','englishname'=>'Pinscher','specie'=>1,'origin'=>'','description'=>'Brincalhão, carinhoso e protetor'));
            DB::table('races')->insert(array('id'=>120,'name'=>'Pit bull','englishname'=>'Pit bull','specie'=>1,'origin'=>'','description'=>'Inteligente, forte e leal'));
            DB::table('races')->insert(array('id'=>121,'name'=>'Poodle','englishname'=>'Poodle','specie'=>1,'origin'=>'','description'=>'Orgulhoso, ativo e inteligente'));
            DB::table('races')->insert(array('id'=>122,'name'=>'Pug','englishname'=>'Pug','specie'=>1,'origin'=>'','description'=>'Amoroso, temperamental e companheiro'));
            DB::table('races')->insert(array('id'=>123,'name'=>'Rottweiler','englishname'=>'Rottweiler','specie'=>1,'origin'=>'','description'=>'Protetor, leal e inteligente'));
            DB::table('races')->insert(array('id'=>124,'name'=>'Schnauzer','englishname'=>'Schnauzer','specie'=>1,'origin'=>'','description'=>'Dócil, leal e companheiro'));
            DB::table('races')->insert(array('id'=>125,'name'=>'Shar-pei','englishname'=>'Shar-pei','specie'=>1,'origin'=>'','description'=>'Amoroso, companheiro e brincalhão'));
            DB::table('races')->insert(array('id'=>126,'name'=>'Shiba','englishname'=>'Shiba','specie'=>1,'origin'=>'','description'=>'Independente, leal e alerta'));
            DB::table('races')->insert(array('id'=>127,'name'=>'Shih tzu','englishname'=>'Shih tzu','specie'=>1,'origin'=>'','description'=>'Carinhoso, brincalhão e encantador'));
            DB::table('races')->insert(array('id'=>128,'name'=>'Staffordshire bull terrier','englishname'=>'Staffordshire bull terrier','specie'=>1,'origin'=>'','description'=>'Inteligente, corajoso e determinado'));
            DB::table('races')->insert(array('id'=>129,'name'=>'Weimaraner','englishname'=>'Weimaraner','specie'=>1,'origin'=>'','description'=>'Amigável, corajoso e independente'));
            DB::table('races')->insert(array('id'=>130,'name'=>'Yorkshire','englishname'=>'Yorkshire','specie'=>1,'origin'=>'','description'=>'Destemido, carinhoso e cheio de energia'));*/
        }
        //https://pt.wikipedia.org/wiki/Lista_de_ra%C3%A7as_de_gatos_dom%C3%A9sticos
        //

    }


       /**
         * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('races');
    }
}
