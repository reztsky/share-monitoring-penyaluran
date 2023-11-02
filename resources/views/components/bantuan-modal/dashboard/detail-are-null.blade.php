<td>
    @if (!is_null($fileName))
        <a href="{{ asset('storage/' . $folder . '/' . $fileName) }}" target="_blank" rel="noopener noreferrer">{{str_replace('_', ' ', Str::upper($folder))}}</a><br>
    @else
        <a target="_blank" rel="noopener noreferrer">-</a><br>
    @endif
</td>
