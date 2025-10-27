<x-filament-panels::page>
    <a style="background:#fff;border:1px solid #e5e7eb;padding:1rem;border-radius:1rem;display:block"
   href="...">
  <h3>Test</h3>
</a>

<div class="bg-red-500 text-white p-3 mb-4">Tailwind test — should be red</div>

    @php
        $meetings = $this->getTableRecords();
    @endphp

    @if ($meetings->isEmpty())
        <div class="py-8 text-center text-sm text-gray-500">No meetings found.</div>
    @else
        <div class="grid grid-cols-3 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($meetings as $meeting)
                <x-filament::card class="p-4">
                    <div class="text-base font-medium text-lg text-gray-200"> {{ $meeting->title }} </div>
                    <div class="text-sm text-muted-foreground"> {{ optional($meeting->date)->format('d M Y') }} </div>
                </x-filament::card>

            @endforeach
        </div>

        <div class="mt-6">
            {{ $meetings->links() }}
        </div>
    @endif
</x-filament-panels::page>
