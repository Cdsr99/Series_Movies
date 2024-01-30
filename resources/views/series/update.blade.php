<x-layout title="Edit Series">
    <form action="{{ route('series.edit',$dataSeries->id); }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Id:</label>
            <input type="text" name="id" value="{{$dataSeries->id}}" class="form-control" readonly>
            <label for="nome" class="form-label">Name:</label>
            <input type="text" name="nome" value="{{$dataSeries->nome}}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</x-layout>
