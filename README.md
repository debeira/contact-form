# Testopdracht Laravel: Contactformulier

Maak een eenvoudige webapplicatie voor het verwerken van contactformulier-inzendingen. Bezoekers moeten een bericht kunnen achterlaten, en een beheerder moet deze berichten kunnen bekijken in een eenvoudig paneel.

**Wat we graag zien:**

- **Contactformulier:** Een publieke pagina met een formulier (velden: naam, e-mail, bericht).
- **Verwerking:** Inzendingen worden na validatie (bv. verplichte velden, geldig e-mailadres) opgeslagen in een MySQL-database via een Eloquent Model.
- **Adminpaneel:** Een eenvoudige, afgeschermde lijstpagina waar alle inzendingen worden getoond. Een simpele, geheime URL is voldoende (bv. `/inzendingen`).
- **Stack:**
    - Gebruik Laravel voor de backend.
    - Gebruik Inertia.js om de frontend te renderen met Vue.js.
    - Gebruik Tailwind CSS voor styling en een component-gebaseerde aanpak in Vue (bv. voor formulierelementen).
- **Tooling:** Gebruik `composer` & `artisan` voor installatie en development.
- **Kwaliteit:** Maak goed gebruik van de PHP & Laravel documentatie om best practices toe te passen.

**Optionele uitbreidingen:**

- Voeg een "markeer als gelezen" functionaliteit toe in het adminpaneel.
- Maak gebruik van Git voor versiebeheer.

**Resources:**

De officiële documentatie is je belangrijkste bron van informatie.
- https://laravel.com/docs/12.x/installation
- https://laravel.com/docs/12.x/starter-kits#inertia-with-vue
- https://www.php.net/docs.php
- https://inertiajs.com/
- https://tailwindcss.com/docs

**Doel van de opdracht:**

Het is niet de bedoeling om hier dagen werk in te steken; een focus van 3 à 4 uur is ideaal. Het doel is om een basis te hebben voor een technisch gesprek. In dit gesprek overloop je de oplossing, licht je toe hoe je gestart bent, welke keuzes je hebt gemaakt en welke uitdagingen je eventueel bent tegengekomen.
