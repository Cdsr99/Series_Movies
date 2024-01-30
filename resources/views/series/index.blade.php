<x-layout title="Series">
    <a href="{{ route('series.create') }}" class="btn btn-success mb-2">Add Series</a>

    <ul class="list-group">
        @isset($message)
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @endisset

        @isset($messageCreatedSeries)
            <div class="alert alert-success">
                {{ $messageCreatedSeries }}
            </div>
        @endisset

        @isset($messageUpdatedSeries)
            <div class="alert alert-success">
                {{ $messageUpdatedSeries }}
            </div>
        @endisset


        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-right">
                {{ $serie->nome }}
                <a href="{{ route('series.update', $serie->id) }}" class="btn btn-primary">Edit</a>

                <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-layout>
