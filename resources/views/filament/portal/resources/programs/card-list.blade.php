<div class="fi-grid fi-grid-cols-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($programs as $program)
        <div class="bg-primary rounded-lg shadow fi-mb-2  p-6 flex flex-col">
            <h2 class="text-xl font-semibold mb-2">{{ $program->name }}</h2>
            <p class="fi-badge mb-4">{{ $program->description }}</p>
            <div class="mt-auto">
                <a href="{{ url('/portal/programs/' . $program->id) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    View Details
                </a>
            </div>
    @endforeach
</div>