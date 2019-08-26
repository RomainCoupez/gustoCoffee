<template>
    <b-container fluid class="p-0" style="height: 100vh;">
        <header>
            <b-navbar toggleable="md" type="white" variant="white" class="shadow">
                <b-navbar-brand to="/home">
                    <img src="../img/logo.jpg" style="height: 35px">
                </b-navbar-brand>
                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                <b-collapse id="nav-collapse" is-nav>
                  <b-navbar-nav class="ml-auto">
                    <b-nav-item to="/who-are-we">Qui sommes nous ?</b-nav-item>
                    <b-nav-item to="/concept">Concept</b-nav-item>
                    <b-nav-item to="/news">Actualités</b-nav-item>
                    <b-nav-item to="/rooms">Réserver une salle</b-nav-item>
                    <span v-if="isAuthenticated" class="d-block d-md-inline-flex">
                        <b-nav-item to="/dashboard">User</b-nav-item>
                        <b-nav-item href="/api/security/logout">Déconnexion</b-nav-item>
                    </span>
                    <b-nav-item v-else to="/login">
                        S'inscrire / Se connecter
                    </b-nav-item>
                  </b-navbar-nav>
                </b-collapse>
            </b-navbar>
        </header>
        <router-view></router-view>
        <footer v-if="['dashboard'].indexOf($route.name) > -1" class="border-top">
            <b-container fluid class="py-5 text-center">
                <b-row>
                    <b-col cols="12" sm="6" lg="3" class="my-4 d-flex flex-column align-items-center">
                        <img src="../img/logo.jpg" style="max-width: 75%">
                        <p>10 rue des lilas, 94000 Créteil</p>
                    </b-col>
                    <b-col cols="12" sm="6" lg="3" class="my-4 d-flex flex-column align-items-center">
                        <h5>INFORMATIONS LÉGALES</h5>
                        <a href="#">Accessibilité</a>
                        <a href="#">Mentions légales</a>
                        <a href="#">Données personelles</a>
                        <a href="#">CGV</a>
                    </b-col>
                    <b-col cols="12" sm="6" lg="3" class="my-4 d-flex flex-column align-items-center">
                        <h5>EN SAVOIR PLUS</h5>
                        <a href="#">FAQ</a>
                        <a href="#">Nous contacter</a>
                        <a href="#">Recrutement</a>
                    </b-col>
                    <b-col cols="12" sm="6" lg="3" class="my-4 d-flex flex-column align-items-center">
                        <h5>MENU</h5>
                        <a href="#">Qui sommes-nous ?</a>
                        <a href="#">Concept</a>
                        <a href="#">Actualités</a>
                        <a href="#">Réserver une salle</a>
                    </b-col>
                </b-row>
            </b-container>
            <b-container fluid class="py-2 border-top">
                <b-row class="text-center">
                    <b-col cols="12" style="font-size: 2rem">
                        <a href="#">
                            <font-awesome-icon :icon="['fab','facebook-square']"></font-awesome-icon>
                        </a>
                        <a href="#">
                            <font-awesome-icon :icon="['fab','twitter-square']"></font-awesome-icon>
                        </a>
                        <a href="#">
                            <font-awesome-icon :icon="['fab','google-plus-square']"></font-awesome-icon>
                        </a>
                        <a href="#">
                            <font-awesome-icon :icon="['fab','dribbble-square']"></font-awesome-icon>
                        </a>
                        <a href="#">
                            <font-awesome-icon :icon="['fab','linkedin']"></font-awesome-icon>
                        </a>
                    </b-col>
                    <b-col cols="12">
                        © 2019 Tous droits réservés à Gusto Coffee.
                    </b-col>
                </b-row>
            </b-container>
        </footer>
    </b-container>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'app',
        created () {
            let isAuthenticated = JSON.parse(this.$parent.$el.attributes['data-is-authenticated'].value);
            let roles = JSON.parse(this.$parent.$el.attributes['data-roles'].value);
            let payload = { isAuthenticated: isAuthenticated, roles: roles };
            this.$store.dispatch('security/onRefresh', payload);
            axios.interceptors.response.use(undefined, (err) => {
                return new Promise(() => {
                    if (err.response.status === 403) {
                        this.$router.push({path: '/login'})
                    } else if (err.response.status === 500) {
                        document.open();
                        document.write(err.response.data);
                        document.close();
                    }
                    throw err;
                });
            });
        },
        computed: {
            isAuthenticated () {
                return this.$store.getters['security/isAuthenticated']
            },
        },
    }
</script>

<style>
    /*@import '../css/app.css';*/
</style>