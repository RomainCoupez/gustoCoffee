<template>
	<div v-if="isLoading">
		<loader></loader>
	</div>
	<div v-else-if="hasError">
	    <error-message :error="error"></error-message>
	</div>
	<div v-else>
		<h3>Créer un article</h3>
       	<b-form @submit="createNews" v-if="canCreateNews">
       		<b-form-group label="Titre">
				<b-form-input v-model="form.title" type="text"></b-form-input>
       		</b-form-group>
       		<b-form-group label="Contenu">
				<b-form-textarea v-model="form.content"></b-form-textarea>
       		</b-form-group>
			<b-button type="submit" :disabled="form.title.length === 0 || isLoading || form.content.length === 0" variant="warning">Ajouter un article</b-button>
       	</b-form>
       	<hr>
		<h3>Tout les articles</h3>
		<b-table :fields="fields" class="my-3" head-variant="dark" bordered v-if="hasNewss" striped hover :items="newss">
			<template slot="[Actions]" slot-scope="row">
				<b-button variant="warning">Modifier</b-button>
				<b-button variant="danger">Supprimer</b-button>
	        </b-form-checkbox>
	      </template>
		</b-table>
		<div v-else="!hasNewss">
	    	Pas encore d'actualités !
		</div>
	</div>
</template>

<script>
    import Loader from './Loader';
    import ErrorMessage from '../components/ErrorMessage';

    export default {
        name: 'dashboard-newss',
        components: {
            Loader,
            ErrorMessage,
        },
        data () {
        	return {
        		fields: [
        			{
        				key: 'id',
        				label: 'Id'
        			},
        			{
	        			key: 'title',
	        			label: 'Titre'
        			},
        			{
        				key: 'content',
        				label: 'Contenu'
        			},
        			{
        				key: 'createdAt',
        				label: 'Création',
        				formatter: this.$options.filters.formatDate
        			},
        			{
        				key: 'Actions'
        			}
        		],
        		form: {
	        		title: '',
	        		content: '',
        		},
        	}
        },
        created () {
            this.$store.dispatch('news/fetchNewss');
        },
        computed: {
            isLoading () {
                return this.$store.getters['news/isLoading'];
            },
            hasError () {
                return this.$store.getters['news/hasError'];
            },
            error () {
                return this.$store.getters['news/error'];
            },
            hasNewss () {
                return this.$store.getters['news/hasNewss'];
            },
            newss () {
                return this.$store.getters['news/newss'];
            },
            canCreateNews () {
                return this.$store.getters['security/hasRole']('ROLE_ADMIN');
            }
        },
        methods: {
            createNews () {
                this.$store.dispatch('news/createNews', this.$data.form)
                .then(() => this.$data.form = {
                    title: '',
                    content: ''
                })
            },
        },
    }
</script>