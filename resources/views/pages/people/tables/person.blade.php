    <tr>
        <td>
            <img src="{{ $person->profilepicture }}" class="ks-avatar" alt="" width="36" height="36"> 
            <a href="{{ route('people.show', $person->id) }}">
                {{ $person->name }} <br>
                @forelse($person->location as $location)
                    <span class="badge badge-info-outline ks-sm">
                        {{ $location }}
                    </span><br>
                @empty
                    <div class="badge badge-info-outline ks-sm">
                        {{ __('No information to show') }}
                    </div>
                @endforelse
            </a>
        </td>
        <td>
            {{ $person->scraped->uri }}
        </td>
        <td>
            {{ $person->scraped->created_at->diffForHumans() }}
        </td>
    </tr>
