<x-filament-panels::page>
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
		<h1 class="text-2xl font-semibold mb-6">Programs</h1>

		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
			@foreach ($programs as $program)
				<article class="bg-white rounded-lg shadow overflow-hidden flex flex-col">
					<div class="p-4 flex-1">
						<h2 class="text-lg font-medium text-gray-900 mb-2">{{ $program->name }}</h2>
						@if(!empty($program->program_start) || !empty($program->program_end))
							<p class="text-sm text-gray-600 mb-2">
								{{ optional($program->program_start)->format('d M Y') ?? '' }}
								@if(!empty($program->program_end))
									- {{ optional($program->program_end)->format('d M Y') }}
								@endif
							</p>
						@endif
						@if(!empty($program->location))
							<p class="text-sm text-gray-600 mb-3">{{ $program->location }}</p>
						@endif
						@if(!empty($program->description))
							<p class="text-sm text-gray-700">{{ \Illuminate\Support\Str::limit($program->description, 140) }}</p>
						@endif
					</div>

					<div class="p-4 border-t bg-gray-50">
						<a href="{{ url('/programs/' . $program->id) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View Details</a>
					</div>
				</article>
			@endforeach
		</div>
	</div>
</x-filament-panels::page>
