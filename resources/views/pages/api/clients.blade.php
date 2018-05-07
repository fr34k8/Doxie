    <div>
        @component('partials.panels.panel-flat')
        
        @slot('actions')
            <a class="btn btn-info btn-sm" @click="showCreateClientForm">
                Create New Client
            </a>
        @endslot

        @slot('title')
            {{ __(' OAuth Clients') }}
        @endslot
        
        @slot('body')
            <p class="m-b-none" v-if="clients.length === 0">
                You have not created any OAuth clients.
            </p>

            <table class="table table-padded table-lightfont m-b-none" v-if="clients.length > 0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Secret</th>
                        <th width="160px"></th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="client in clients">
                        <!-- ID -->
                        <td style="vertical-align: middle;">
                            @{{ client.id }}
                        </td>
                        
                        <!-- Name -->
                        <td style="vertical-align: middle;">
                            @{{ client.name }}
                        </td>

                        <!-- Secret -->
                        <td style="vertical-align: middle;">
                            <code>@{{ client.secret }}</code>
                        </td>

                        <!-- Edit/Delete Button -->
                        <td style="vertical-align: middle;" width="160px">
                             <a class="btn btn-sm btn-info white" @click="edit(client)">
                                Edit
                            </a>
                            <a class="btn btn-sm btn-danger white" @click="destroy(client)">
                                Delete
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>           
        @endslot
        
        @endcomponent


        @component('partials.modals.modal', ['id' => 'modal-create-client'])

        @slot('title')
            {{ __('Create Client') }}
        @endslot

        @slot('body')
            <div class="modal-body">
                <!-- Form Errors -->
                <div class="alert alert-danger" v-if="createForm.errors.length > 0">
                    <p><strong>Whoops!</strong> Something went wrong!</p>
                    <br>
                    <ul>
                        <li v-for="error in createForm.errors">
                            @{{ error }}
                        </li>
                    </ul>
                </div>

                <!-- Create Client Form -->
                <form class="form-horizontal" role="form">
                    <!-- Name -->
                    <div class="col-sm-12 form-group">
                        <label class="control-label">Name</label>
                        <input id="create-client-name" type="text" class="form-control"
                            @keyup.enter="store" v-model="createForm.name">

                        <span class="help-block">
                            Something your users will recognize and trust.
                        </span>
                    </div>

                    <!-- Redirect URL -->
                    <div class="col-sm-12 form-group">
                        <label class="control-label">Redirect URL</label>
                        <input type="text" class="form-control" name="redirect"
                            @keyup.enter="store" v-model="createForm.redirect">

                        <span class="help-block">
                            Your application's authorization callback URL.
                        </span>
                    </div>
                </form>
            </div>

            <!-- Modal Actions -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary" @click="store">
                    Create
                </button>
            </div>
        @endslot

        @endcomponent


        @component('partials.modals.modal', ['id' => 'modal-edit-client'])

        @slot('title')
            {{ __('Edit Client') }}
        @endslot

        @slot('body')
            <div class="modal-body">
                <!-- Form Errors -->
                <div class="alert alert-danger" v-if="editForm.errors.length > 0">
                    <p><strong>Whoops!</strong> Something went wrong!</p>
                    <br>
                    <ul>
                        <li v-for="error in editForm.errors">
                            @{{ error }}
                        </li>
                    </ul>
                </div>

                <!-- Edit Client Form -->
                <form class="form-horizontal" role="form">
                    <!-- Name -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>

                        <div class="col-md-7">
                            <input id="edit-client-name" type="text" class="form-control"
                                @keyup.enter="update" v-model="editForm.name">

                            <span class="help-block">
                                Something your users will recognize and trust.
                            </span>
                        </div>
                    </div>

                    <!-- Redirect URL -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Redirect URL</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" name="redirect"
                                @keyup.enter="update" v-model="editForm.redirect">

                            <span class="help-block">
                                Your application's authorization callback URL.
                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Actions -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary" @click="update">
                    Save Changes
                </button>
            </div>
        @endslot

        @endcomponent
    </div>
</template>

@push('scripts')
    <script src="{{ asset('js/pages/api/clients.js') }}"></script>
@endpush