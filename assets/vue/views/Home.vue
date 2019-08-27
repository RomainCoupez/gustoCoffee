<template>
    <main>
        <b-container fluid style=";height: calc(100vh - 59px);width: 100%;"
        class="bg-homepage">
            <b-row>
                <b-col cols="12" sm="8" md="6" lg="4">
                    <b-card class="mx-2 my-4 shadow-sm"
                    title="Réserver le meilleur espace de travail">
                        <b-card-text>
                            <p>Espaces partagé ou bureau privé, profitez d'un environnement de travail dédiés à la productivité.</p>
                            <b-button variant="warning">Réservation</b-button>
                        </b-card-text>
                    </b-card>
                </b-col>
            </b-row>
        </b-container>
        <b-container fluid class="bg-light py-5">
            <b-row class="justify-content-center text-center">
                <b-col cols="12" lg="3" class="m-4">
                    <img src="../../img/marketing-boost.svg">
                    <h3>Boostez votre productivité</h3>
                    <p>Une ambiance studieuse et décontracté boostera votre productivité au quotidien.</p>
                </b-col>
                <b-col cols="12" lg="3" class="m-4">
                    <img src="../../img/marketing-synergie.svg">
                    <h3>Synergie business</h3>
                    <p>Échangez, s'enrichir, créer des synergies. Voilà ce qui vous attend chez Gusto Coffee.</p>
                </b-col>
                <b-col cols="12" lg="3" class="m-4">
                    <img src="../../img/marketing-economie.svg">
                    <h3>Économie</h3>
                    <p>Profitez d'espaces professionnels sans supporter les coûts d'un bureau classique.</p>
                </b-col>
            </b-row>
        </b-container>
        <b-container class="py-5">
            <b-row class="justify-content-center text-center align-items-center">
                <b-col cols="12" sm="5" class="my-4">
                    <img src="../../img/presentation.jpeg" style="width: 100%;max-height: 50vh; object-fit: cover">
                </b-col>
                <b-col cols="12" sm="5" class="my-4">
                    <h3>Réserver le meilleur espace de travail</h3>
                    <p>L'espace a le pouvoir de transformer une entreprise: il permet de libérer le potentiel des individus et des organisations. La conception intentionelle, l'accueil chaleureux et les solutions flexibles permettent à votre équipe de travailler de la meilleure façon.</p>
                </b-col>
            </b-row>
        </b-container>
        <b-container fluid class="bg-light py-5">
            <b-row class="justify-content-center row-eq-height">
                <b-col cols="12" lg="3" class="my-3">
                    <b-card title="Espace de travail partagé" img-src="../../img/espaces-travail.jpeg" img-top tag="article" class=" shadow-sm h-100 mx-auto" style="max-width: 500px">
                        <b-card-text>
                            Abonnement à un poste de travail avec accès à des salles de conférence et des équipements Premium.
                        </b-card-text>
                    </b-card>
                </b-col>
                <b-col cols="12" lg="3" class="my-3">
                    <b-card title="Bureaux privés" img-src="../../img/espaces-bureaux.jpeg" img-top tag="article" class=" shadow-sm h-100 mx-auto" style="max-width: 500px">
                        <b-card-text>
                            Des espaces personnalisés conçus spécialement pour votre prochain siège au bureau satellite.
                        </b-card-text>
                    </b-card>
                </b-col>
                <b-col cols="12" lg="3" class="my-3">
                    <b-card title="Caféteria" img-src="../../img/cafeteria.jpeg" img-top tag="article" class=" shadow-sm h-100 mx-auto" style="max-width: 500px">
                        <b-card-text>
                            Profitez d'un espace de détente icroyable pour déconnectez du monde du travail et savourer un café onctueux.
                        </b-card-text>
                    </b-card>
                </b-col>
            </b-row>
        </b-container>
        <b-container class="py-5">
            <b-row class="m-4">
                <b-col cols="12 text-center my-4">
                    <h5>INSCRIVEZ-VOUS A NOTRE NEWSLETTER</h5>
                    <b-input></b-input>
                    <p>En renseignant vore adresse email, vous acceptez de recevoir chaque semaine nos derniers articles de blog par courrier électronique et vous prenez connaissance de notre .</p>
                    <p>Vous pouvez vous désinscrire à tout moment à l'aide des liens de désinscription ou en nous contactant à l'adresse unscribe@gusto.coffee</p>
                    <b-button pill variant="warning">S'inscrire</b-button>
                </b-col>
            </b-row>
        </b-container>
        <b-container fluid class="py-5 bg-light">
            <b-row>
                <b-col cols="12" class="text-center py-5">
                    <img class="m-1" src="../../img/le-grand-paris.png">
                    <img class="m-1" src="../../img/la-french-tech.png">
                    <img class="m-1" src="../../img/les-echos-paris.png">
                    <img class="m-1" src="../../img/mairie-de-paris.png">
                    <img class="m-1" src="../../img/bpi-france.png">
                </b-col>
            </b-row>
        </b-container>
    </main>
</template>

<script>
    export default {
        name: 'home',
        data() {
            return {
                bgImage: "../../img/homepage.jpeg"
            }
        }
    }
</script>