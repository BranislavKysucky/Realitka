<?php
/**
 * Created by PhpStorm.
 * User: majo
 * Date: 10.12.2018
 * Time: 20:44
 */

namespace App\Http;
set_time_limit(300);


use App\Fotografia;
use Goutte\Client;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;
use App\Inzerat;

class Crawlerclass
{
    public function __construct()
    {
        $this->Crawler();
    }

    private function Crawler()
    {
        $pole = array("dom", "chalupa", "zahradna-chata", "garsonka", "jednoizbovy-byt", "dvojizbovy-byt", "trojizbovy-byt", "stvorizbovy-byt", "velky-byt", "dvojgarsonka", "byt");
        foreach ($pole as $value) {
            $client = new Client();
            //parameter reality-1 v nasledujucom requeste znamena, ze zoberie len prvu stranu z kazdej kategorie (napr jedna strana kde su len garsonky,
            // namiesto jednotky sa moze dat napriklad cislo 2000 a server vrati v url maximalny pocet stranok pre danu kategoriu,
            // pre testovanie ale staci jednotka, aj tak to dlho trva lez sa to spracuje :D, ak by chcel niekto skusit 2000 tak treba
            // zmenit aj set_time_limit ktory sa nachadza na 10 riadku v tomto subore, momentalne je tam 300 sekund, ak bude crawlovanie
            // trvat dlhsie tak hodi exception)
            $crawler_init = $client->request('GET', 'http://www.areality.sk/' . $value . '-predaj~(reality-1)?rk=1');
            $pocet_stran = substr($crawler_init->getBaseHref(), 40 + strlen($value),
                (strpos($crawler_init->getBaseHref(), ')', 40 + strlen($value))) - (40 + strlen($value)));
            if (is_numeric($pocet_stran) && $pocet_stran > 0) {
                for ($i = 0; $i <= $pocet_stran; $i++) {
                    $crawler = $client->request('GET', 'http://www.areality.sk/' . $value . '-predaj~(reality-' . $i . ')?rk=1');
                    $zakazky = $crawler->filterXPath("//*[@id=\"vypisZakazek\"]");
                    $zakazky->filter("[class='item']")->each(function (Crawler $zakazka) use ($value) {

                        $url = ($zakazka->filter("[class=\"detail-img-link\"]")->count())
                            ? 'http://www.areality.sk' . $zakazka->filter("[class=\"detail-img-link\"]")->attr('href') : null;
                        if ($url != null) {
                            $client = new Client();
                            $detail = $client->request('GET', $url);
                            $content = $detail->filterXPath("//*[@id=\"content\"]");

                            $cena = ($content->filterXPath("//*[@id=\"ZakDetailContainer\"]/div/ul/li[1]/span[2]/span/span[1]/span[1]")->count())
                                ? $content->filterXPath("//*[@id=\"ZakDetailContainer\"]/div/ul/li[1]/span[2]/span/span[1]/span[1]")->text() : null;
                            if ($cena != null) {
                                $cena = str_replace(" ", "", $cena);
                                if (str_contains($cena, ',00')) {
                                    $cena = substr($cena, 0, strlen($cena) - 3);
                                }
                            }
                            $adresa = ($content->filterXPath("//*[@id=\"ZakDetailContainer\"]/div/h1/span[1]/span/span[1]")->count())
                                ? $content->filterXPath("//*[@id=\"ZakDetailContainer\"]/div/h1/span[1]/span/span[1]")->text() : null;
                            $nazov = ($content->filterXPath("//*[@id=\"ZakDetailContainer\"]/div/div[1]/div[4]/h2")->count())
                                ? $content->filterXPath("//*[@id=\"ZakDetailContainer\"]/div/div[1]/div[4]/h2")->text() : null;
                            $popis = ($content->filterXPath("//*[@id=\"PopisTxt\"]")->count())
                                ? $content->filterXPath("//*[@id=\"PopisTxt\"]")->text() : 'Bez popisu';
                            $poz = strpos($content->filterXPath("//*[@id=\"ZakDetailContainer\"]/div/h1")->text(), ',', 0);
                            $typ = substr($content->filterXPath("//*[@id=\"ZakDetailContainer\"]/div/h1")->text(), 0, $poz);
                            $obrazky_content = ($content->filterXPath("//*[@id=\"ZakDetailContainer\"]/div/div[5]/ul")->count())
                                ? $content->filterXPath("//*[@id=\"ZakDetailContainer\"]/div/div[5]/ul") : null;

                            $obec = DB::table('obce')->where('obec', $adresa)->value('id');
                            if (!empty($obec)) {
                                $inzerat = new Inzerat;
                                $inzerat->kategoria_id = 2; //patri to realitkam
                                $inzerat->stav_id = 1; //zatial vsety stavy
                                switch ($value) {
                                    case "garsonka":
                                        $druh = 'Garsónka';
                                        break;
                                    case "jednoizbovy-byt":
                                        $druh = '1 izbový byt';
                                        break;
                                    case "dvojizbovy-byt":
                                        $druh = '2 izbový byt';
                                        break;
                                    case "trojizbovy-byt":
                                        $druh = '3 izbový byt';
                                        break;
                                    case "stvorizbovy-byt":
                                        $druh = '4 izbový byt';
                                        break;
                                    case "velky-byt":
                                        $druh = '5 a viac izbový byt';
                                        break;
                                    case "dvojgarsonka":
                                        $druh = 'Garsónka';
                                        break;
                                    case "byt":
                                        $druh = 'Iný byt';
                                        break;
                                    case "zahradna-chata":
                                        $druh = 'Chata';
                                        break;
                                    case "chalupa":
                                        $druh = 'Chalupa';
                                        break;
                                    case "dom":
                                        $druh = 'Rodinný dom';
                                        break;
                                    default :
                                        $druh = 'Všetky domy';
                                }
                                $druh_id = DB::table('druhy')->where('podnazov', $druh)->value('id');
                                $inzerat->druh_id = $druh_id;
                                $inzerat->typ_id = 1; //predaj
                                $inzerat->obec_id = $obec;
                                $inzerat->nazov = $nazov;
                                $inzerat->popis = $popis;
                                $inzerat->cena = is_numeric($cena) ? $cena : null;
                                $inzerat->crawler = true;
                                $inzerat->save();

                                if ($obrazky_content != null) {
                                    $obrazky_content->filter("[class='detail-img-link']")->each(function (Crawler $obrazok) use ($inzerat) {
                                        $obrazok_url = $obrazok->attr('href');
                                        $path = public_path('images/images_test/');
                                        $url_path = '/images/images_test/';
                                        $obrazok_nazov = basename($obrazok_url);
                                        $save_url = $path . $obrazok_nazov;
                                        file_put_contents($save_url, file_get_contents($obrazok_url));
                                        $novy_obrazok = new Fotografia;
                                        $novy_obrazok->inzerat_id = $inzerat->id;
                                        $novy_obrazok->url = $url_path . $obrazok_nazov;
                                        $novy_obrazok->save();

                                    });
                                }
                            }

                            /*echo
                                $value . '<br>' .
                                $adresa . '<br>' .
                                '|' . $cena . '|' . '<br>' .
                                $typ . '<br>' .
                                $nazov . '<br>' .
                                $popis . '<br>'

                                . '<br>';*/
                        }
                    });
                }
                /*echo $crawler_init->getBaseHref() . '<br>' .
                    $pocet_stran . '<br><br>';*/
            }

        }
    }
}