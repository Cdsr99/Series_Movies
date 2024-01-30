<x-layout title="New Series">
    <form action="{{ route('series.store'); }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Name:</label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</x-layout>
