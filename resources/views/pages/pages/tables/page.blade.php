    <tr>
        <td>
            <a href="{{ route('pages.show', $page->id) }}">
                {{ $page->name }} <br>
            </a>
        </td>
        <td>
            {{ optional($page->scraped)->uri }}
        </td>
        <td>
            {{ optional($page->scraped)->created_at  }}
        </td>
    </tr>
