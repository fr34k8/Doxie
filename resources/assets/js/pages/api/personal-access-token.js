import _ from 'lodash';

var PersonalAccessTokens = new Vue({
    el: '#personal-access-tokens',
    /*
     * The component's data.
     */
    data() {
        return {
            accessToken: null,

            tokens: [],
            scopes: [],

            form: {
                name: '',
                scopes: [],
                errors: []
            }
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
         * Prepare the component.
         */
        prepareComponent() {
            this.getTokens();
            this.getScopes();

            $('#modal-create-token').on('shown.bs.modal', () => {
                $('#create-token-name').focus();
            });
        },

        /**
         * Get all of the personal access tokens for the user.
         */
        getTokens() {
            axios.get('/oauth/personal-access-tokens')
                .then(response => {
                    this.tokens = response.data;
                });
        },

        /**
         * Get all of the available scopes.
         */
        getScopes() {
            axios.get('/oauth/scopes')
                .then(response => {
                    this.scopes = response.data;
                });
        },

        /**
         * Show the form for creating new tokens.
         */
        showCreateTokenForm() {
            $('#modal-create-token').modal('show');
        },

        /**
         * Create a new personal access token.
         */
        store() {
            this.accessToken = null;

            this.form.errors = [];

            axios.post('/oauth/personal-access-tokens', this.form)
                .then(response => {
                    this.form.name = '';
                    this.form.scopes = [];
                    this.form.errors = [];

                    this.tokens.push(response.data.token);

                    this.showAccessToken(response.data.accessToken);
                })
                .catch(error => {
                    if (typeof error.response.data === 'object') {
                        this.form.errors = _.flatten(_.toArray(error.response.data));
                    } else {
                        this.form.errors = ['Something went wrong. Please try again.'];
                    }
                });
        },

        /**
         * Toggle the given scope in the list of assigned scopes.
         */
        toggleScope(scope) {
            if (this.scopeIsAssigned(scope)) {
                this.form.scopes = _.reject(this.form.scopes, s => s == scope);
            } else {
                this.form.scopes.push(scope);
            }
        },

        /**
         * Determine if the given scope has been assigned to the token.
         */
        scopeIsAssigned(scope) {
            return _.indexOf(this.form.scopes, scope) >= 0;
        },

        /**
         * Show the given access token to the user.
         */
        showAccessToken(accessToken) {
            $('#modal-create-token').modal('hide');

            this.accessToken = accessToken;

            $('#modal-access-token').modal('show');
        },

        /**
         * Revoke the given token.
         */
        revoke(token) {
            axios.delete('/oauth/personal-access-tokens/' + token.id)
                .then(response => {
                    this.getTokens();
                });
        }
    }
});