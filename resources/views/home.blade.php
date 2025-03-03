<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4">
            <div class="relative rounded-xl border p-4 md:p-10 border-neutral-200 dark:border-neutral-700">
                <div class="container w-full md:w-fit">
                    <h1 class="text-3xl md:text-6xl mb-4">Plano de Desenvolvimento</h1>
                        @csrf
                    <p class="mb-4">Gaps identificados:</p>
                    @foreach($plan['identified_gaps'] as $gap)
                        @if ($errors->any())
                        <div class="mb-8 p-4 border rounded-lg border-neutral-300 dark:border-neutral-600 shadow-md">ive" role="alert">
                            <h2 class="text-xl md:text-2xl font-semibold">{{ $gap['competency'] }}</h2>
                            <p class="text-neutral-500 dark:text-neutral-400 mb-2">Nível atual: {{ $gap['current_level'] }}</p>
                                    @foreach ($errors->all() as $error)
                            <div class="mb-4"> $error }}</li>
                                <h3 class="text-lg md:text-xl font-medium">Ações:</h3>
                                <ul class="list-disc list-inside">
                                    @foreach($gap['action_plan']['actions'] as $action)
                                        <li>{{ $action }}</li>
                                    @endforeach
                                </ul>lex flex-col gap-6">
                            </div>lass="flex flex-col gap-6">
                                <p class="text-2xl font-bold text-neutral-900 dark:text-neutral-200">* Qual o seu cargo?</p>
                            <div class="mb-4">e="text" value="{{ old('role') }}" name="role" class="w-full border border-neutral-200 dark:border-neutral-700 rounded-lg p-4" placeholder="Digite o seu cargo">
                                <h3 class="text-lg md:text-xl font-medium">Recursos sugeridos:</h3>
                                <ul class="list-disc list-inside">
                                    @foreach($gap['action_plan']['suggested_resources'] as $resource)
                                        @if(str_starts_with($resource, 'http'))ark:text-neutral-200">* Qual o seu nível de senioridade?</p>
                                            <li><a href="{{ $resource }}" target="_blank" class="text-blue-500 hover:underline">{{ $resource }}</a></li>
                                        @else
                                            <li>{{ $resource }}</li>niority" value="junior" {{ old('seniority') === 'junior' ? 'checked' : '' }}> Junior -
                                        @endif class="text-neutral-500 dark:text-neutral-400">Preciso de orientação e estou desenvolvendo minha autonomia.</small><br>
                                    @endforeach
                                </ul>label><input type="radio" name="seniority" value="pleno" {{ old('seniority') === 'pleno' ? 'checked' : '' }}> Pleno -
                            </div>      <small class="text-neutral-500 dark:text-neutral-400">Trabalho de forma autônoma e resolvo problemas com eficiência.</small><br>
                                    </label>
                            <div class="mb-4">
                                <h3 class="text-lg md:text-xl font-medium">Tempo estimado:</h3>old('seniority') === 'senior' ? 'checked' : '' }}> Senior -
                                <p>{{ $gap['action_plan']['estimated_time'] }}</p>eutral-400">Oriento a equipe, tomo decisões estratégicas e defino melhores práticas.</small><br>
                            </div>  </label>
                                </p>
                            <div>button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded self-end">Enviar</button>
                                <h3 class="text-lg md:text-xl font-medium">Métrica de progresso:</h3>
                                <p>{{ $gap['action_plan']['progress_metric'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>        </div>    </div></x-layouts.app>
