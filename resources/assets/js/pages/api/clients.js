var ClientTokens = new Vue({
    el: '#client-tokens',
    /*
     * The component's data.
     */
    data() {
        return {
            clients: [],

            createForm: {
                errors: [],
                name: '',
                redirect: ''
            },

            editForm: {
                errors: [],
                name: '',
                redirect: ''
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
            this.getClients();

            $('#modal-create-client').on('shown.bs.modal', () => {
                $('#create-client-name').focus();
            });

            $('#modal-edit-client').on('shown.bs.modal', () => {
                $('#edit-client-name').focus();
            });
        },

        /**
         * Get all of the OAuth clients for the user.
         */
        getClients() {
            axios.get('/oauth/clients')
                .then(response => {
                    this.clients = response.data;
                });
        },

        /**
         * Show the form for creating new clients.
         */
        showCreateClientForm() {
            $('#modal-create-client').modal('show');
        },

        /**
         * Create a new OAuth client for the user.
         */
        store() {
            this.persistClient(
                'post', '/oauth/clients',
                this.createForm, '#modal-create-client'
            );
        },

        /**
         * Edit the given client.
         */
        edit(client) {
            this.editForm.id = client.id;
            this.editForm.name = client.name;
            this.editForm.redirect = client.redirect;

            $('#modal-edit-client').modal('show');
        },

        /**
         * Update the client being edited.
         */
        update() {
            this.persistClient(
                'put', '/oauth/clients/' + this.editForm.id,
                this.editForm, '#modal-edit-client'
            );
        },

        /**
         * Persist the client to storage using the given form.
         */
        persistClient(method, uri, form, modal) {
            form.errors = [];

            axios[method](uri, form)
                .then(response => {
                    this.getClients();

                    form.name = '';
                    form.redirect = '';
                    form.errors = [];

                    $(modal).modal('hide');
                })
                .catch(error => {
                    if (typeof error.response.data === 'object') {
                        form.errors = _.flatten(_.toArray(error.response.data));
                    } else {
                        form.errors = ['Something went wrong. Please try again.'];
                    }
                });
        },

        /**
         * Destroy the given client.
         */
        destroy(client) {
            axios.delete('/oauth/clients/' + client.id)
                .then(response => {
                    this.getClients();
                });
        }
    }
});