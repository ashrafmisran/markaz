<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($programs as $program)
        <div class="bg-success rounded-lg shadow p-6 flex flex-col">
            <h2 class="text-xl font-semibold mb-2">{{ $program->name }}</h2>
            <p class="text-gray-600 mb-4">{{ $program->description }}</p>
            <div class="mt-auto">
                {{-- <a href="{{ route('programs.show', $program->id) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    View Details
                </a> --}}
            </div>
        </div>
    @endforeach
</div>