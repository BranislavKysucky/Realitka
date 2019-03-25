Stručný popis projektu: 

Účelom projektu je vytvorenie realitného portálu. Aplikácia musí byť schopná zvládnuť 3 úrovne prístupu:

    Anonymný - používateľ, ktorý prichádza za účelom hľadania nehnuteľnosti
    Realitná kancelária - realitná kancelária á záujem o vkladanie inzerátov, ich managment a sledovanie štatistických informácií ako napríklad kto si prezrel moje inzeráty
    Prístup administrátora - administrátor a jeho schopnosti v rámci uvedeného prístupu sú čisto na autoroch systému. Je dobré sa riadiť heslo, čím viac tým lepšie

Jedná sa o koncepčne jednoduchú úlohu, ktorý na komerčnom trhu doma aj v zahraničí bola zvládnutá stovky krát, rôznymi spôsobmi. Dôležitými časťami projektu je anonymné rozhranie, lebo od toho sa odvíja návštevnosť portálu. Zároveň je veľmi dôležité zabezpečiť, čo najväčší počet kanálov, ktorými budú jednotlivé inzeráty na portál pribúdať. Bežné spôsoby sú nasledovné:

    Súkromná inzercia - súkromná osoba vyplní formulár a uverejní svoj inzerát
    Realitná kancelária sa zaregistruje a manuálne nahadzuje svoje inzeráty
    Realitná kancelária sa zaregistruje a poskytne výstup zo svojho systému vo formáte JSON alebo XML pričom vytvorený systém bude pravidelne tieto inzeráty sťahovať
    Realitná kancelária sa nezaregistruje, avšak systém za pomoci technológií ako cURL a XPath grabbuje/crawluje príslušný web a bez vedomia realitnej kancelárie šíry jej inzeráty


Základné funkčné požiadavky

    Aplikácia musí obsahovať vyhľadávanie inzerátov podľa stanovených kritérií
    Aplikácia musí zobraziť detail inzerátu
    Aplikácia musí obsahovať úvodnú stránku s vyhľadávaním, navigačným menu a doplnkovými widgetmi ako napríklad najlacnejšie byty atď.
    Aplikácia musí obsahovať funkcionalitu umožňujúcu pridávať inzeráty od neregistrovaných osôb
    Aplikácia musí obsahovať rozhranie pre realitné kancelárie
    Aplikácia musí obsahovať rozhranie pre administrátora


Nefunkčné požiadavky

- Projekt musí byť zobraziteľný na všetkých štandardizovaných zariadeniach - musí byť responzívny

- Projekt musí fungovať ako webová aplikácia

- Projekt musí byť naprogramovaný v Laravel 5.5

- Projekt musí byť spustiteľný na servery Apache 2.4

- Projekt musí byť kompatibilný s minimálne PHP 7.0.*

- Ako databázová platforma musí byť využitá MySQL 5.7.* alebo MariaDB 10.1.* a viac

- Je povolené používať cachovací mechanizmus v podobe Redisu

Príklady existujúcich riešení

https://www.nehnutelnosti.sk/
https://www.reality.sk/
https://reality.bazar.sk/
https://www.topreality.sk/
https://ringo.topky.sk/
