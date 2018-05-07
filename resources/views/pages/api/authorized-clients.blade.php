    <div v-if="tokens.length > 0">
        @component('partials.panels.panel-flat')
        
        @slot('title')
            {{ __('Authorized Applications') }}
        @endslot
        
        @slot('body')
            <table class="table table-padded table-lightfont m-b-none">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Scopes</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="token in tokens">
                        <!-- Client Name -->
                        <td style="vertical-align: middle;">
                            @{{ token.client.name }}
                        </td>

                        <!-- Scopes -->
                        <td style="vertical-align: middle;">
                            <span v-if="token.scopes.length > 0">
                                @{{ token.scopes.join(', ') }}
                            </span>
                        </td>

                        <!-- Revoke Button -->
                        <td style="vertical-align: middle;">
                            <a class="action-link text-danger" @click="revoke(token)">
                                Revoke
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>                
        @endslot
        
        @endcomponent
    </div>


@push('scripts')
    <script src="{{ asset('js/pages/api/authorized-clients.js') }}"></script>
@endpush
