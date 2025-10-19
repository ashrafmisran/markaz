<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Person;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = [
            ["name" => "TIMAH BINTI YAAKUB",	"mykad" => "190929055028"	,"old_ic" => "2500479"],
            ["name" => "ESAM BINTI TAPAR",	"mykad" => "280530055164"	,"old_ic" => "2500329"],
            ["name" => "JAAFAR BIN HASHIM",	"mykad" => "281206055175"	,"old_ic" => "2500627"],
            ["name" => "TIAH BINTI YUSOH",	"mykad" => "311021055202"	,"old_ic" => "0909625"],
            ["name" => "JARIAH BINTI ALI",	"mykad" => "311111055126"	,"old_ic" => "2500280"],
            ["name" => "KAMARI BIN PARMAN",	"mykad" => "350530015403"	,"old_ic" => "3408354"],
            ["name" => "PETIAH BINTI TAPAR",	"mykad" => "350530055114"	,"old_ic" => "2500330"],
            ["name" => "TOYAH BINTI RAHMAT",	"mykad" => "360530055228"	,"old_ic" => "2500296"],
            ["name" => "LIMAH BINTI MD YAKIN",	"mykad" => "361105055088"	,"old_ic" => "2730501"],
            ["name" => "SAADA BINTI DAUD",	"mykad" => "370906055146"	,"old_ic" => "2500537"],
            ["name" => "ZAINON BINTI MAT TAM",	"mykad" => "380504055118"	,"old_ic" => "2500613"],
            ["name" => "AYOT @ GAYAH BINTI OTHMAN",	"mykad" => "380806045046"	,"old_ic" => "2500382"],
            ["name" => "HINDON BINTI ABDUL MALEK",	"mykad" => "390607055144"	,"old_ic" => "1559660"],
            ["name" => "BERIAH BINTI DERAMAN",	"mykad" => "391105055018"	,"old_ic" => "2500635"],
            ["name" => "BABA SAMION BIN LONG",	"mykad" => "401021055121"	,"old_ic" => "2500283"],
            ["name" => "NORMAH BINTI KECHIK",	"mykad" => "401104055004"	,"old_ic" => "2500568"],
            ["name" => "SITI AJAL BINTI ARUP",	"mykad" => "410107055020"	,"old_ic" => "2488621"],
            ["name" => "ABDUL AZIS BIN ABAS",	"mykad" => "410408065249"	,"old_ic" => "2215530"],
            ["name" => "JAMALUDIN BIN MANSOR",	"mykad" => "410619055091"	,"old_ic" => "2423788"],
            ["name" => "NAPSIAH BINTI RESAT",	"mykad" => "410728055082"	,"old_ic" => "1415580"],
            ["name" => "ABU BAKAR BIN DERUS",	"mykad" => "420303055043"	,"old_ic" => "3567160"],
            ["name" => "YUSOF BIN NORDIN",	"mykad" => "420428055143"	,"old_ic" => "0899110"],
            ["name" => "HAMEDA @ MINAH BINTI ISMAIL",	"mykad" => "420702055200"	,"old_ic" => "2500392"],
            ["name" => "SABIKA BINTI MAT",	"mykad" => "420730055152"	,"old_ic" => "2811617"],
            ["name" => "MOHD ALI BIN MAJID",	"mykad" => "420815055071"	,"old_ic" => "A2521894"],
            ["name" => "MOHD NOR BIN HUSIN",	"mykad" => "421030055201"	,"old_ic" => "2500624"],
            ["name" => "SHAARI BIN IBRAHIM",	"mykad" => "421031055115"	,"old_ic" => "1999457"],
            ["name" => "JARIAH BINTI GILAP",	"mykad" => "431022055024"	,"old_ic" => "2501226"],
            ["name" => "JOHARA BINTI UJANG",	"mykad" => "440802055230"	,"old_ic" => "2500397"],
            ["name" => "ZALEHA BINTI MANAF",	"mykad" => "441128055080"	,"old_ic" => "2500352"],
            ["name" => "ZOBAIDAH BINTI SAID",	"mykad" => "450510055254"	,"old_ic" => "2217120"],
            ["name" => "HAZIZAH BINTI ABU",	"mykad" => "450708055188"	,"old_ic" => "2500481"],
            ["name" => "MERIAM BINTI AHMAD",	"mykad" => "450712055092"	,"old_ic" => "3567161"],
            ["name" => "NORDIN BIN PAJAS",	"mykad" => "460820055021"	,"old_ic" => "3556154"],
            ["name" => "ABDUL JALIL BIN MAT LAJI",	"mykad" => "460830055199"	,"old_ic" => "2500587"],
            ["name" => "BADOR BIN MANAP",	"mykad" => "461005055281"	,"old_ic" => "8294619"],
            ["name" => "MIAH @ HAMIYAH BINTI JAKIN",	"mykad" => "461105055086"	,"old_ic" => "2218237"],
            ["name" => "HASSAN BIN BAHAMAN",	"mykad" => "461222065275"	,"old_ic" => "2214830"],
            ["name" => "SHABUDIN BIN LEBAI HASSAN",	"mykad" => "461225055101"	,"old_ic" => "2500345"],
            ["name" => "SITI RAMLAH BINTI ABD RAHMAN",	"mykad" => "470905055070"	,"old_ic" => "0655949"],
            ["name" => "FATIMAH BINTI HJ.YAKIN",	"mykad" => "470919055258"	,"old_ic" => "2500542"],
            ["name" => "KEMBAR BINTI ABU",	"mykad" => "480101055154"	,"old_ic" => "2500655"],
            ["name" => "LIJAH BINTI SAMAH",	"mykad" => "480128055218"	,"old_ic" => "2508000"],
            ["name" => "SITI ZALEHA BINTI ISMAIL",	"mykad" => "480225055076"	,"old_ic" => "2500476"],
            ["name" => "ZAINAH BINTI ABDULLAH",	"mykad" => "480425015298"	,"old_ic" => "0654749"],
            ["name" => "BASIR BIN EPET",	"mykad" => "480427055197"	,"old_ic" => "3817455"],
            ["name" => "SANIAH BINTI YAHYA",	"mykad" => "480910105780"	,"old_ic" => "1638135"],
            ["name" => "SAHAROM BINTI AWANG",	"mykad" => "481010055356"	,"old_ic" => "0908188"],
            ["name" => "JEMILAH BINTI MAJID",	"mykad" => "481230055294"	,"old_ic" => "0908222"],
            ["name" => "MAIMUNAH BINTI JAAMAN",	"mykad" => "490428055120"	,"old_ic" => "1560062"],
            ["name" => "ROBAK BINTI MUHAMAD",	"mykad" => "490513055344"	,"old_ic" => "0672534"],
            ["name" => "AZMAH BINTI IDRIS",	"mykad" => "490826065180"	,"old_ic" => "3406716"],
            ["name" => "HARON BIN ULOP",	"mykad" => "500820055279"	,"old_ic" => "3569709"],
            ["name" => "FATIMAH BINTI SIHI",	"mykad" => "500827055108"	,"old_ic" => "3811752"],
            ["name" => "RATIAH BINTI ABDUL RAHMAN",	"mykad" => "501001055210"	,"old_ic" => "3817228"],
            ["name" => "RAKIAH BINTI MUSA",	"mykad" => "501001055384"	,"old_ic" => "3817332"],
            ["name" => "HASNAH BINTI YAKIN",	"mykad" => "501012055160"	,"old_ic" => "3569693"],
            ["name" => "SABARIAH BINTI SAMAH",	"mykad" => "510203065294"	,"old_ic" => "4547567"],
            ["name" => "ABDUL HALIM BIN UJID",	"mykad" => "510220055071"	,"old_ic" => "3871043"],
            ["name" => "MD SAH BIN MANAP",	"mykad" => "510625055125"	,"old_ic" => "3571191"],
            ["name" => "NORDIN BIN AHMAD",	"mykad" => "510830055175"	,"old_ic" => "4232633"],
            ["name" => "NASRAH BINTI MAHMUD",	"mykad" => "511102055374"	,"old_ic" => "4231857"],
            ["name" => "ZAHARIAH BINTI ABDUL SAMAD",	"mykad" => "511203065272"	,"old_ic" => "4204648"],
            ["name" => "AZIZAH BINTI ALI",	"mykad" => "511228055150"	,"old_ic" => "4721213"],
            ["name" => "SAADIAH BINTI ABD GHANI",	"mykad" => "520217055352"	,"old_ic" => "4385286"],
            ["name" => "ABDUL RADZAK BIN MOHAMAD",	"mykad" => "520222055437"	,"old_ic" => "4233155"],
            ["name" => "ABU SAMAH BIN ADNAN",	"mykad" => "520419055211"	,"old_ic" => "4296789"],
            ["name" => "JAMALUDIN BIN WAHAB",	"mykad" => "520702055217"	,"old_ic" => "4332723"],
            ["name" => "MURAT BIN KATIJAN",	"mykad" => "520730105031"	,"old_ic" => "4354012"],
            ["name" => "SITI ROHANI BINTI ISMAIL",	"mykad" => "520802055548"	,"old_ic" => "4429801"],
            ["name" => "JEMIAH BINTI ABD GHANI",	"mykad" => "521014055488"	,"old_ic" => "4762627"],
            ["name" => "JUNAIDAH BINTI MUSA",	"mykad" => "521101055320"	,"old_ic" => "4386301"],
            ["name" => "ZAINAB BINTI ABU YATIM",	"mykad" => "521215055396"	,"old_ic" => "4385546"],
            ["name" => "MOHMAD BIN JOHAN",	"mykad" => "530103055337"	,"old_ic" => "4462171"],
            ["name" => "ZALEHA BINTI MOHD YUSOF",	"mykad" => "530114055308"	,"old_ic" => "4430334"],
            ["name" => "JAHARAH BINTI AB KARIN",	"mykad" => "530417055356"	,"old_ic" => "4917400"],
            ["name" => "RAEYAH BINTI A GHANI",	"mykad" => "530418055438"	,"old_ic" => "4462169"],
            ["name" => "RAMITAH BINTI JANTAN",	"mykad" => "530820055786"	,"old_ic" => "4859579"],
            ["name" => "ZAKARIA BIN MOHAMAD",	"mykad" => "530905055283"	,"old_ic" => "6187585"],
            ["name" => "MOHD YUSOF BIN ARSHAD",	"mykad" => "530910055317"	,"old_ic" => "4547865"],
            ["name" => "MOHD SABRI BIN ISMAIL",	"mykad" => "531101055207"	,"old_ic" => "4546526"],
            ["name" => "ABD TALIB BIN ISMAIL",	"mykad" => "540712055665"	,"old_ic" => "4667117"],
            ["name" => "NAFSIAH BINTI TALIB",	"mykad" => "540718055236"	,"old_ic" => "4637729"],
            ["name" => "HAMIDAH BINTI ADNAN",	"mykad" => "541019055362"	,"old_ic" => "4802926"],
            ["name" => "RAMLI BIN SALEH",	"mykad" => "550101056043"	,"old_ic" => "6846033"],
            ["name" => "MAHMUD BIN HARUN",	"mykad" => "550425055549"	,"old_ic" => "4827521"],
            ["name" => "AMRIS BIN MAT",	"mykad" => "550526055441"	,"old_ic" => "4828114"],
            ["name" => "MOHAMAD NOR BIN ZAINAL",	"mykad" => "550913055441"	,"old_ic" => "4965994"],
            ["name" => "OMAR BIN ULOP",	"mykad" => "551104055331"	,"old_ic" => "4878335"],
            ["name" => "P RAMLI BIN MUHA",	"mykad" => "551226105683"	,"old_ic" => "4948032"],
            ["name" => "MAIMON BINTI ABU BAKAR",	"mykad" => "560201055434"	,"old_ic" => "5086560"],
            ["name" => "RATNA BINTI ISMAIL",	"mykad" => "560320065512"	,"old_ic" => "4940181"],
            ["name" => "MISKIAH BINTI KAMARI",	"mykad" => "560322055684"	,"old_ic" => "4966086"],
            ["name" => "NORAINI BINTI KAMARUDIN",	"mykad" => "560423055384"	,"old_ic" => "5055467"],
            ["name" => "MOHD RAHIM BIN JANTAN",	"mykad" => "560505055505"	,"old_ic" => "5018086"],
            ["name" => "AZIZAH BINTI YUSOF",	"mykad" => "560506055312"	,"old_ic" => "5146425"],
            ["name" => "SITI ROHANI BINTI BUSU",	"mykad" => "560616055372"	,"old_ic" => "5146059"],
            ["name" => "NOMAH BINTI AKUB",	"mykad" => "560802055376"	,"old_ic" => "5055565"],
            ["name" => "NORIZAM BINTI MANSOR",	"mykad" => "560811055028"	,"old_ic" => "5145843"],
            ["name" => "TOMAH BINTI ABU BAKAR",	"mykad" => "560816055318"	,"old_ic" => "5018837"],
        ];

        foreach ($people as $person) {
            Person::updateOrCreate(
                ['mykad' => $person['mykad']], // unique key
                $person
            );
        }
    }
}
