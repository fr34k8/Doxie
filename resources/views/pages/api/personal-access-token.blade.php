    <div>
        @component('partials.panels.panel-flat')
        
        @slot('actions')
            <a class="btn btn-info btn-sm" @click="showCreateTokenForm">
                Create New Token
            </a>
        @endslot

        @slot('title')
            {{ __('Personal access tokens') }}
        @endslot
        
        @slot('body')
   
            <!-- No Tokens Notice -->
            <p class="m-b-none" v-if="tokens.length === 0">
                You have not created any personal access tokens.
            </p>

            <!-- Personal Access Tokens -->
            <table class="table table-padded table-lightfont m-b-none" v-if="tokens.length > 0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th width="100px"></th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="token in tokens">
                        <!-- Client Name -->
                        <td style="vertical-align: middle;">
                            @{{ token.name }}
                        </td>

                        <!-- Delete Button -->
                        <td style="vertical-align: middle;" width="100px">
                            <a class="btn btn-sm btn-danger white" @click="revoke(token)">
                                Delete
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endslot
    @endcomponent
    
        <!-- Create Token Modal -->
        @component('partials.modals.modal', ['id' => 'modal-create-token'])

        @slot('title')
            Create Token
        @endslot

        @slot('body')
            <div class="modal-body">
                <!-- Form Errors -->
                <div class="alert alert-danger" v-if="form.errors.length > 0">
                    <p><strong>Whoops!</strong> Something went wrong!</p>
                    <br>
                    <ul>
                        <li v-for="error in form.errors">
                            @{{ error }}
                        </li>
                    </ul>
                </div>

                <!-- Create Token Form -->
                <form class="form-horizontal" role="form" @submit.prevent="store">
                    <!-- Name -->
                    <div class="col-sm-12 form-group">
                        <label>Name</label>

                        <div>
                            <input id="create-token-name" type="text" class="form-control" name="name" v-model="form.name">
                        </div>
                    </div>

                    <!-- Scopes -->
                    <div class="form-group" v-if="scopes.length > 0">
                        <label class="col-md-4 control-label">Scopes</label>

                        <div class="col-md-6">
                            <div v-for="scope in scopes">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                            @click="toggleScope(scope.id)"
                                            :checked="scopeIsAssigned(scope.id)">
                                            <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                            @{{ scope.id }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
             <!-- Modal Actions -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-primary" @click="store">
                    Create
                </button>
            </div>
        @endslot

        @endcomponent

         @component('partials.modals.modal', ['id' => 'modal-access-token'])

        @slot('title')
            {{ __('Personal Access Token') }}
        @endslot

        @slot('body')
            <div class="modal-body">
                <p>
                    {{ __('Here is your new personal access token. This is the only time it will be shown so don\'t lose it!
                    You may now use this token to make API requests.') }}
                </p>

                <code class="codeblock">@{{ accessToken }}</code>
            </div>

            <!-- Modal Actions -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        @endslot

        @endcomponent
    </div>

@push('scripts')
    <script src="{{ asset('js/pages/api/personal-access-token.js') }}"></script>
@endpush