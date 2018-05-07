var Authorized = new Vue({
    el: '#authorized-clients',
    /*
     * The component's data.
     */
    data() {
        return {
            tokens: []
        };
    },

    /**
     * Prepare the component (Vue 1.x).
     */
    ready() {
        this.prepareComponent();
    },

    /**
     * Prepare the component (Vue 2.x).
     */
    mounted() {
        this.prepareComponent();
    },

    methods: {
        /**
         * Prepare the component (Vue 2.x).
         */
        prepareComponent() {
            this.getTokens();
        },

        /**
         * Get all of the authorized tokens for the user.
         */
        getTokens() {
            axios.get('/oauth/tokens')
                .then(response => {
                    this.tokens = response.data;
                });
        },

        /**
         * Revoke the given token.
         */
        revoke(token) {
            axios.delete('/oauth/tokens/' + token.id)
                .then(response => {
                    this.getTokens();
                });
        }
    }
});