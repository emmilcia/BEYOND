stronka na pana jonkisza :3
# BEYOND — Space & Astronomy Portal

## O projekcie
BEYOND to nowoczesna strona internetowa poświęcona astronomii, kosmosowi i odkryciom naukowym. Projekt tworzony jest w PHP, HTML i CSS jako zadanie szkolne.

## Technologie
- PHP — logika strony i obsługa API.
- HTML5 — struktura.
- CSS3 — wygląd i responsywność.
- JavaScript — minimum, tylko tam, gdzie jest potrzebny.
- JSON — przechowywanie ciekawostek i informacji o misjach.
- Bez MySQL i rozbudowanych baz danych.

## Wygląd
Styl: połączenie futurystycznego dashboardu astronomicznego i nowoczesnego portalu naukowego.

- Ciemne tło: granat, czerń, fiolety.
- Akcenty: błękit, pomarańcz i delikatne gradienty.
- Zdjęcia galaktyk, mgławic i planet.
- Półprzezroczyste panele, cienkie obramowania, subtelne efekty świetlne.
- Nowoczesna typografia i delikatne animacje.
- Profesjonalny, estetyczny i spójny wygląd wszystkich podstron.

## Podstrony

### 1. Strona główna — index.php
Interaktywny dashboard zawierający:
- Galactic Overview — informacje o Drodze Mlecznej i kosmosie.
- Exoplanet Discovery — statystyki odkrytych egzoplanet.
- Star Classification — klasyfikacja gwiazd.
- Black Hole Analysis — informacje o czarnych dziurach.
- Recent Discoveries — najnowsze odkrycia astronomiczne.

Dashboard ma być wizualnie atrakcyjny, z panelami o różnych rozmiarach, wykresami i prawdziwymi danymi.

### 2. Układ Słoneczny — uklad.php
- Prezentacja Słońca i ośmiu planet.
- Karty planet z podstawowymi danymi.
- Opisy, zdjęcia i ciekawostki.
- Możliwość wyświetlenia szczegółów wybranej planety.

### 3. Zdjęcie dnia — apod.php
Integracja z NASA APOD API:
https://api.nasa.gov/

Automatyczne pobieranie zdjęcia dnia, tytułu, daty i opisu. Możliwość przeglądania wcześniejszych publikacji.

### 4. Odkrycia — odkrycia.php
Aktualności i informacje astronomiczne pobierane z wiarygodnych źródeł, np. NASA DONKI, NeoWs i NASA Image Library.

### 5. Ciekawostki — ciekawostki.php
- Ciekawostki astronomiczne podzielone na kategorie.
- Karty z krótkimi opisami.
- Przycisk losowania kolejnej ciekawostki.
- Dane przechowywane w pliku JSON.

### 6. Misje kosmiczne — misje.php
Informacje o misjach takich jak Apollo 11, Voyager, Cassini, Perseverance, James Webb i Artemis. Możliwość prezentacji w formie osi czasu lub kart.

## Struktura plików

```text
BEYOND/
├── index.php
├── uklad.php
├── apod.php
├── odkrycia.php
├── ciekawostki.php
├── misje.php
├── includes/
│   ├── header.php
│   ├── navbar.php
│   └── footer.php
├── css/style.css
├── js/script.js
├── data/
│   ├── ciekawostki.json
│   └── misje.json
├── images/
└── config/config.php
```

## Zasady realizacji
- Projekt tworzyć etapami, nie generować wszystkiego naraz.
- Kod ma być prosty, czytelny i zrozumiały dla początkującej osoby uczącej się PHP.
- Unikać zbędnych bibliotek, frameworków i skomplikowanych rozwiązań.
- Nie dodawać nieuzgodnionych funkcjonalności.
- Nie wymyślać danych astronomicznych — korzystać z wiarygodnych źródeł.
- API obsługiwać po stronie PHP, z odpowiednią obsługą błędów.
- Klucze API przechowywać poza publicznym kodem.
- Zachować spójny wygląd i responsywność wszystkich podstron.

## Kolejność pracy
1. Zaprojektowanie wyglądu i strony głównej.
2. Przygotowanie wspólnych elementów i nawigacji.
3. Implementacja pozostałych podstron.
4. Integracja NASA API.
5. Testowanie i poprawki.

**Ważne:** przed rozpoczęciem każdego etapu przedstaw krótki plan. Nie generuj całego projektu jednocześnie. Wyjaśniaj ważniejsze fragmenty kodu i nie komplikuj implementacji bez potrzeby.
