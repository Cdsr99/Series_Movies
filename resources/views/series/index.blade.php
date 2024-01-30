<x-layout title="Series">
    <a href="{{ route('series.create') }}" class="btn btn-success mb-2">Add Series</a>

    <ul class="list-group">
        @if($message != null)
        <li>{{$message}}</li>
        @endif
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->nome }}
                <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
