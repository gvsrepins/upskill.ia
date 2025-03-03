<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4">
            <div class="relative rounded-xl border p-10 border-neutral-200 dark:border-neutral-700">
                <div class="container w-fit">
                    <form action="{{ route('create-questions') }}" method="post"">
                        @csrf

                        <!-- flash error messages -->
                        @if ($errors->any())
                            <div class="mb-2 bg-pink-100 border border-pink-400 text-pink-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Ops! Algo deu errado.</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="flex flex-col gap-6">
                            <div class="flex flex-col gap-6">
                                <p class="text-2xl font-bold text-neutral-900 dark:text-neutral-200">* Qual o seu cargo?</p>
                                    <input type="text" value="{{ old('role') }}" name="role" class="w-full border border-neutral-200 dark:border-neutral-700 rounded-lg p-4" placeholder="Digite o seu cargo">
                                </p>
                            </div>
                            <div class="flex flex-col gap-6">
                                <p class="text-2xl font-bold text-neutral-900 dark:text-neutral-200">* Qual o seu nível de senioridade?</p>
                                <p class="text-neutral-500 dark:text-neutral-400">
                                    <label>
                                        <input type="radio" name="seniority" value="junior" {{ old('seniority') === 'junior' ? 'checked' : '' }}> Junior -
                                        <small class="text-neutral-500 dark:text-neutral-400">Preciso de orientação e estou desenvolvendo minha autonomia.</small><br>
                                    </label>
                                    <label><input type="radio" name="seniority" value="pleno" {{ old('seniority') === 'pleno' ? 'checked' : '' }}> Pleno -
                                        <small class="text-neutral-500 dark:text-neutral-400">Trabalho de forma autônoma e resolvo problemas com eficiência.</small><br>
                                    </label>
                                    <label>
                                        <input type="radio" name="seniority" value="senior" {{ old('seniority') === 'senior' ? 'checked' : '' }}> Senior -
                                        <small class="text-neutral-500 dark:text-neutral-400">Oriento a equipe, tomo decisões estratégicas e defino melhores práticas.</small><br>
                                    </label>
                                </p>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded self-end">Enviar</button>
                            </div>
                    </form>
                </div>
            </div>
    </div>
</x-layouts.app>
