<template>
    <b-modal id="authenticate-modal" ref="authenticate-modal" hide-footer
     v-on:authenticate-modal-open="showModal" slot="modal-header">
      <div slot="modal-title">
         <b-img class="w-100" :src="require('../../img/logo.jpg')"></b-img>
      </div>
      <b-tabs class="px-3 pb-3">
        <b-tab title="Se connecter" active>
        	<Login></Login>
        </b-tab>
        <b-tab title="S'inscrire">
        </b-tab>
      </b-tabs>
    </b-modal>
</template>

<script>

import Login from './Login'

export default {
  name: 'authenticate',
  components: {
  	Login,
  },
  data () {
    return {
      modalOpen: false
    }
  },
  methods: {
    showModal () {
    	this.$bvModal.show('authenticate-modal')
      this.$refs['authenticate-modal'].show()
    },
    hideModal () {
      this.$refs['authenticate-modal'].hide()
    },
    toggleModal () {
      this.$refs['authenticate-modal'].toggle('#toggle-btn')
    }
  }
}
</script>