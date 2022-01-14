@foreach ($documents as $item)
    <tr>

        <td><a class=" m-2 btn btn-primary" href="internship/Document/download/{{ $item->id }}"
                download="{{ $item->file_internship }}">{{ $item->file_internship }}</a><br>
        </td>
    </tr>
@endforeach
