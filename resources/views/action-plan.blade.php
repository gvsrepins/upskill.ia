<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4">
            <div class="relative rounded-xl border p-4 md:p-10 border-neutral-200 dark:border-neutral-700">
                <div class="container w-full md:w-fit">
                    <h1 class="text-3xl md:text-6xl mb-4">Plano de Desenvolvimento</h1>

                    <p class="mb-4">Gaps identificados:</p>
                    @foreach($plan['identified_gaps'] as $gap)

                        <div class="mb-8 p-4 border rounded-lg border-neutral-300 dark:border-neutral-600 shadow-md">
                            <h2 class="text-xl md:text-2xl font-semibold">{{ $gap['competency'] }}</h2>
                            <p class="text-neutral-500 dark:text-neutral-400 mb-2">Nível atual: {{ $gap['current_level'] }}</p>

                            <div class="mb-4">
                                <h3 class="text-lg md:text-xl font-medium">Ações:</h3>
                                <ul class="list-disc list-inside">
                                    @foreach($gap['action_plan']['actions'] as $action)
                                        <li>{{ $action }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mb-4">
                                <h3 class="text-lg md:text-xl font-medium">Recursos sugeridos:</h3>
                                <ul class="list-disc list-inside">
                                    @foreach($gap['action_plan']['suggested_resources'] as $resource)
                                        @if(str_starts_with($resource, 'http'))
                                            <li><a href="{{ $resource }}" target="_blank" class="text-blue-500 hover:underline">{{ $resource }}</a></li>
                                        @else
                                            <li>{{ $resource }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mb-4">
                                <h3 class="text-lg md:text-xl font-medium">Tempo estimado:</h3>
                                <p>{{ $gap['action_plan']['estimated_time'] }}</p>
                            </div>

                            <div>
                                <h3 class="text-lg md:text-xl font-medium">Métrica de progresso:</h3>
                                <p>{{ $gap['action_plan']['progress_metric'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
